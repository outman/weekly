<?php
namespace Example;

use MySQLReplication\Event\EventSubscribers;
use MySQLReplication\Event\DTO\EventDTO;

class MySQLEventSubscribers extends EventSubscribers
{
    public function allEvents(EventDTO $event)
    {
        echo $event;
    }
}
