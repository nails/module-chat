<?php

namespace Nails\Chat\Resource\Room;

use Nails\Common\Resource\Entity;

/**
 * Class Message
 *
 * @package Nails\Chat\Resource\Room
 */
class Message extends Entity
{
    /** @var int */
    public $chat_room_id;

    /** @var \Nails\Chat\Resource\Room */
    public $room;

    /** @var int */
    public $chat_room_user_id;

    /** @var \Nails\Chat\Resource\Room\User */
    public $user;

    /** @var string */
    public $type;

    /** @var string */
    public $body;

    /** @var bool */
    public $is_deleted;
}
