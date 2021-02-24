<?php

namespace Nails\Chat\Seed;

use Nails\Chat\Constants;
use Nails\Common\Console\Seed\DefaultSeed;

class Message extends DefaultSeed
{
    const CONFIG_MODEL_NAME     = 'RoomMessage';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    protected function generate($aFields)
    {
        $aData                      = parent::generate($aFields);
        $aData['chat_room_id']      = $this->randomId('Room', Constants::MODULE_SLUG);
        $aData['chat_room_user_id'] = $this->randomId(
            'RoomUser',
            Constants::MODULE_SLUG,
            [
                'where' => [
                    ['chat_room_id', $aData['chat_room_id']],
                ],
            ]
        );

        return $aData;
    }
}
