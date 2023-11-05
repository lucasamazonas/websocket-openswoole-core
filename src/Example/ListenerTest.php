<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Example;

use LyzFramework\Websocket\Event\{
    StartEvent,
    OpenEvent,
    MessageEvent,
    RequestEvent,
    DisconnectEvent,
};
use LyzFramework\Websocket\Listener\{
    Listener,
    ListenerInterface
};

#[Listener(StartEvent::class)]
#[Listener(OpenEvent::class)]
#[Listener(MessageEvent::class)]
#[Listener(RequestEvent::class)]
#[Listener(DisconnectEvent::class)]
class ListenerTest implements ListenerInterface
{

    public function handler(): void
    {

    }
}