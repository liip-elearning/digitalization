<?php
/**
 * FTPs file transfer handler
 *
 * @author Patrick Meyer
 * @since d#9
 */
class FTPsHandler extends FTPHandler {
    
    /**
     * Connects to the server via using $host.
     *
     * @return TRUE, if connection to host can be established.
     */
    function connect() {
        $this->conn_id = ftp_ssl_connect($this->host);
        
        if ($this->conn_id) {
            return true;
        } else {
            return false;
        }
    }
}
?>
