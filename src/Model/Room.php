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
        $this->addExpandableField([
            'trigger'   => 'messages',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'messages',
            'model'     => 'RoomMessage',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'chat_room_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'users',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'users',
            'model'     => 'RoomUser',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'chat_room_id',
        ]);
    }
}
