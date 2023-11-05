<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Event;

use OpenSwoole\WebSocket\Frame;

class MessageEvent
{

    public function __construct(
        public readonly Frame $frame,
    )
    {
    }

}