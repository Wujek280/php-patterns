<?php
file_put_contents('tmp', null);

//
// Wiki : Decorator pattern is a design pattern
// that allows behavior to be added to an individual object,
// dynamically, without affecting the behavior of other objects
// from the same class
//
// Decorator consist of 3 components

/** 1. Interface */
interface LoggerInterface
{
    public function log(string $message);
}

/**
 * 2. Component that will trigger descendant Classes
 */
class FileLogger implements LoggerInterface
{
    public function log(string $msg)
    {
        echo "Logging to FILE '{$msg}'". PHP_EOL;
    }
}

/* 3. Decorator */
abstract class LoggerDecorator implements LoggerInterface
{
    /** Where instance live */
    protected $Logger;

    public function __construct(LoggerInterface $instance)
    {
        $this->Logger = $instance;
    }

    /** Actual logging on descendant instances */
    public function log(string $msg)
    {
        $this->Logger->log($msg);
        file_put_contents('tmp', $msg . PHP_EOL);
    }
}

/**
 * EmailLogger
 * 4 Decorators Component
 */
class EmailLogger extends LoggerDecorator
{
    public function log(string $msg)
    {
        $this->Logger->log($msg);
        echo "Logging START_EMAIL ". PHP_EOL;
    }
}

/**
 * EmailLogger
 * 4 Decorators Component
 */
class TelegramLogger extends LoggerDecorator
{
    public function log(string $msg)
    {
        $this->Logger->log($msg);
        echo "Logging START_TELEGRAM ". PHP_EOL;
    }
}

$log = new FileLogger();

/** Notify Descendant, pass instance */
$log = new EmailLogger($log);
$log = new TelegramLogger($log);

$log->log("Testing decorator pattern");
