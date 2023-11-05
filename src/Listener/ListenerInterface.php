<?php

declare(strict_types=1);

namespace LyzFramework\Websocket\Listener;

interface ListenerInterface
{

    public function handler(): void;

}