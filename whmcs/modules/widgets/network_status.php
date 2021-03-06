<?php

use WHMCS\Input\Sanitize;

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function widget_network_status_gettable() {
    global $_ADMINLANG;

$content = '<div class="fixed-height-container">
<table class="table table-condensed">
<tr style="background-color:#efefef;font-weight:bold;text-align:center"><td>'.$_ADMINLANG['mergefields']['servername'].'</td><td>HTTP</td><td>'.$_ADMINLANG['home']['load'].'</td><td>'.$_ADMINLANG['home']['uptime'].'</td><td>'.$_ADMINLANG['home']['percentuse'].'</td></tr>
';

    $id = '';
    $result = select_query("tblservers","",array("disabled"=>"0"),"name","ASC");
    while ($data = mysql_fetch_array($result)) {
        $id = $data["id"];
        $name = $data['name'];
        $ipaddress = $data['ipaddress'];
        $maxaccounts = $data['maxaccounts'];
        $statusaddress = $data['statusaddress'];
        $active = $data['active'];
        $active = ($active) ? '*' : '';
        $numaccounts = get_query_val("tblhosting","COUNT(*)","server='$id' AND (domainstatus='Active' OR domainstatus='Suspended')");
        $percentuse = @round(($numaccounts / $maxaccounts) * 100, 0);
        $http = $serverload = $uptime = "-";
        if (isset($_POST['checknetwork'])) {
            $http = @ fsockopen($ipaddress, 80, $errno, $errstr, 5);
            $http = ($http) ? "Online" : "Offline";
            if ($statusaddress) {
                if (strpos($statusaddress, 'index.php') === false) {
                    if (substr($statusaddress, -1, 1) != '/') {
                        $statusaddress .= '/';
                    }

                    $statusaddress .= 'index.php';
                }

                $filecontents = curlCall($statusaddress, false);

                $serverload = Sanitize::encode(preg_match('/<load>(.*?)<\/load>/i', $filecontents, $matches) ? $matches[1] : '-');
                $uptime = Sanitize::encode(preg_match('/<uptime>(.*?)<\/uptime>/i', $filecontents, $matches) ? $matches[1] : '-');
            }
        }
        $content .= '<tr bgcolor="#ffffff"><td align="center">'.$name.'</td><td align="center">'.$http.'</td><td align="center">'.$serverload.'</td><td align="center">'.$uptime.'</td><td align="center">'.$percentuse.'%</td></tr>';
    }
    if (!$id) $content .= '<tr bgcolor="#ffffff"><td colspan="5" align="center">'.$_ADMINLANG['global']['norecordsfound'].'</td></tr>';

    $content .= '</table>
</div>';

    return $content;

}

function widget_network_status($vars) {
    global $_ADMINLANG;

    if (isset($_POST['checknetwork'])) {
        echo widget_network_status_gettable();
        exit;
    }

    $title = $_ADMINLANG['home']['networkstatus'];

    $content = '<div id="networkstatustable" style="max-height:150px;overflow:auto;">
            ' . widget_network_status_gettable() . '
        </div>
        <div class="widget-footer">
            <a href="#" onclick="checknetworkstatus();return false" class="btn btn-info btn-sm">
                ' . $_ADMINLANG['home']['checknow'] . ' &raquo;
            </a>
        </div>';

    $jscode = 'function checknetworkstatus() {
    $("#networkstatustable").html("'.str_replace('"','\"',$vars['loading']).'");
    $.post("index.php", { checknetwork: 1 },
    function(data){
        jQuery("#networkstatustable").html(data);
    });
}';

    return array('title'=>$title,'content'=>$content,'jscode'=>$jscode);

}

add_hook("AdminHomeWidgets",1,"widget_network_status");
