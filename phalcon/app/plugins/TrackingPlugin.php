<?php

namespace Sehub\Plugins;

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Dispatcher;
use Phalcon\Mvc\Dispatcher\Exception as DispatcherException;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;


/**
 * NotFoundPlugin
 *
 * Handles not-found controller/actions
 */
class TrackingPlugin extends Plugin
{

    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $this->logger->info('=============');
        $this->logger->info('New request:');
        $this->logger->info('-------------');
        $this->logger->info('IP: ' . $this->request->getClientAddress());
        $this->logger->info('URL: ' . $this->request->getURI());
        $this->logger->info('User-Agent: ' . $this->request->getUserAgent());
        $this->logger->info('Headers: ' . json_encode($this->request->getHeaders()));
        $this->logger->info('=============');
    }
}


