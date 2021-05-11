<?php

/**
 * This model handles interactions with Nails' "room" table.
 *
 * @package     Nails
 * @subpackage  module-chat
 * @author      Nails Dev Team <hello@nailsapp.co.uk>
 * @category    model
 */

namespace Nails\Chat\Model;

use Nails\Chat\Constants;
use Nails\Common\Model\Base;

class Room extends Base
{
    const TABLE_NAME        = NAILS_DB_PREFIX . 'chat_room';
    const RESOURCE_NAME     = 'Room';
    const RESOURCE_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    /**
     * Room constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->hasMany('messages', 'RoomMessage', 'chat_room_id', Constants::MODULE_SLUG)
            ->hasMany('users', 'RoomUser', 'chat_room_id', Constants::MODULE_SLUG);
    }
}
