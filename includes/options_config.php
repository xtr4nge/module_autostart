<?
// CHECKBOX
$opt_responder["S1"][0] = 1;
$opt_responder["S2"][0] = 0;
$opt_responder["S3"][0] = 0;
$opt_responder["S4"][0] = 0;
$opt_responder["M1"][0] = 0;
$opt_responder["M2"][0] = 0;
$opt_responder["M3"][0] = 0;
$opt_responder["M4"][0] = 0;
$opt_responder["M5"][0] = 0;
$opt_responder["M6"][0] = 0;
$opt_responder["M7"][0] = 0;
$opt_responder["M8"][0] = 0;
$opt_responder["M9"][0] = 0;
$opt_responder["M10"][0] = 0;
$opt_responder["M11"][0] = 0;
$opt_responder["M12"][0] = 0;
$opt_responder["M13"][0] = 0;
$opt_responder["M14"][0] = 0;
$opt_responder["M15"][0] = 0;
$opt_responder["M16"][0] = 0;
$opt_responder["M17"][0] = 0;


// Alias
$opt_responder["S1"][2] = "Wireless";
$opt_responder["S2"][2] = "Karma";
$opt_responder["S3"][2] = "Mana";
$opt_responder["S4"][2] = "Supplicant";
$opt_responder["M1"][2] = "ngrep";
$opt_responder["M2"][2] = "SSLStrip";
$opt_responder["M3"][2] = "DNSSpoof";
$opt_responder["M4"][2] = "MDK3";
$opt_responder["M5"][2] = "Squid3";
$opt_responder["M6"][2] = "Kismet";
$opt_responder["M7"][2] = "Captive";
$opt_responder["M8"][2] = "URLSnarf";
$opt_responder["M09"][2] = "Tcpdump";
$opt_responder["M10"][2] = "Ettercap";
$opt_responder["M11"][2] = "Autossh";
$opt_responder["M12"][2] = "Rpitwit";
$opt_responder["M13"][2] = "Whatsapp";
$opt_responder["M14"][2] = "3g_4g";
$opt_responder["M15"][2] = "Nessus";
$opt_responder["M16"][2] = "Tor";
$opt_responder["M17"][2] = "Phishing";




// Action URL
$opt_responder["S1"][3] = "/scripts/status_wireless.php?service=wireless&action=start";
$opt_responder["S2"][3] = "/modules/karma/includes/module_action.php?service=karma&action=start&page=status";
$opt_responder["S3"][3] = "/modules/mana/includes/module_action.php?service=mana&action=start&page=status";
$opt_responder["S4"][3] = "/modules/responder/includes/module_action.php?service=responder&action=start&page=status";
$opt_responder["M1"][3] = "/modules/ngrep/includes/module_action.php?service=ngrep&action=start&page=status";
$opt_responder["M2"][3] = "/modules/sslstrip/includes/module_action.php?service=sslstrip&action=start&page=status";
$opt_responder["M3"][3] = "/modules/dnsspoof/includes/module_action.php?service=dnsspoof&action=start&page=status";
$opt_responder["M4"][3] = "/modules/mdk3/includes/module_action.php?service=mdk3&action=start&page=status";
$opt_responder["M5"][3] = "/modules/squid3/includes/module_action.php?service=squid3&action=start&page=status";
$opt_responder["M6"][3] = "/modules/kismet/includes/module_action.php?service=kismet&action=start&page=status";
$opt_responder["M7"][3] = "/modules/captive/includes/module_action.php?service=captive&action=start&page=status";
$opt_responder["M8"][3] = "/modules/urlsnarf/includes/module_action.php?service=urlsnarf&action=start&page=status";
$opt_responder["M09"][3] = "/modules/tcpdump/includes/module_action.php?service=tcpdump&action=start&page=status";
$opt_responder["M10"][3] = "/modules/ettercap/includes/module_action.php?service=ettercap&action=start&page=status";
$opt_responder["M11"][3] = "/modules/autossh/includes/module_action.php?service=autossh&action=start&page=status";
$opt_responder["M12"][3] = "/modules/rpitwit/includes/module_action.php?service=rpitwit&action=start&page=status";
$opt_responder["M13"][3] = "/modules/whatsapp/includes/module_action.php?service=whatsapp&action=start&page=status";
$opt_responder["M14"][3] = "/modules/3g_4g/includes/module_action.php?service=3g_4g&action=start&page=status";
$opt_responder["M15"][3] = "/modules/nessus/includes/module_action.php?service=nessus&action=start&page=status";
$opt_responder["M16"][3] = "/modules/tor/includes/module_action.php?service=tor&action=start&page=status";
$opt_responder["M17"][3] = "/modules/phishing/includes/module_action.php?service=phishing&action=start&page=status";


/*
$opt_responder["S1"][3] = "https://localhost/scripts/status_wireless.php?service=wireless&action=start";
$opt_responder["S2"][3] = "https://localhost/scripts/status_karma.php?service=karma&action=start";
$opt_responder["S3"][3] = "https://localhost/scripts/status_phishing.php?service=phishing&action=start";
$opt_responder["M1"][3] = "https://localhost/modules/ngrep/includes/module_action.php?service=ngrep&action=start&page=status";
$opt_responder["M2"][3] = "https://localhost/modules/sslstrip/includes/module_action.php?service=sslstrip&action=start&page=status";
$opt_responder["M3"][3] = "https://localhost/modules/dnsspoof/includes/module_action.php?service=dnsspoof&action=start&page=status";
$opt_responder["M4"][3] = "https://localhost/modules/mdk3/includes/module_action.php?service=mdk3&action=start&page=status";
$opt_responder["M5"][3] = "https://localhost/modules/squid3/includes/module_action.php?service=squid3&action=start&page=status";
$opt_responder["M6"][3] = "https://localhost/modules/kismet/includes/module_action.php?service=kismet&action=start&page=status";
$opt_responder["M7"][3] = "https://localhost/modules/captive/includes/module_action.php?service=captive&action=start&page=status";
$opt_responder["M8"][3] = "https://localhost/modules/urlsnarf/includes/module_action.php?service=urlsnarf&action=start&page=status";
$opt_responder["M9"][3] = "https://localhost/modules/responder/includes/module_action.php?service=responder&action=start&page=status";
*/

$opt_responder["S1"][1] = 1;
$opt_responder["S2"][1] = 2;
$opt_responder["S3"][1] = 3;
$opt_responder["M1"][1] = 0;
$opt_responder["M2"][1] = 0;
$opt_responder["M3"][1] = 0;
$opt_responder["M4"][1] = 0;
$opt_responder["M5"][1] = 0;
$opt_responder["M6"][1] = 0;
$opt_responder["M7"][1] = 0;
$opt_responder["M8"][1] = 0;
$opt_responder["M9"][1] = 0;
$opt_responder["M10"][1] = 0;
$opt_responder["M11"][1] = 0;
$opt_responder["M12"][1] = 0;
$opt_responder["M13"][1] = 0;
$opt_responder["M14"][1] = 0;
$opt_responder["M15"][1] = 0;
$opt_responder["M16"][1] = 0;
$opt_responder["M17"][1] = 0;

?>
