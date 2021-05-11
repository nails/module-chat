<?php

/**
 * This model handles interactions with Nails' "room_message" table.
 *
 * @package     Nails
 * @subpackage  module-chat
 * @author      Nails Dev Team <hello@nailsapp.co.uk>
 * @category    model
 */

namespace Nails\Chat\Model\Room;

use Nails\Chat\Constants;
use Nails\Common\Model\Base;

class Message extends Base
{
    const TABLE_NAME          = NAILS_DB_PREFIX . 'chat_room_message';
    const RESOURCE_NAME       = 'RoomMessage';
    const RESOURCE_PROVIDER   = Constants::MODULE_SLUG;
    const DEFAULT_SORT_COLUMN = 'id';
    const DEFAULT_SORT_ORDER  = self::SORT_ASC;

    // --------------------------------------------------------------------------

    /**
     * Message constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this
            ->hasOne('room', 'Room', Constants::MODULE_SLUG, 'chat_room_id')
            ->hasOne('user', 'RoomUser', Constants::MODULE_SLUG, 'chat_room_user_id');
    }
}
