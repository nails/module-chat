<?php

namespace Nails\Chat\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class User extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'RoomUser';
    const CONFIG_MODEL_PROVIDER = 'nails/module-chat';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData                 = parent::generate($aFields);
        $aData['chat_room_id'] = $this->randomId('Room', 'nails/module-chat');
        $aData['user_id']      = $this->randomId('User', 'nails/module-auth');

        return $aData;
    }
}
