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
        $this->table = NAILS_DB_PREFIX . 'room';
        $this->addExpandableField(
            [
                'trigger'   => 'message',
                'type'      => self::EXPANDABLE_TYPE_MANY,
                'property'  => 'message',
                'model'     => 'RoomMessage',
                'provider'  => 'nailsapp/module-chat',
                'id_column' => 'room_id',
            ]
        );
        $this->addExpandableField(
            [
                'trigger'   => 'user',
                'type'      => self::EXPANDABLE_TYPE_MANY,
                'property'  => 'user',
                'model'     => 'RoomUser',
                'provider'  => 'nailsapp/module-chat',
                'id_column' => 'room_id',
            ]
        );
    }
}
