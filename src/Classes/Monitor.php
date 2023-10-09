<?php

namespace Alasaly\MonitorMemoryLeak\Classes;

use Alasaly\MonitorMemoryLeak\Exceptions\MemoryReachLimitException;

class Monitor
{

    public function __construct()
    {
        $this->startMemory = memory_get_usage();
    }

    private int $startMemory;

    private bool $throwError = true;

    private float $allowedMemoryLeakPercentage = 100;


    /**
     * @param $throwError
     * @return self
     */
    public function setThrowError($throwError): static
    {
        $this->throwError = $throwError;
        return $this;
    }

    /**
     * @param float $allowedMemoryLeakPercentage
     * @return $this
     */
    public function setAllowedMemoryLeak(float $allowedMemoryLeakPercentage): static
    {
        $this->allowedMemoryLeakPercentage = $allowedMemoryLeakPercentage;
        return $this;
    }

    /**
     * This function will trigger an exception if the memory leak reach the limits in $allowedMemoryLeakPercentage,
     * and if $throwError is set to true
     *
     * By default, it will throw exception if the memory is 100% over the memory allocated to PHP
     * @throws MemoryReachLimitException
     */
    public function checkMemoryLeak(Callable $callBackFunction = null)
    {
        if ($callBackFunction) {
            $callBackFunction(memory_get_usage());
        }

        if ((memory_get_usage() / $this->startMemory) >= (2*$this->allowedMemoryLeakPercentage / 100)) {
            {
                if ($this->throwError) {
                    throw new MemoryReachLimitException("Memory leak by detected%\n start memory: {$this->startMemory} \n end memory: " . memory_get_usage());
                }
            }
        }
    }

}