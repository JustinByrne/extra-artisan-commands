<?php

namespace JustinByrne\ExtraArtisanCommands\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class TraitMakeCommand extends Command
{
    public $signature = "make:trait {name}";

    public $description = "Create a new trait";

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
            $this->info("Trait created successfully.");

            return self::SUCCESS;
        } else {
            $this->error("Trait already exists!");

            return self::FAILURE;
        }
    }

    public function getStubPath()
    {
        return __DIR__ . "/../stubs/trait.stub";
    }

    public function getStubVariables()
    {
        $namespace = "App\\Traits";
        $trait_name = $this->argument("name");

        if (strpos($trait_name, "/") !== false) {
            $sections = explode("/", $trait_name);

            $trait_name = end($sections);
            array_pop($sections);

            if (count($sections)) {
                foreach ($sections as $section) {
                    $namespace .= "\\" . $section;
                }
            }
        }

        return [
            "NAMESPACE" => $namespace,
            "TRAIT_NAME" => $trait_name,
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
        return base_path("app/Traits") . "/" . $this->argument("name") . ".php";
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
