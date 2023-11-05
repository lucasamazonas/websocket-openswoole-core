<?php

declare(strict_types=1);

namespace LyzFramework\DirectoryClassReader;

class ReaderClassDirectory
{

    protected array $listNamespace = [];

    public function __construct(ReaderFilesPHPDirectory $readerFilesPHPDirectory)
    {
        $this->load($readerFilesPHPDirectory);
    }

    private function load(ReaderFilesPHPDirectory $readerClassDirectory): void
    {
        $files = $readerClassDirectory->getListFiles();

        foreach ($files as $file) {
            $namespace = extractNamespace($file);
            if (is_null($namespace)) continue;
            $this->listNamespace[] = $namespace;
        }
    }

    public function getListNamespace(): array
    {
        return $this->listNamespace;
    }

}