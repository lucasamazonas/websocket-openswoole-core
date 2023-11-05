<?php

declare(strict_types=1);

use LyzFramework\DirectoryClassReader\Exception\DirectoryDoesNotExistException;
use LyzFramework\DirectoryClassReader\ReaderFilesPHPDirectory;
use LyzFramework\DirectoryClassReader\ReaderClassDirectory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ReaderClassDirectoryTest extends TestCase
{

    #[DataProvider('directoriesWithClass')]
    public function testNumberClass(string $directory, int $numberRoutes)
    {
        $readerFilesDirectory = new ReaderFilesPHPDirectory($directory);
        $readerClassDirectory = new ReaderClassDirectory($readerFilesDirectory);
        self::assertCount($numberRoutes, $readerClassDirectory->getListNamespace());
    }

    public static function directoriesWithClass(): array
    {
        return [
            [__DIR__ . '/../src', 3],
            [__DIR__ . '/../src/Exception', 1],
        ];
    }

}