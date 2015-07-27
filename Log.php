<?php
class Log
{
    public $fileName;
    public $handle;
    public function __construct($prefix = 'log') 
    {
        $this->fileName = "logs/$prefix-" . date('Y-m-d') . ".log";
        $this->handle = fopen($this->fileName, 'a');
    }

    public function __destruct()
    {
        fclose($this->handle);
    }

    public function message($logLevel, $message)
    {
        date_default_timezone_set('America/Chicago');

        $message = date('Y-m-d') . "   " . date('H:i:s') . "   [{$logLevel}] $message";
        fwrite($this->handle, $message . PHP_EOL);
    }
    public function info($info)
    {
        return $this->message("INFO", $info);
    }
    public function error($error)
    {
        return $this->message("ERROR", $error);
    }
}
?>