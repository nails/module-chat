<?php

return [
    'models'  => [
        'Room' => function () {
            if (class_exists('\App\Chat\Model\Room')) {
                return new \App\Chat\Model\Room();
            } else {
                return new \Nails\Chat\Model\Room();
            }
        },
        'RoomMessage' => function () {
            if (class_exists('\App\Chat\Model\Room\Message')) {
                return new \App\Chat\Model\Room\Message();
            } else {
                return new \Nails\Chat\Model\Room\Message();
            }
        },
        'RoomUser' => function () {
            if (class_exists('\App\Chat\Model\Room\User')) {
                return new \App\Chat\Model\Room\User();
            } else {
                return new \Nails\Chat\Model\Room\User();
            }
        },
    ],
];
