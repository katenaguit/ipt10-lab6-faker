<?php
require "vendor/autoload.php";

use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('ipt10');
$log->pushHandler(new StreamHandler('ipt10.log'));

$log->warning('John Doe'); 
$log->error('john.doe@example.com'); 
$log->info('profile', [
    'student_number' => '123456', 
    'college' => 'Engineering', 
    'program' => 'Computer Science', 
    'university' => 'Sample University' 
]);

class TestClass
{
    private $logger;

    public function __construct($logger_name)
    {
        $this->logger = new Logger($logger_name);
        
        $this->logger->info(__FILE__ . " Greetings to {$logger_name}");
    }

    public function greet($name)
    {
        $message = "Greetings to {$name}";
        
        $this->logger->info(__METHOD__ . " " . $message);
        
        return $message;
    }

    public function getAverage($data)
    {
        $this->logger->info(__CLASS__ . " get the average");

        if (empty($data)) {
            return 0;
        }
        $average = array_sum($data) / count($data);
        return $average;
    }

    public function largest($data)
    {
        $this->logger->info(__CLASS__ . " Get the largest number");

        if (empty($data)) {
            return null;
        }
        return max($data);
    }

    public function smallest($data)
    {
        $this->logger->info(__CLASS__ . " Get the smallest number");

        if (empty($data)) {
            return null;
        }
        return min($data);
    }
}

$my_name = 'Jane Doe'; 
$obj = new TestClass('TestLogger');
echo $obj->greet($my_name) . PHP_EOL;

$data = [100, 345, 4563, 65, 234, 6734, -99];
echo "Average: " . $obj->getAverage($data) . PHP_EOL;
echo "Largest: " . $obj->largest($data) . PHP_EOL;
echo "Smallest: " . $obj->smallest($data) . PHP_EOL;

$log->info('data', $data);
$log->info('object', [
    'greeting' => $obj->greet($my_name),
    'average' => $obj->getAverage($data),
    'largest' => $obj->largest($data),
    'smallest' => $obj->smallest($data),
]);