<?php

namespace Nails\Chat\Resource\Room;

use Nails\Common\Resource\Entity;

/**
 * Class User
 *
 * @package Nails\Chat\Resource\Room
 */
class User extends Entity
{
    /** @var int */
    public $chat_room_id;

    /** @var \Nails\Chat\Resource\Room */
    public $room;

    /** @var int */
    public $user_id;

    /** @var \Nails\Auth\Resource\User */
    public $user;

    /** @var bool */
    public $is_active;

    /** @var bool */
    public $is_deleted;
}
