<?php

namespace EEException\Notifier;

interface NotifierInterface
{
    public function SendErrorString($message);
}
