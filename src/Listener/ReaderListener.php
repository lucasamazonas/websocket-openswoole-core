<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Listener;

use LyzFramework\DirectoryClassReader\Exception\DirectoryDoesNotExistException;
use LyzFramework\DirectoryClassReader\ReaderClassDirectory;
use LyzFramework\DirectoryClassReader\ReaderFilesPHPDirectory;
use ReflectionClass;
use ReflectionException;

class ReaderListener
{

    /** @var Listener[] */
    private array $listeners;

    /**
     * @throws DirectoryDoesNotExistException
     * @throws ReflectionException
     */
    public function __construct(
        public readonly string $directory
    )
    {
        $this->load();
    }

    /**
     * @throws DirectoryDoesNotExistException
     * @throws ReflectionException
     */
    private function load(): void
    {
        $readerClassDirectory = new ReaderClassDirectory(new ReaderFilesPHPDirectory($this->directory));

        foreach ($readerClassDirectory->getListNamespace() as $namespace) {
            $reflectionClass = new ReflectionClass($namespace);

            foreach ($reflectionClass->getAttributes() as $attribute) {
                $instance = $attribute->newInstance();
                if (! $instance instanceof Listener) continue;
                $this->listeners[$instance->eventNamespace][] = $instance;
            }
        }
    }

    /** @return Listener[] */
    public function getListeners(): array
    {
        return $this->listeners;
    }
}