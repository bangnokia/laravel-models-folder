<?php

namespace BangNokia\LaravelModelsFolder\Tests;

use Artisan;
use Orchestra\Testbench\TestCase;

class ModelMakeCommandTest extends TestCase
{
    protected $consoleOutput;

    public function setUp(): void
    {
        parent::setUp();
        exec('mkdir '.__DIR__.'/app');
    }

    public function getPackageProviders($app)
    {
        return [\BangNokia\LaravelModelsFolder\ModelsFolderServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path'] = __DIR__.'/app';
    }

    /** @test */
    public function it_create_model_in_models_folder()
    {
        Artisan::call('make:model Test');

        $this->assertEquals('Model created successfully.', trim(Artisan::output()));
        $this->assertFileExists(__DIR__.'/app/Models/Test.php');
        $this->assertFileExists(__DIR__.'/app/Models/Model.php');
    }

    public function tearDown(): void
    {
        parent::tearDown();
        exec('rm -rf '.__DIR__.'/app');
    }
}
