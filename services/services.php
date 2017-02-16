<?php

return [
    'models'  => [
        'Room' => function () {
            if (class_exists('\App\Chat\Room')) {
                return new \App\Chat\Room();
            } else {
                return new \Nails\Chat\Room();
            }
        },
        'RoomMessage' => function () {
            if (class_exists('\App\Chat\Room\Message')) {
                return new \App\Chat\Room\Message();
            } else {
                return new \Nails\Chat\Room\Message();
            }
        },
        'RoomUser' => function () {
            if (class_exists('\App\Chat\Room\User')) {
                return new \App\Chat\Room\User();
            } else {
                return new \Nails\Chat\Room\User();
            }
        },
    ],
];
