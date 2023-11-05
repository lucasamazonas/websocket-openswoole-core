<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Event;

use OpenSwoole\WebSocket\Server;

class StartEvent
{

    public function __construct(
        public readonly Server $server,
    )
    {
    }

}