<?php

declare(strict_types=1);

use LyzFramework\DirectoryClassReader\Exception\DirectoryDoesNotExistException;
use LyzFramework\DirectoryClassReader\ReaderFilesPHPDirectory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ReaderFilesPHPDirectoryTest extends TestCase
{

    #[DataProvider('directoriesWithRoutes')]
    public function testNumberRoutes(string $directory, int $numberRoutes)
    {
        $readerFilesDirectory = new ReaderFilesPHPDirectory($directory);
        self::assertCount($numberRoutes, $readerFilesDirectory->getListFiles());
    }

    public static function directoriesWithRoutes(): array
    {
        return [
            [__DIR__ . '/../src', 4],
            [__DIR__ . '/../src/Exception', 1],
        ];
    }

    #[DataProvider('directoriesInvalid')]
    public function testDirectoriesInvalid(string $directory)
    {
        self::expectException(DirectoryDoesNotExistException::class);
        new ReaderFilesPHPDirectory($directory);
    }

    public static function directoriesInvalid(): array
    {
        return [
            [__DIR__ . '/1234567890'],
            [__DIR__ . '/../src/A'],
            [__DIR__ . '/../ABC'],
            [__DIR__ . '/A'],
            [__DIR__ . '/../src/Examples/A/B/C/D'],
        ];
    }

}