systemctl is-active mpd.service | grep -ci -m1 'active';

systemctl is-active roonbridge.service | grep -ci -m1 'active';

systemctl is-active shairport-sync.service | grep -ci -m1 'active';

systemctl is-active shairport-sync.service | grep -ci -m1 'active';

systemctl is-active hostapd.service | grep -ci -m1 'active';

ifconfig eth0 | grep -m1 'inet' | awk '{ print $2 }' | sed 's/addr://g';

cat /etc/hostname;

grep -m1 'soundcard=' /DietPi/dietpi.txt | sed 's/.*=//';

