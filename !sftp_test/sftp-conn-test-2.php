<?php
/**
 *
 * @author Tobias Niedl
 * @since d#9
 */

echo "Test 6<br>\n";

//Open connection to the remote host via SSH

$ssh_resource = ssh2_connect("dokuftp.ub.tum.de", 22);

//$ssh_resource = ftp_connect("dokuftp.ub.tum.de", 22);

//Login on the remote host
if ($ssh_resource) 
{
    echo "1: \$ssh_resource: OK<br>\n";

    $data = ssh2_auth_none( $ssh_resource , "dokuftp" );
    print_r($data);

} else {
    echo "1: ssh failed";
}


?>
