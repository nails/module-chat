<?php

namespace Nails\Chat\Database\Seeder;

use Nails\Auth;
use Nails\Chat\Constants;
use Nails\Common\Console\Seed\Model;

class User extends Model
{
    const CONFIG_MODEL_NAME     = 'RoomUser';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    protected function generate(array $aFields): array
    {
        $aData                 = parent::generate($aFields);
        $aData['chat_room_id'] = $this->randomId('Room', Constants::MODULE_SLUG);
        $aData['user_id']      = $this->randomId('User', Auth\Constants::MODULE_SLUG);

        return $aData;
    }
}
