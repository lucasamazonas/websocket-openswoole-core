<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Event;

use OpenSwoole\Http\Request;

class OpenEvent
{

    public function __construct(
        public readonly Request $request
    )
    {
    }
}