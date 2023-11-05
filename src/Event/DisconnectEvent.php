<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Event;

class DisconnectEvent
{

    public function __construct(
        public readonly int $fd,
    )
    {
    }

}