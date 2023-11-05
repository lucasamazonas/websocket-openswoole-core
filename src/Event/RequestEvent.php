<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Event;

use OpenSwoole\Http\{Request, Response};

class RequestEvent
{

    public function __construct(
        public readonly Request $request,
        public readonly Response $response
    )
    {
    }
}