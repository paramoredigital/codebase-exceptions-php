<?php

namespace EEException\Notifier;

require_once(realpath(__DIR__).'/NotifierInterface.php');
require_once(realpath(__DIR__).'/../vendor/php-airbrake/src/Airbrake/Client.php');
require_once(realpath(__DIR__).'/../vendor/php-airbrake/src/Airbrake/Configuration.php');

class Codebase implements NotifierInterface
{
    /**
     * @var string
     */
    private $_apiKey;

    /**
     * @param string $apiKey
     */
    function __construct($apiKey)
    {
        $this->_apiKey = $apiKey;
    }

    /**
     * @param $message
     * @return string
     */
    public function SendErrorString($message)
    {
        $apiKey  = $this->_apiKey;
        $options = $this->_getConfigOptions();

        $config = new \Airbrake\Configuration($apiKey, $options);
        $client = new \Airbrake\Client($config);

        return $client->notifyOnError($message);
    }

    protected function _getConfigOptions()
    {
        return array(
            'apiEndPoint' => 'https://exceptions.codebasehq.com/notifier_api/v2/notices',
            'timeout' => 30
        );
    }
}