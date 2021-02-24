<?php

namespace Nails\Chat\Seed;

use Nails\Auth;
use Nails\Chat\Constants;
use Nails\Common\Console\Seed\DefaultSeed;

class User extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'RoomUser';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData                 = parent::generate($aFields);
        $aData['chat_room_id'] = $this->randomId('Room', Constants::MODULE_SLUG);
        $aData['user_id']      = $this->randomId('User', Auth\Constants::MODULE_SLUG);

        return $aData;
    }
}
