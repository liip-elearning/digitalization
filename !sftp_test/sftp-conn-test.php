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
    flush();

    //$connected = ssh2_auth_password($ssh_resource, "digisem", "varu77s!");
    
    $ftp_resource = ssh2_sftp($ssh_resource);
    if ($ftp_resource)
    {
        echo "2: \$ftp_resource: OK<br>\n";
        flush();
        $connected = ftp_login($ftp_resource, "digisem", "varu77s!");
        if ($connected)
        { 
            echo "3: \$login: OK<br>\n";
        } else {
            echo "3: \$login: failed<br>\n";
        }

        flush();
    }  else {
        echo "2: sftp failed";
    }
    
/*
    $connected = ftp_login($ftp_resource, "digisem", "varu77s!");


    if ($connected)
    { 
        echo "2: \$connected: OK<br>\n";


        //Login successful. Request the SFTP subsystem
        //$ftp_resource = ssh2_sftp($ssh_resource);

        //Check if SFTP connection was established
        if ($ftp_resource)
        {

            echo "3: \$ftp_resource: OK<br>\n";

        }  else {
            echo "3: sftp failed";
        }
    } else {
        echo "2: auth failed";
    }
*/

} else {
    echo "1: ssh failed";
}


?>
