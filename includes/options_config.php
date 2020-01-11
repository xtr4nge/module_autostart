<?php

//index 0 = on/off module
//index 1 = ??
//index 2 = module name
//index 3 = start url


//Services
$opt_responder["M0"][0] = 0;
$opt_responder["M0"][1] = 0;
$opt_responder["M0"][2] = "3G / 4G";
$opt_responder["M0"][3] = "/modules/3g_4g/includes/module_action.php?service=3g_4g&action=start&page=status";

$opt_responder["M1"][0] = 0;
$opt_responder["M1"][1] = 0;
$opt_responder["M1"][2] = "Wireless [AP]";
$opt_responder["M1"][3] = "/modules/ap/includes/module_action.php?service=ap&action=start&page=status";

$opt_responder["M2"][0] = 0;
$opt_responder["M2"][1] = 0;
$opt_responder["M2"][2] = "BluePand";
$opt_responder["M2"][3] = "/modules/bluepand/includes/module_action.php?service=bluepand&action=start&page=status";

$opt_responder["M3"][0] = 0;
$opt_responder["M3"][1] = 0;
$opt_responder["M3"][2] = "DeviceFinder";
$opt_responder["M3"][3] = "/modules/devicefinder/includes/module_action.php?service=devicefinder&action=start&page=status";

$opt_responder["M4"][0] = 0;
$opt_responder["M4"][1] = 0;
$opt_responder["M4"][2] = "FruityProxy";
$opt_responder["M4"][3] = "/modules/fruityproxy/includes/module_action.php?service=fruityproxy&action=start&page=status";

$opt_responder["M5"][0] = 0;
$opt_responder["M5"][1] = 0;
$opt_responder["M5"][2] = "Karma";
$opt_responder["M5"][3] = "/modules/karma/includes/module_action.php?service=karma&action=start&page=status";

$opt_responder["M6"][0] = 0;
$opt_responder["M6"][1] = 0;
$opt_responder["M6"][2] = "Mana";
$opt_responder["M6"][3] = "/modules/mana/includes/module_action.php?service=mana&action=start&page=status";

$opt_responder["M7"][0] = 0;
$opt_responder["M7"][1] = 0;
$opt_responder["M7"][2] = "Nginx";
$opt_responder["M7"][3] = "/modules/nginx/includes/module_action.php?service=nginx&action=start&page=status";

$opt_responder["M8"][0] = 0;
$opt_responder["M8"][1] = 0;
$opt_responder["M8"][2] = "Stalker";
$opt_responder["M8"][3] = "/modules/stalker/includes/module_action.php?service=stalker&action=start&page=status";

$opt_responder["M9"][0] = 0;
$opt_responder["M9"][1] = 0;
$opt_responder["M9"][2] = "Supplicant";
$opt_responder["M9"][3] = "/modules/supplicant/includes/module_action.php?service=supplicant&action=start&page=status";


//Modules
$opt_responder["M10"][0] = 0;
$opt_responder["M10"][1] = 0;
$opt_responder["M10"][2] = "AutoSSH";
$opt_responder["M10"][3] = "/modules/autossh/includes/module_action.php?service=autossh&action=start&page=status";

$opt_responder["M11"][0] = 0;
$opt_responder["M11"][1] = 0;
$opt_responder["M11"][2] = "BDFproxy";
$opt_responder["M11"][3] = "/modules/bdfproxy/includes/module_action.php?service=bdfproxy&action=start&page=status";

$opt_responder["M12"][0] = 0;
$opt_responder["M12"][1] = 0;
$opt_responder["M12"][2] = "Captive";
$opt_responder["M12"][3] = "/modules/captive/includes/module_action.php?service=captive&action=start&page=status";

$opt_responder["M13"][0] = 0;
$opt_responder["M13"][1] = 0;
$opt_responder["M13"][2] = "DNSspoof";
$opt_responder["M13"][3] = "/modules/dnsspoof/includes/module_action.php?service=dnsspoof&action=start&page=status";

$opt_responder["M14"][0] = 0;
$opt_responder["M14"][1] = 0;
$opt_responder["M14"][2] = "Ettercap";
$opt_responder["M14"][3] = "/modules/ettercap/includes/module_action.php?service=ettercap&action=start&page=status";

$opt_responder["M15"][0] = 0;
$opt_responder["M15"][1] = 0;
$opt_responder["M15"][2] = "Kismet";
$opt_responder["M15"][3] = "/modules/kismet/includes/module_action.php?service=kismet&action=start&page=status";

$opt_responder["M16"][0] = 0;
$opt_responder["M16"][1] = 0;
$opt_responder["M16"][2] = "mdk3";
$opt_responder["M16"][3] = "/modules/mdk3/includes/module_action.php?service=mdk3&action=start&page=status";

$opt_responder["M17"][0] = 0;
$opt_responder["M17"][1] = 0;
$opt_responder["M17"][2] = "Meterpreter";
$opt_responder["M17"][3] = "/modules/meterpreter/includes/module_action.php?service=meterpreter&action=start&page=status";

$opt_responder["M18"][0] = 0;
$opt_responder["M18"][1] = 0;
$opt_responder["M18"][2] = "MITMf";
$opt_responder["M18"][3] = "/modules/mitmf/includes/module_action.php?service=mitmf&action=start&page=status";

$opt_responder["M19"][0] = 0;
$opt_responder["M19"][1] = 0;
$opt_responder["M19"][2] = "Nessus";
$opt_responder["M19"][3] = "/modules/nessus/includes/module_action.php?service=nessus&action=start&page=status";

$opt_responder["M20"][0] = 0;
$opt_responder["M20"][1] = 0;
$opt_responder["M20"][2] = "ngrep";
$opt_responder["M20"][3] = "/modules/ngrep/includes/module_action.php?service=ngrep&action=start&page=status";

$opt_responder["M21"][0] = 0;
$opt_responder["M21"][1] = 0;
$opt_responder["M21"][2] = "Phishing";
$opt_responder["M21"][3] = "/modules/phishing/includes/module_action.php?service=phishing&action=start&page=status";

$opt_responder["M22"][0] = 0;
$opt_responder["M22"][1] = 0;
$opt_responder["M22"][2] = "Recon";
$opt_responder["M22"][3] = "/modules/recon/includes/module_action.php?service=recon&action=start&page=status";

$opt_responder["M23"][0] = 0;
$opt_responder["M23"][1] = 0;
$opt_responder["M23"][2] = "Responder";
$opt_responder["M23"][3] = "/modules/responder/includes/module_action.php?service=responder&action=start&page=status";

$opt_responder["M24"][0] = 0;
$opt_responder["M24"][1] = 0;
$opt_responder["M24"][2] = "RPiTwit";
$opt_responder["M24"][3] = "/modules/rpitwit/includes/module_action.php?service=rpitwit&action=start&page=status";

$opt_responder["M25"][0] = 0;
$opt_responder["M25"][1] = 0;
$opt_responder["M25"][2] = "Squid3";
$opt_responder["M25"][3] = "/modules/squid3/includes/module_action.php?service=squid3&action=start&page=status";

$opt_responder["M26"][0] = 0;
$opt_responder["M26"][1] = 0;
$opt_responder["M26"][2] = "SSLstrip";
$opt_responder["M26"][3] = "/modules/sslstrip/includes/module_action.php?service=sslstrip&action=start&page=status";

$opt_responder["M27"][0] = 0;
$opt_responder["M27"][1] = 0;
$opt_responder["M27"][2] = "SSLstrip2";
$opt_responder["M27"][3] = "/modules/sslstrip2/includes/module_action.php?service=sslstrip2&action=start&page=status";

$opt_responder["M28"][0] = 0;
$opt_responder["M28"][1] = 0;
$opt_responder["M28"][2] = "Tcpdump";
$opt_responder["M28"][3] = "/modules/tcpdump/includes/module_action.php?service=tcpdump&action=start&page=status";

$opt_responder["M29"][0] = 0;
$opt_responder["M29"][1] = 0;
$opt_responder["M29"][2] = "Tor";
$opt_responder["M29"][3] = "/modules/tor/includes/module_action.php?service=tor&action=start&page=status";

$opt_responder["M30"][0] = 0;
$opt_responder["M30"][1] = 0;
$opt_responder["M30"][2] = "URLSnarf";
$opt_responder["M30"][3] = "/modules/urlsnarf/includes/module_action.php?service=urlsnarf&action=start&page=status";

$opt_responder["M31"][0] = 0;
$opt_responder["M31"][1] = 0;
$opt_responder["M31"][2] = "WhatsApp";
$opt_responder["M31"][3] = "/modules/whatsapp/includes/module_action.php?service=whatsapp&action=start&page=status";
