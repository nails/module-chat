<?php

namespace Nails\Chat\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class User extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'RoomUser';
    const CONFIG_MODEL_PROVIDER = 'nailsapp/module-chat';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData                 = parent::generate($aFields);
        $aData['chat_room_id'] = $this->randomId('Room', 'nailsapp/module-chat');
        $aData['user_id']      = $this->randomId('User', 'nailsapp/module-auth');

        return $aData;
    }
}
