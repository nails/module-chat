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

use Nails\Common\Model\Base;

class Room extends Base
{
    /**
     * Room constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'chat_room';
        $this->addExpandableField([
            'trigger'   => 'messages',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'messages',
            'model'     => 'RoomMessage',
            'provider'  => 'nailsapp/module-chat',
            'id_column' => 'chat_room_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'users',
            'type'      => self::EXPANDABLE_TYPE_MANY,
            'property'  => 'users',
            'model'     => 'RoomUser',
            'provider'  => 'nailsapp/module-chat',
            'id_column' => 'chat_room_id',
        ]);
    }
}
