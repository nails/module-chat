<?php

/**
 * This model handles interactions with Nails' "room_message" table.
 *
 * @package     Nails
 * @subpackage  module-chat
 * @author      Nails Dev Team <hello@nailsapp.co.uk>
 * @category    model
 */

namespace Nails\Chat\Model;

use Nails\Common\Model\Base;

class Message extends Base
{
    /**
     * Message constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'chat_room_message';
    }
}
