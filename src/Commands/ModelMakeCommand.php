<?php

namespace BangNokia\LaravelModelsFolder\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseModelMakeCommand;

class ModelMakeCommand extends BaseModelMakeCommand
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent model class in Models folder';

    /**
     * Execute console command.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        parent::handle();

        $this->createBaseModel();
    }

    /**
     * Create base model class.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function createBaseModel()
    {
        $name = $this->qualifyClass('Model');
        $path = $this->getPath($name);

        if (!$this->files->exists($path)) {
            $this->files->put(
                $path,
                $this->files->get(__DIR__.'/../../stubs/model.base.stub')
            );
        }
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub()
    {
        if ($this->option('pivot')) {
            return __DIR__.'/../../stubs/pivot.model.stub';
        }

        return __DIR__.'/../../stubs/model.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Models';
    }
}
