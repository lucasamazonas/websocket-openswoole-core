<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Event;

use LyzFramework\src\App;

class StartEvent
{

    public function __construct(
        public readonly App $app,
    )
    {
    }

}