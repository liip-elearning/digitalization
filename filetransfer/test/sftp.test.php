<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

include('../stub.php');
include('../ftp.php');
include('../sftp.php');

$ftp = new SFTPHandler('ftp.lrz.de', 'lu26ves', 'm00d1e-DEV%');


if (!$ftp) {
    "1. Class init failed";
    die();
} else {
    echo "1: Init OK<br />\n";
}


if (!$ftp->connect()) {
    "2. Connect failed";
    die();
} else {
    echo "2: Connect OK<br />\n";
}


if (!$ftp->login()) {
    "3. Login failed";
    die();
} else {
    echo "3: Login OK<br />\n";
}


echo "4: Try to get remote file list on absolut path: '/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test'<br />\n";
$list = $ftp->listDir('/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test');
if (is_array($list) && count($list) > 0) {
    echo ".....OK; List content: ";
    print_r($list);
    echo "<br />\n";
} else {
    echo ".....FAILED: listDir(...)<br />\n";
    die();
}



echo "5: Try to download remote file: '/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test/test/copyTestOriginal.pdf' to same dir with name 'copyTestCopy.pdf'<br />\n";

if (file_exists("/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test/test/copyTestCopy.pdf")) {
    unlink("/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test/test/copyTestCopy.pdf");
}

$newFile = fopen("copyTestCopy.pdf", "w");
$ftp->recvFile('/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test/test/copyTestOriginal.pdf', $newFile);


if (file_exists("/nfs/web_tumtest_moodle/www/s/lu26ves/webserver/htdocs/mod/digitalization/!sftp_test/test/copyTestCopy.pdf")) {
    echo ".....OK; Downloaded file: <a href=\"copyTestCopy.pdf\">new file</a><br />\n";
} else {
    echo ".....FAILED: Can not download file<br />\n";
    die();
}


echo "<br />\n<b>Test completed</b>";



?>
