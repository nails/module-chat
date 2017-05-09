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

use Nails\Common\Model\Base;

class Message extends Base
{
    /**
     * Message constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table             = NAILS_DB_PREFIX . 'chat_room_message';
        $this->defaultSortColumn = 'id';
        $this->defaultSortOrder  = 'asc';
        $this->addExpandableField([
            'trigger'   => 'room',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'room',
            'model'     => 'Room',
            'provider'  => 'nailsapp/module-chat',
            'id_column' => 'chat_room_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'user',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'user',
            'model'     => 'RoomUser',
            'provider'  => 'nailsapp/module-chat',
            'id_column' => 'chat_room_user_id',
        ]);
    }

    // --------------------------------------------------------------------------

    protected function formatObject(
        &$oObj,
        $aData = [],
        $aIntegers = [],
        $aBools = [],
        $aFloats = []
    ) {
        $aIntegers[] = 'chat_room_id';
        $aIntegers[] = 'chat_room_user_id';
        parent::formatObject($oObj, $aData, $aIntegers, $aBools, $aFloats);
    }
}
