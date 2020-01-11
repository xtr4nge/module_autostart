<?php
$srv_port = "8000";
$srv_https = "";
$srv_dir = "/usr/share/fruitywifi/www/modules/autostart/includes";
//$web_path = "/FruityWifi";
$web_path = "";
$logs = "/usr/share/fruitywifi/logs/autostart.log";
$token = "e5dab9a69988dd65e578041416773149ea57a054";

if ($srv_https == "on") {
    $protocol = "https";
} else {
    $protocol = "http";
}

//$post_data = 'user=admin&pass=admin';
$post_data = "token=$token";
$agent = "Mozilla/5.0 (X11; U; Linux x86_64; en-US; rv:1.9.1.7) Gecko/20100105 Shiretoko/3.5.7";
$login_url = "$protocol://localhost$web_path/login.php";

$ch = curl_init();

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_URL, $login_url );
curl_setopt($ch, CURLOPT_PORT, $srv_port );
curl_setopt($ch, CURLOPT_POST, 1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
#curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

//Execute the action to login
$output = curl_exec($ch);

require("$srv_dir/options_config.php");

//LOGS
$date = date('Y-m-d H:i:s');
$exec = "echo '----------\n$date (Autostart)' >> $logs";
exec($exec);

$tmp = array_keys($opt_responder);
for ($i=0; $i< count($tmp); $i++) {

	$opt = "M".$i;
    if ($opt_responder[$opt][0] == 1) {

        // EXEC CURL
        $url = "$protocol://localhost$web_path".$opt_responder[$opt][3];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_exec($ch);

        //LOGS
        $exec = "echo '- (enabled) ".$opt_responder[$opt][2]." ' >> $logs";
        exec($exec);
    }
}
