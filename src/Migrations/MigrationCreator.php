<?php

namespace Vinelab\NeoEloquent\Migrations;

use Illuminate\Database\Migrations\MigrationCreator as IlluminateMigrationCreator;

class MigrationCreator extends IlluminateMigrationCreator
{
    
    protected $name = null;
    
    /**
     * Create a new migration at the given path.
     *
     * @param  string  $name
     * @param  string  $path
     * @param  string|null  $table
     * @param  bool  $create
     * @return string
     *
     * @throws \Exception
     */
    public function create($name, $path, $table = null, $create = false)
    {
        $this->name = $name;
        return parent::create($name, $path, $table = null, $create = false);
    }

    /**
     * Populate the place-holders in the migration stub.
     *
     * @param string $stub
     * @param string $label
     *
     * @return string
     */
    protected function populateStub($stub, $label)
    {
        $stub = str_replace('{{class}}', studly_case($name), $stub);

        // Here we will replace the label place-holders with the label specified by
        // the developer, which is useful for quickly creating a labels creation
        // or update migration from the console instead of typing it manually.
        if (!is_null($label)) {
            $stub = str_replace('{{label}}', $label, $stub);
        }

        return $stub;
    }

    /**
     * {@inheritDoc}
     */
    public function getStubPath()
    {
        return __DIR__.'/stubs';
    }
}
