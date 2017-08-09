<?php

namespace App\Http\Controllers;

use Redirect;
use App\User;
use Auth;
use DB;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function mpdSettings(Request $request) {
        include(app_path() . "/phpseclib/Net/SSH2.php");
        $ssh = new \phpseclib\Net\SSH2('dietpi-allo.ddns.net');
        $ssh->login('root', '4di9ole28') or die("Login failed");

        $mpdstatus = $ssh->exec("systemctl is-active hostapd.service | grep -ci -m1 'active'");
        if ($mpdstatus == 0) {
            $mpd_status = 'Inactive';
        } elseif ($mpdstatus == 1) {
            $mpd_status = 'Active';
        }
        $ipLocal = '';
        if (getenv('HTTP_CLIENT_IP')) {
            $ipLocal = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ipLocal = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ipLocal = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ipLocal = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ipLocal = getenv('HTTP_FORWARDED');
        } elseif (getenv('REMOTE_ADDR')) {
            $ipLocal = getenv('REMOTE_ADDR');
        } else {
            $ipLocal = 'UNKNOWN';
        }

        $ipaddress = $ssh->exec("ifconfig eth0 | grep -m1 'inet' | awk '{ print $2 }' | sed 's/addr://g'");
        //echo "<pre>";print_r($ipaddress);die;
        $current_date = date("M d, Y");
        $current_time = date("h:i a");
        $soxr_status = $ssh->exec("grep -ci -m1 '^samplerate_converter \"soxr' /etc/mpd.conf");
        $command = "grep -m1 'samplerate_converter \"soxr' /etc/mpd.conf | sed 's/\"//g'";
        $soxrQuality = "grep -m1 'samplerate_converter \"soxr' /etc/mpd.conf | sed 's/\"//g'";
        $outputFrequencies = $ssh->exec("grep -m1 '^format' /etc/mpd.conf | sed 's/\"//g' | sed 's/:/ /g' | awk '{print $2}'");
        $bitDepth = $ssh->exec("grep -m1 '^format' /etc/mpd.conf | sed 's/\"//g' | sed 's/:/ /g' | awk '{print $3}'");
        $urlLink = $ssh->exec("http://'$ipaddress'/ompd");

        $soxrQuality = $ssh->exec($command);

        return view('frontend.mpd_settings')->with(['mpd_status' => $mpd_status, 'soxrQuality' => $soxrQuality,
                    'outputFrequencies' => $outputFrequencies, 'bitDepth' => $bitDepth, 'current_date' => $current_date,
                    'current_time' => $current_time, 'urlLink' => $urlLink, 'soxr_status' => $soxr_status, 'ipaddress' => $ipaddress]);

        // if(!empty($request)) {
        // 	echo "<pre>";print_r($request->all());die;
        // }
    }

    public function changeMpdSettings(Request $request) {
        echo "<pre>";
        print_r($request->all());
        die;
        return view('frontend.mpd_settings');

        $mpd_status = $request->mpd_status;
        include(app_path() . "/phpseclib/Net/SSH2.php");
        $ssh = new \phpseclib\Net\SSH2('dietpi-allo.ddns.net');
        $ssh->login('root', '4di9ole28') or die("Login failed");

        if ($mpd_status == "Inactive") {
            $mpdstatus1 = $ssh->exec("systemctl mask hostapd.service; systemctl start hostapd.service");
            $mpdstatus = $ssh->exec("systemctl is-active hostapd.service | grep -ci -m1 'active'");
        } elseif ($mpd_status == "Active") {
            $mpdstatus1 = $ssh->exec("systemctl mask hostapd.service; systemctl stop hostapd.service");
            $mpdstatus = $ssh->exec("systemctl is-active hostapd.service | grep -ci -m1 'active'");
        }

        $ipaddress = $ssh->exec("ifconfig eth0 | grep -m1 'inet' | awk '{ print $2 }' | sed 's/addr://g'");
        $current_date = date("M d, Y");
        $current_time = date("h:i a");
        $soxrQuality = 'very high';
        // $command = "grep -m1 'samplerate_converter \"soxr' /etc/mpd.conf | sed 's/\"//g' | awk 
        // 	'{for(i=3;i<=NF;i++){printf "%s ", $i}; printf "\n"}' | sed 's/ *$//'";
        $outputFrequencies = $ssh->exec("grep -m1 '^format' /etc/mpd.conf | sed 's/\"//g' | sed 's/:/ /g' | awk '{print $2}'");
        $bitDepth = $ssh->exec("grep -m1 '^format' /etc/mpd.conf | sed 's/\"//g' | sed 's/:/ /g' | awk '{print $3}'");
        $urlLink = $ssh->exec("http://'$ipaddress'/ompd");

        return view('frontend.mpd_settings')->with(['mpd_status' => $mpd_status, 'soxrQuality' => $soxrQuality,
                    'outputFrequencies' => $outputFrequencies, 'bitDepth' => $bitDepth, 'current_date' => $current_date,
                    'current_time' => $current_time, 'urlLink' => $urlLink]);
    }

    public function systemSettings(Request $request) {
        include(app_path() . "/phpseclib/Net/SSH2.php");
        $ssh = new \phpseclib\Net\SSH2('dietpi-allo.ddns.net');
        $ssh->login('root', '4di9ole28') or die("Login failed");

        $ipaddress = $ssh->exec("ifconfig eth0 | grep -m1 'inet' | awk '{ print $2 }' | sed 's/addr://g'");
        $current_date = date("M d, Y");
        $current_time = date("h:i a");
        $soundCard = $ssh->exec("grep -m1 'soundcard=' /DietPi/dietpi.txt | sed 's/.*=//'");
        $hostName = $ssh->exec("cat /etc/hostname");
        $ipGateway = $ssh->exec("ip r | grep -m1 'default' | awk '{ print $3 }'");
        $ipMask = $ssh->exec("ifconfig eth0 | grep -m1 'inet' | awk '{ print $4 }' | sed 's/Mask://g'");
        $ipDns = $ssh->exec("grep -m1 'nameserver' /etc/resolv.conf | awk '{print $2}'");

        return view('frontend.system_settings')->with(['ipAddress' => $ipaddress, 'soundCard' => $soundCard, 'hostName' => $hostName,
                    'ipGateway' => $ipGateway, 'ipMask' => $ipMask, 'ipDns' => $ipDns,
                    'current_date' => $current_date, 'current_time' => $current_time]);
    }

}
