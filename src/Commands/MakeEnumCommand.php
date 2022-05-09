<?php

namespace JustinByrne\ExtraArtisanCommands\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeEnumCommand extends Command
{
    public $signature = "make:enum {name} {type=string}";

    public $description = "Create a new enum class";

    protected $files;

    protected $types = ['string', 'int'];

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    public function handle()
    {

        if ($this->validate() === false)
            return;

        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    public function getStubPath()
    {
        return __DIR__ . "/../stubs/enum.stub";
    }

    public function getStubVariables()
    {
        $namespace = "App\\Enums";
        $enum_name = $this->argument("name");
        $type = $this->argument("type");

        if (strpos($enum_name, "/") !== false) {
            $sections = explode("/", $enum_name);

            $service_name = end($sections);
            array_pop($sections);

            if (count($sections)) {
                foreach ($sections as $section) {
                    $namespace .= "\\" . $section;
                }
            }
        }

        return [
            "NAMESPACE" => $namespace,
            "ENUM_NAME" => $enum_name,
            "TYPE" => $type,
        ];
    }

    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables()
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
        return base_path("app/Enums") . "/" . $this->argument("name") . ".php";
    }

    protected function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    protected function validate()
    {
        if ((double)phpversion() < 8.1) {
            $this->error('Enumerations are only allowed since PHP 8.1, your PHP version is: ' . phpversion() . '!');
            return false;
        }

        if (!in_array($this->argument("type"), $this->types)) {
            $this->error('Enum backing type must be \'int\' or \'string\'');
            return false;
        };
    }
}
