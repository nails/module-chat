<?php

namespace Nails\Chat\Resource;

use Nails\Common\Resource\Entity;

/**
 * Class Room
 *
 * @package Nails\Chat\Resource
 */
class Room extends Entity
{
    /** @var string */
    public $slug;

    /** @var string */
    public $label;

    /** @var bool */
    public $is_deleted;

    /** @var \Nails\Common\Resource\ExpandableField */
    public $messages;

    /** @var \Nails\Common\Resource\ExpandableField */
    public $users;
}
