# Memory Leak Monitor Library

## Overview

It's generally hard to encounter memory leaks in PHP thanks to the built-in garbage collector. However, there are situations where we inadvertently create memory usage spikes, especially when dealing with heavy logic or potentially infinite loops. For example, if you're constantly updating information in your application, it can be helpful to monitor memory usage to ensure your application remains efficient and doesn't consume unnecessary resources.

The Memory Leak Monitor Library is a PHP package designed to address these concerns. It allows you to monitor memory usage in your PHP applications and trigger exceptions when memory leaks are detected, helping you identify and address memory-related issues in your code.
## Installation
```
composer require alasaly/monitor-memory-leak
```

## Usage
Basic Usage
```php 
use Alasaly\MonitorMemoryLeak\Classes\Monitor;

$monitor = new Monitor();
//By default, it will throw exception if the memory is 100% over the memory allocated to PHP
//You can modify the limits
$monitor->setAllowedMemoryLeak(1000);

//You can set this option to false if you only want to monitor memory without terminating the process
$monitor->setThrowError(false);

$data = [];
while (true)
{

    // some heavy logic

    $data[] = "==============";

   $monitor->checkMemoryLeak(function ($usedMemory){
       // You can send telegram notification or save to logs
       var_dump($usedMemory);
   });
}
```


## Handling Memory Leak Exceptions
If a memory leak is detected and you have set $throwError to true, a MemoryReachLimitException will be thrown. You can catch and handle this exception in your code:
```php
try {
    // Monitor memory usage
    $monitor->checkMemoryLeak();
} catch (MemoryReachLimitException $e) {
    // Handle the exception here
    echo $e->getMessage();
}
```