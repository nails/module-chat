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
        'Room'        => function ($resource, $model): Resource\Room {
            if (class_exists('\App\Chat\Resource\Room')) {
                return new \App\Chat\Resource\Room($resource, $model);
            } else {
                return new Resource\Room($resource, $model);
            }
        },
        'RoomMessage' => function ($resource, $model): Resource\Room\Message {
            if (class_exists('\App\Chat\Resource\Room\Message')) {
                return new \App\Chat\Resource\Room\Message($resource, $model);
            } else {
                return new Resource\Room\Message($resource, $model);
            }
        },
        'RoomUser'    => function ($resource, $model): Resource\Room\User {
            if (class_exists('\App\Chat\Resource\Room\User')) {
                return new \App\Chat\Resource\Room\User($resource, $model);
            } else {
                return new Resource\Room\User($resource, $model);
            }
        },
    ],
];
