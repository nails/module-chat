<?php

namespace Nails\Api\Chat;

use Nails\Api\Controller\DefaultController;
use Nails\Factory;

class Room extends DefaultController
{
    const REQUIRE_AUTH          = true;
    const CONFIG_MODEL_NAME     = 'Room';
    const CONFIG_MODEL_PROVIDER = 'nailsapp/module-chat';

    // --------------------------------------------------------------------------

    public function getMessages()
    {
        $oInput        = Factory::service('Input');
        $oRoomModel    = Factory::model('Room', 'nailsapp/module-chat');
        $oMessageModel = Factory::model('RoomMessage', 'nailsapp/module-chat');

        try {

            //  Validate the room
            $iRoomId = $oInput->get('room_id');
            $oRoom   = $oRoomModel->getById($iRoomId, ['expand' => ['users']]);

            if (empty($oRoom)) {
                throw new \Exception('Invalid Room Id', 404);
            }

            //  Is user in the room?
            $bUserInRoom = false;
            foreach ($oRoom->users->data as $oRoomUser) {
                if ($oRoomUser->user_id === activeUser('id')) {
                    $bUserInRoom = true;
                    break;
                }
            }

            if (!$bUserInRoom) {
                throw new \Exception('You are not in this room.', 401);
            }

            $iPage     = (int) $oInput->get('page') ?: 0;
            $iPerPage  = (int) $oInput->get('per_page') ?: static::CONFIG_MAX_ITEMS_PER_PAGE;
            $aMessages = $oMessageModel->getAll(
                $iPage,
                $iPerPage,
                [
                    'expand' => [
                        ['user', ['expand' => ['user']]],
                    ],
                    'where'  => [
                        ['chat_room_id', $oRoom->id],
                    ],
                ]
            );

            $aOut = [];
            foreach ($aMessages as $oMessage) {
                $aOut[] = (object) [
                    'id'      => $oMessage->id,
                    'type'    => $oMessage->type,
                    'body'    => auto_typography($oMessage->body),
                    'created' => $oMessage->created,
                    'user'    => (object) [
                        'id'         => $oMessage->user->user->id,
                        'first_name' => $oMessage->user->user->first_name,
                        'last_name'  => $oMessage->user->user->last_name,
                        'avatar'     => cdnAvatar($oMessage->user->user->id, 150, 150),
                    ],
                ];
            }

            return [
                'messages' => $aOut,
            ];

        } catch (\Exception $e) {
            return [
                'status' => $e->getCode() ?: 500,
                'error'  => $e->getMessage(),
            ];
        }
    }
}
