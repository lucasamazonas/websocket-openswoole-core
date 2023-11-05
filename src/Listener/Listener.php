<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Listener;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS)]
class Listener
{

    public function __construct(
        public readonly string $eventNamespace
    )
    {
    }

}