<? 
/*
	Copyright (C) 2013-2019 xtr4nge [_AT_] gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ 
?>
<?
//include "../login_check.php";
include "../../../config/config.php";
include "../_info_.php";
include "../../../functions.php";

include "options_config.php";

// Checking POST & GET variables...
if ($regex == 1) {
    regex_standard($_GET["service"], "../msg.php", $regex_extra);
    regex_standard($_GET["action"], "../msg.php", $regex_extra);
    regex_standard($_GET["page"], "../msg.php", $regex_extra);
    regex_standard($_GET["install"], "../msg.php", $regex_extra);
}

$service = $_GET['service'];
$action = $_GET['action'];
$page = $_GET['page'];
$install = $_GET['install'];

if($service != "") {
    
    if ($action == "start") {

        $srv_https = $_SERVER["HTTPS"];
        $srv_port = $_SERVER["SERVER_PORT"];
        $srv_dir = dirname(__FILE__);
        $srv_dir = str_replace("/","\\/",$srv_dir);
        $srv_php_self = $_SERVER["PHP_SELF"];
        $web_path = substr($srv_php_self, 0, strpos($srv_php_self, "/modules/"));
        $web_path = str_replace("/","\\/",$web_path);
        $logs = str_replace("/","\\/",$mod_logs);
        
        $exec = "$bin_sed -i 's/^\\\$srv_port =.*/\\\$srv_port = \\\"$srv_port\\\";/g' FruityWiFi-autostart.php";
        exec_fruitywifi($exec);
        
        $exec = "$bin_sed -i 's/^\\\$srv_https =.*/\\\$srv_https = \\\"$srv_https\\\";/g' FruityWiFi-autostart.php";
        exec_fruitywifi($exec);
        
        $exec = "$bin_sed -i 's/^\\\$srv_dir =.*/\\\$srv_dir = \\\"$srv_dir\\\";/g' FruityWiFi-autostart.php";
        exec_fruitywifi($exec);
        
        $exec = "$bin_sed -i 's/^\\\$web_path =.*/\\\$web_path = \\\"$web_path\\\";/g' FruityWiFi-autostart.php";
        exec_fruitywifi($exec);
    
        $exec = "$bin_sed -i 's/^\\\$logs =.*/\\\$logs = \\\"$logs\\\";/g' FruityWiFi-autostart.php";
        exec_fruitywifi($exec);
    
        // INCLUDE rc.local
        $exec = "grep 'FruityWiFi-autostart.php' /etc/rc.local";
        $isautostart = exec($exec);
        if ($isautostart  == "") {
			
			// Check if 'exit 0' exists in rc.local
			$exec = "grep '^exit 0' /etc/rc.local";
			$isexit = exec($exec);
			if ($isexit  == "") {
				$exec = "echo 'exit 0' >> /etc/rc.local";
                exec_fruitywifi($exec);
			} 
			
			// Insert Autostart in rc.local
            $exec = "sed -i '/FruityWiFi-autostart.php/d' /etc/rc.local";
            exec_fruitywifi($exec);
            
            $exec = "sed -i 's/^exit 0/php $srv_dir\/FruityWiFi-autostart.php\\nexit 0/g' /etc/rc.local";
            exec_fruitywifi($exec);
            
        }

        // COPY LOG
        if ( 0 < filesize( $mod_logs ) ) {
            $exec = "$bin_cp $mod_logs $mod_logs_history/".gmdate("Ymd-H-i-s").".log";
            exec_fruitywifi($exec);
            
            $exec = "$bin_echo '' > $mod_logs";
            exec_fruitywifi($exec);
        }
    
    
    } else if($action == "stop") {
        
        // REMOVE from rc.local
        $exec = "sed -i '/FruityWiFi-autostart.php/d' /etc/rc.local";
        exec_fruitywifi($exec);
            
        // COPY LOG
        if ( 0 < filesize( $mod_logs ) ) {
            $exec = "$bin_cp $mod_logs $mod_logs_history/".gmdate("Ymd-H-i-s").".log";
            exec_fruitywifi($exec);
            
            $exec = "$bin_echo '' > $mod_logs";
            exec_fruitywifi($exec);
        }

    }

}

if ($install == "install_autostart") {

    $exec = "chmod 755 install.sh";
    exec_fruitywifi($exec);

    $exec = "$bin_sudo ./install.sh > $log_path/install.txt &";
    exec_fruitywifi($exec);

    header('Location: ../../install.php?module=autostart');
    exit;
}

if ($page == "status") {
    header('Location: ../../../action.php');
} else {
    header('Location: ../../action.php?page=autostart');
}

//header('Location: ../../action.php?page=ngrep');

?>