<?php

namespace Nails\Chat\Database\Seeder;

use Nails\Chat\Constants;
use Nails\Common\Console\Seed\Model;

class Message extends Model
{
    const CONFIG_MODEL_NAME     = 'RoomMessage';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    protected function generate(array $aFields): array
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
