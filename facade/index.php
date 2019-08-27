<?php

//--== ADAPTER PATTERN SIMPLIFIES API ==--//

/**
 * Logging Utility
 */
final class Logger  {

    public $lines = [];

    public function log(string $msg)
    {
        $this->lines[] = $msg;
    }

    public function read()
    {
        print_r($this->lines);
    }

}

final class ConnectionManager{

}

final class MessageManager {

    public function __construct(ConnectionManager $cm)
    {
        $this->ConnectionManager = $cm;
    }

    /**
     * Write to tmp/logs
     */
    private function _sendMessage($msg){
        $logMsg = "SENDING ... " . strlen($msg) * 8 . " bytes. SHA1 = " .sha1($msg) . "\n";
        file_put_contents("./tmp", $logMsg, FILE_APPEND);
        echo $logMsg;
    }

    public function createAndServe(string $msg)
    {
        $this->_sendMessage($msg);
    }
}

final class PageFacate
{

    /**
     * Facade Instanciation
     */
    public function __construct()
    {
        $cm = new ConnectionManager("localhost:2137");
        $this->Logger = new Logger();
        $this->MessageManager = new MessageManager( $cm );
    }

    /**
     * Facade Send + Log
     *
     * @param [type] $msg
     * @return void
     */
    public function sendMessage($msg)
    {
        $this->Logger->log("$msg");
        $this->MessageManager->createAndServe("$msg");
    }
}

/** RUN */

$app = new PageFacate();

$app->sendMessage("HELLO FROM SERVERSIDE");