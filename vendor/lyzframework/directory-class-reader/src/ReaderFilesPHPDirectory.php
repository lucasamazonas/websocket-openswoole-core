<?php

declare(strict_types=1);

namespace LyzFramework\DirectoryClassReader;

use DirectoryIterator;
use LyzFramework\DirectoryClassReader\Exception\DirectoryDoesNotExistException;

class ReaderFilesPHPDirectory
{
    public const PHP_EXTENSION = "php";

    private array $listFiles = [];

    /**
     * @throws DirectoryDoesNotExistException
     */
    public function __construct(string $directory)
    {
        if (!file_exists($directory)) {
            throw new DirectoryDoesNotExistException("directory $directory does not exist");
        }

        $this->loadFiles(new DirectoryIterator($directory));
    }

    protected function loadFiles(DirectoryIterator $directoryIterator): void
    {
        foreach ($directoryIterator as $fileinfo) {
            if ($fileinfo->getBasename() === '.' || $fileinfo->getBasename() === '..') continue;

            if ($fileinfo->isDir()) {
                $this->loadFiles(new DirectoryIterator($fileinfo->getRealPath()));
            }

            if ($fileinfo->getExtension() != self::PHP_EXTENSION) continue;
            $this->listFiles[] = $fileinfo->getPathname();
        }
    }

    public function getListFiles(): array
    {
        return $this->listFiles;
    }
}