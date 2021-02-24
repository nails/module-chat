<?php

namespace Nails\Chat\Seed;

use Nails\Chat\Constants;
use Nails\Common\Console\Seed\DefaultSeed;

class Room extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'Room';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
}
