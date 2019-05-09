<?php

use Illuminate\Foundation\Console\Kernel;

class Kernel extends Kernel
{
    protected $bootstrappers = [];

    protected function renderException($output, Exception $e)
    {
        throw $e;
    }
}
