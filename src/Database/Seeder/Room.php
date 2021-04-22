<?php

namespace Nails\Chat\Database\Seeder;

use Nails\Chat\Constants;
use Nails\Common\Console\Seed\Model;

class Room extends Model
{
    const CONFIG_MODEL_NAME     = 'Room';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;
}
