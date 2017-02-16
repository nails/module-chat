<?php

namespace Nails\Api\Chat;

use Nails\Api\Controller\DefaultController;

class Room extends DefaultController
{
    const REQUIRE_AUTH          = true;
    const CONFIG_MODEL_NAME     = 'Room';
    const CONFIG_MODEL_PROVIDER = 'nailsapp/module-chat';
}
