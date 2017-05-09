<?php

namespace Nails\Chat\Seed;

use Nails\Common\Console\Seed\DefaultSeed;

class Message extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'RoomMessage';
    const CONFIG_MODEL_PROVIDER = 'nailsapp/module-chat';

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData                      = parent::generate($aFields);
        $aData['chat_room_id']      = $this->randomId('Room', 'nailsapp/module-chat');
        $aData['chat_room_user_id'] = $this->randomId(
            'RoomUser',
            'nailsapp/module-chat',
            [
                'where' => [
                    ['chat_room_id', $aData['chat_room_id']],
                ],
            ]
        );

        return $aData;
    }
}
