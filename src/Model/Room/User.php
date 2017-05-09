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

use Nails\Common\Model\Base;

class User extends Base
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'chat_room_user';
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
            'model'     => 'User',
            'provider'  => 'nailsapp/module-auth',
            'id_column' => 'user_id',
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
        $aIntegers[] = 'user_id';
        parent::formatObject($oObj, $aData, $aIntegers, $aBools, $aFloats);
    }
}