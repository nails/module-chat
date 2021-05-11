<?php

use Nails\Chat\Model;
use Nails\Chat\Resource;

return [
    'models'    => [
        'Room' => function (): Model\Room {
            if (class_exists('\App\Chat\Model\Room')) {
                return new \App\Chat\Model\Room();
            } else {
                return new Model\Room();
            }
        },
        'RoomMessage' => function (): Model\Room\Message {
            if (class_exists('\App\Chat\Model\Room\Message')) {
                return new \App\Chat\Model\Room\Message();
            } else {
                return new Model\Room\Message();
            }
        },
        'RoomUser' => function (): Model\Room\User {
            if (class_exists('\App\Chat\Model\Room\User')) {
                return new \App\Chat\Model\Room\User();
            } else {
                return new Model\Room\User();
            }
        },
    ],
    'resources' => [
        'Room'        => function ($oObj): Resource\Room {
            if (class_exists('\App\Chat\Resource\Room')) {
                return new \App\Chat\Resource\Room($oObj);
            } else {
                return new Resource\Room($oObj);
            }
        },
        'RoomMessage' => function ($oObj): Resource\Room\Message {
            if (class_exists('\App\Chat\Resource\Room\Message')) {
                return new \App\Chat\Resource\Room\Message($oObj);
            } else {
                return new Resource\Room\Message($oObj);
            }
        },
        'RoomUser'    => function ($oObj): Resource\Room\User {
            if (class_exists('\App\Chat\Resource\Room\User')) {
                return new \App\Chat\Resource\Room\User($oObj);
            } else {
                return new Resource\Room\User($oObj);
            }
        },
    ],
];
