<?php

declare(strict_types=1);

use LyzFramework\Websocket\Listener\ReaderListener;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ReadListenerTest extends TestCase
{

    #[DataProvider('directoriesWithClass')]
    public function testNumberClass(string $directory, int $numberRoutes)
    {
        $readerListener = new ReaderListener($directory);
        self::assertCount($numberRoutes, $readerListener->getListeners());
    }

    public static function directoriesWithClass(): array
    {
        return [
            [__DIR__ . '/../src', 5],
            [__DIR__ . '/../src/Example', 5],
        ];
    }

}