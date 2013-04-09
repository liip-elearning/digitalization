<?php
    echo "bla";
    
    error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
    ini_set('display_errors', true);
    set_include_path(get_include_path() . PATH_SEPARATOR . 'ext/phpseclib0.3.0');
    
    require("ext/phpseclib0.3.0/Net/SFTP.php");
    
    $sftp = new Net_SFTP('dokuftp.ub.tum.de');
    if (!$sftp->login('digisem', 'varu77s!')) {
        exit('Login Failed');
    }

    echo $sftp->pwd() . "\r\n";
    print_r($sftp->nlist());
 ?>
