<?php

namespace CodebaseNotifier\UseCases;

require_once(realpath(__DIR__) . '/../Notifier/Airbrake.php');

class SendErrorString
{
    /**
     * @var \CodebaseNotifier\Notifier\NotifierInterface
     */
    private $_notifier;

    /**
     * @param \CodebaseNotifier\Notifier\NotifierInterface $_notifier
     */
    function __construct(\CodebaseNotifier\Notifier\NotifierInterface $_notifier)
    {
        $this->_notifier = $_notifier;
    }

    /**
     * @param string $message
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function execute($message)
    {
        if (!is_string($message) OR strlen($message) === 0)
            throw new \InvalidArgumentException('Message must be non-empty string.');

        $this->_notifier->SendErrorString($message);

        return true;
    }
}
