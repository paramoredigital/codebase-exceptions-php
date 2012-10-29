<?php

namespace EEException\UseCases;

require_once(realpath(__DIR__) . '/../Notifier/Codebase.php');

class SendErrorString
{
    /**
     * @var \EEException\Notifier\Codebase
     */
    private $_notifier;

    /**
     * @param \EEException\Notifier\Codebase $_notifier
     */
    function __construct(\EEException\Notifier\Codebase $_notifier)
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
