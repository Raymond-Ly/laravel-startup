<?php

namespace App\Console;

class TestMakeCommand extends \Illuminate\Foundation\Console\TestMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:test-custom {name : The name of the class} {--unit : Create a unit test} {--path= : Create a test in path}';

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $path = $this->option('path');
        if (!is_null($path)) {
            return $rootNamespace . '\Unit' . $path;
        }

        return $rootNamespace . '\Unit';
    }
}
