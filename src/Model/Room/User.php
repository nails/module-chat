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
    const TABLE_NAME = NAILS_DB_PREFIX . 'chat_room_user';

    // --------------------------------------------------------------------------

    /**
     * User constructor.
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
            'model'     => 'User',
            'provider'  => Auth\Constants::MODULE_SLUG,
            'id_column' => 'user_id',
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
        $aIntegers[] = 'user_id';
        parent::formatObject($oObj, $aData, $aIntegers, $aBools, $aFloats);
    }
}
