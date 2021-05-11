<?php

/**
 * This model handles interactions with Nails' "room_user" table.
 *
 * @package     Nails
 * @subpackage  module-chat
 * @author      Nails Dev Team <hello@nailsapp.co.uk>
 * @category    model
 */

namespace Nails\Chat\Model\Room;

use Nails\Auth;
use Nails\Chat\Constants;
use Nails\Common\Model\Base;

class User extends Base
{
    const TABLE_NAME        = NAILS_DB_PREFIX . 'chat_room_user';
    const RESOURCE_NAME     = 'RoomUser';
    const RESOURCE_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->hasOne('room', 'Room', Constants::MODULE_SLUG, 'chat_room_id')
            ->hasOne('user', 'User', Auth\Constants::MODULE_SLUG);
    }
}
