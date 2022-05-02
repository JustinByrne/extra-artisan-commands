<?php

namespace JustinByrne\ExtraArtisanCommands\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeActionCommand extends Command
{
    public $signature = "make:action {name}";

    public $description = "Create a new action class";

    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    public function getStubPath()
    {
        return __DIR__ . "/../stubs/action.stub";
    }

    public function getStubVariables()
    {
        $namespace = "App\\Actions";
        $action_name = $this->argument("name");

        if (strpos($action_name, "/") !== false) {
            $sections = explode("/", $action_name);

            $action_name = end($sections);
            array_pop($sections);

            if (count($sections)) {
                foreach ($sections as $section) {
                    $namespace .= "\\" . $section;
                }
            }
        }

        return [
            "NAMESPACE" => $namespace,
            "ACTION_NAME" => $action_name,
        ];
    }

    public function getSourceFile()
    {
        return $this->getStubContents(
            $this->getStubPath(),
            $this->getStubVariables(),
        );
    }

    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;
    }

    public function getSourceFilePath()
    {
        return base_path("app/Actions") .
            "/" .
            $this->argument("name") .
            ".php";
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
