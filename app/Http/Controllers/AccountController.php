<?php

namespace App\Http\Controllers;

use Redirect;
use App\User;
use Auth;
use App\Mail\ResetPassword;
use Illuminate\Http\Request;

class AccountController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function Index() {
        include(app_path() . "/phpseclib/Net/SSH2.php");
        $ssh = new \phpseclib\Net\SSH2('dietpi-allo.ddns.net');
        $ssh->login('root', '4di9ole28') or die("Login failed");
        $current_date = date("M d, Y");
        $current_time = date("h:i a");
        $ipaddress = $ssh->exec("ifconfig eth0 | grep -m1 'inet' | awk '{ print $2 }' | sed 's/addr://g'");
        $hostName = $ssh->exec("cat /etc/hostname");
        $soundCard = $ssh->exec("grep -m1 'soundcard=' /DietPi/dietpi.txt | sed 's/.*=//'");
        $ipaddress = $ssh->exec("ifconfig eth0 | grep -m1 'inet' | awk '{ print $2 }' | sed 's/addr://g'");
        return view('frontend.dashboard')->with(['ipAddress' => $ipaddress, 'current_date' => $current_date,
                    'current_time' => $current_time, 'ipaddress' => $ipaddress, 'hostName' => $hostName, 'soundCard' => $soundCard,]);
        ;
    }

    public function ssh_login(Request $request) {
        if (!empty($request->all())) {
            include(app_path() . "/phpseclib/Net/SSH2.php");
            $ssh = new \phpseclib\Net\SSH2('dietpi-allo.ddns.net');
            $ssh->login('root', '4di9ole28') or die("Login failed");
            echo 'Hotspot Password is: ' . $ssh->exec("grep -m1 '^wpa_passphrase=' /etc/hostapd/hostapd.conf | sed 's/.*=//'");
            $hotspotstatus = $ssh->exec("systemctl unmask hostapd.service; systemctl start hostapd.service");
            if ($hotspotstatus == 0) {
                $hotspot_status = 'Inactive';
            } elseif ($hotspotstatus == 1) {
                $hotspot_status = 'Active';
            }
            echo 'Hotspot Status is: ' . $hotspot_status;
        } else {
            return view('ssh_login');
        }
    }

}
