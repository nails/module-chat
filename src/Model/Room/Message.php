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
        $this->addExpandableField([
            'trigger'   => 'room',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'room',
            'model'     => 'Room',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'chat_room_id',
        ]);
        $this->addExpandableField([
            'trigger'   => 'user',
            'type'      => self::EXPANDABLE_TYPE_SINGLE,
            'property'  => 'user',
            'model'     => 'RoomUser',
            'provider'  => Constants::MODULE_SLUG,
            'id_column' => 'chat_room_user_id',
        ]);
    }

    // --------------------------------------------------------------------------

    protected function formatObject(
        &$oObj,
        array $aData = [],
        array $aIntegers = [],
        array $aBools = [],
        array $aFloats = []
    ) {
        $aIntegers[] = 'chat_room_id';
        $aIntegers[] = 'chat_room_user_id';
        parent::formatObject($oObj, $aData, $aIntegers, $aBools, $aFloats);
    }
}
