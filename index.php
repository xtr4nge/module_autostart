<? 
/*
	Copyright (C) 2013-2014 xtr4nge [_AT_] gmail.com

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
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>FruityWifi</title>
<script src="../js/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<link rel="stylesheet" href="../css/jquery-ui.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="../../../style.css" />

<script>
$(function() {
    $( "#action" ).tabs();
    $( "#result" ).tabs();
});

</script>

</head>
<body>

<? include "../menu.php"; ?>

<br>

<?

include "../../config/config.php";
include "../../login_check.php";
include "_info_.php";
include "../../functions.php";

// Checking POST & GET variables...
if ($regex == 1) {
	regex_standard($_POST["newdata"], "msg.php", $regex_extra);
    regex_standard($_GET["logfile"], "msg.php", $regex_extra);
    regex_standard($_GET["action"], "msg.php", $regex_extra);
    regex_standard($_POST["service"], "msg.php", $regex_extra);
}

$newdata = $_POST['newdata'];
$logfile = $_GET["logfile"];
$action = $_GET["action"];
$tempname = $_GET["tempname"];
$service = $_POST["service"];

// DELETE LOG
if ($logfile != "" and $action == "delete") {
    $exec = "$bin_rm ".$mod_logs_history.$logfile.".log";
    //exec("$bin_danger \"$exec\"", $dump); //DEPRECATED
    exec_fruitywifi($exec);
}

include "includes/options_config.php";

?>

<div class="rounded-top" align="left"> &nbsp; <b><?=$mod_alias?></b> </div>
<div class="rounded-bottom">

    &nbsp;&nbsp;version <?=$mod_version?><br>
    <? 
    $isinstalled = exec("dpkg-query -s php5-curl|grep -iEe '^status.+installed'");
    if ($isinstalled != "") {
        echo "$mod_alias <font style='color:lime'>installed</font><br>";
    } else {
        echo "$mod_alias <a href='includes/module_action.php?install=install_autostart' style='color:red'>install</a><br>";
    }
    ?>
    
    <?
    $ismoduleup = exec("grep 'FruityWifi-autostart.php' /etc/rc.local");
    if ($ismoduleup != "") {
        echo "$mod_alias  <font color=\"lime\"><b>enabled</b></font>.&nbsp; | <a href=\"includes/module_action.php?service=responder&action=stop&page=module\"><b>stop</b></a>";
    } else { 
        echo "$mod_alias  <font color=\"red\"><b>disabled</b></font>. | <a href=\"includes/module_action.php?service=responder&action=start&page=module\"><b>start</b></a>"; 
    }
    ?>

</div>

<br>


<div id="msg" style="font-size:largest;">
Loading, please wait...
</div>

<div id="body" style="display:none;">


    <div id="result" class="module">
        <ul>
            <li><a href="#result-1">Output</a></li>
            <li><a href="#result-2">Options</a></li>
            <li><a href="#result-3">History</a></li>
        </ul>
        
        <!-- OUTPUT -->

        <div id="result-1">
            <form id="formLogs-Refresh" name="formLogs-Refresh" method="POST" autocomplete="off" action="index.php">
            <input type="submit" value="refresh">
            <br><br>
            <?
                if ($logfile != "" and $action == "view") {
                    $filename = $mod_logs_history.$logfile.".log";
                } else {
                    $filename = $mod_logs;
                }
            
                $data = open_file($filename);
                
                // REVERSE
                //$data_array = explode("\n", $data);
                //$data = implode("\n",array_reverse($data_array));
                
            ?>
            <textarea id="output" class="module-content" style="font-family: courier;"><?=htmlspecialchars($data)?></textarea>
            <input type="hidden" name="type" value="logs">
            </form>
            
        </div>

        <!-- OPTIONS -->

        <div id="result-2" class="module-options">
            <form id="formInject" name="formInject" method="POST" autocomplete="off" action="includes/save.php">
            <input type="submit" value="save">
            <br><br>
            
            <div class="module-options" s-tyle="background-color:#000; border:1px dashed;">
            <table>
                <!-- // OPTION S1:Wireless --> 
                <tr>
                    <? $opt = "S1"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td><?=$opt_responder[$opt][2]?></td>
                    <td></td>
                </tr>
                <!-- // OPTION S2:Karma --> 
                <tr>
                    <? $opt = "S2"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION S3:Mana --> 
                <tr>
                    <? $opt = "S3"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                 <!-- // OPTION S4:Supplicant --> 
                <tr>
                    <? $opt = "S4"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>               
                
                <!-- // OPTION M1:ngrep --> 
                <tr>
                    <? $opt = "M1"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M2:SSLStrip --> 
                <tr>
                    <? $opt = "M2"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M3:DNSSpoof --> 
                <tr>
                    <? $opt = "M3"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M4:MDK3 --> 
                <tr>
                    <? $opt = "M4"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M5:Squid3 --> 
                <tr>
                    <? $opt = "M5"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M6:Kismet --> 
                <tr>
                    <? $opt = "M6"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M7:Captive --> 
                <tr>
                    <? $opt = "M7"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M8:URLSnarf --> 
                <tr>
                    <? $opt = "M8"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M9:Tcpdump --> 
                <tr>
                    <? $opt = "M9"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
				<!-- // OPTION M10:Ettercap --> 
                <tr>
                    <? $opt = "M10"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
				<!-- // OPTION M11:Autossh --> 
                <tr>
                    <? $opt = "M11"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
				<!-- // OPTION M12:Rpitwit --> 
                <tr>
                    <? $opt = "M12"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M13:Whatsapp --> 
                <tr>
                    <? $opt = "M13"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M14:3g_4g --> 
                <tr>
                    <? $opt = "M14"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M15:Nessus --> 
                <tr>
                    <? $opt = "M15"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M16:Tor --> 
                <tr>
                    <? $opt = "M16"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
                <!-- // OPTION M17:Phishing --> 
                <tr>
                    <? $opt = "M17"; ?>
                    <td><input type="checkbox" name="options[]" value="<?=$opt?>" <? if ($opt_responder[$opt][0] == "1") echo "checked" ?> ></td>
                    <td style="padding-right:10px"><?=$opt_responder[$opt][2]?></td>
                    <td nowrap></td>
                </tr>
               				
            </table>
            </div>

            <input type="hidden" name="type" value="opt_responder">
            </form>
            <br>
            <?
                $filename = "$mod_path/includes/mode_d.txt";
                
                $data = open_file($filename);
                
            ?>
            
        </div>

        <!-- HISTORY -->

        <div id="result-3">
            <input type="submit" value="refresh">
            <br><br>
            
            <?
            $logs = glob($mod_logs_history.'*.log');
            print_r($a);

            for ($i = 0; $i < count($logs); $i++) {
                $filename = str_replace(".log","",str_replace($mod_logs_history,"",$logs[$i]));
                echo "<a href='?logfile=".str_replace(".log","",str_replace($mod_logs_history,"",$logs[$i]))."&action=delete&tab=2'><b>x</b></a> ";
                echo $filename . " | ";
                echo "<a href='?logfile=".str_replace(".log","",str_replace($mod_logs_history,"",$logs[$i]))."&action=view'><b>view</b></a>";
                echo "<br>";
            }
            ?>
            
        </div>
        
    </div>

    <div id="loading" class="ui-widget" style="width:100%;background-color:#000; padding-top:4px; padding-bottom:4px;color:#FFF">
        Loading...
    </div>

    <script>
    $('#formLogs').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'includes/ajax.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);

                $('#output').html('');
                $.each(data, function (index, value) {
                    $("#output").append( value ).append("\n");
                });
                
                $('#loading').hide();
            }
        });
        
        $('#output').html('');
        $('#loading').show()

    });

    $('#loading').hide();

    </script>

    <script>
    $('#form1').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'includes/ajax.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);

                $('#output').html('');
                $.each(data, function (index, value) {
                    if (value != "") {
                        $("#output").append( value ).append("\n");
                    }
                });
                
                $('#loading').hide();

            }
        });
        
        $('#output').html('');
        $('#loading').show()

    });

    $('#loading').hide();

    </script>

    <script>
    $('#formInject2').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'includes/ajax.php',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);

                $('#inject').html('');
                $.each(data, function (index, value) {
                    $("#inject").append( value ).append("\n");
                });
                
                $('#loading').hide();
                
            }
        });
        
        $('#output').html('');
        $('#loading').show()

    });

    $('#loading').hide();

    </script>

    <?
    if ($_GET["tab"] == 1) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 1 });";
        echo "</script>";
    } else if ($_GET["tab"] == 2) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 2 });";
        echo "</script>";
    } else if ($_GET["tab"] == 3) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 3 });";
        echo "</script>";
    } else if ($_GET["tab"] == 4) {
        echo "<script>";
        echo "$( '#result' ).tabs({ active: 4 });";
        echo "</script>";
    } 
    ?>

</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#body').show();
    $('#msg').hide();
});
</script>

</body>
</html>
