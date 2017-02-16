<?php

/**
 * This model handles interactions with Nails' "room_user" table.
 *
 * @package     Nails
 * @subpackage  module-chat
 * @author      Nails Dev Team <hello@nailsapp.co.uk>
 * @category    model
 */

namespace Nails\Chat\Model;

use Nails\Common\Model\Base;

class User extends Base
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = NAILS_DB_PREFIX . 'room_user';
    }
}
