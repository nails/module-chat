<?php

namespace Nails\Chat\Api\Controller;

use Nails\Api;
use Nails\Chat\Constants;
use Nails\Factory;

class Room extends Api\Controller\DefaultController
{
    const REQUIRE_AUTH          = true;
    const CONFIG_MODEL_NAME     = 'Room';
    const CONFIG_MODEL_PROVIDER = Constants::MODULE_SLUG;

    // --------------------------------------------------------------------------

    public function getMessages()
    {
        /** @var \Nails\Common\Service\Input $oInput */
        $oInput = Factory::service('Input');
        /** @var \Nails\Chat\Model\Room $oRoomModel */
        $oRoomModel = Factory::model('Room', Constants::MODULE_SLUG);
        /** @var \Nails\Chat\Model\Room\Message $oMessageModel */
        $oMessageModel = Factory::model('RoomMessage', Constants::MODULE_SLUG);

        //  Validate the room
        $iRoomId = $oInput->get('room_id');

        /** @var \Nails\Chat\Resource\Room $oRoom */
        $oRoom = $oRoomModel->getById($iRoomId, ['expand' => ['users']]);

        if (empty($oRoom)) {
            throw new Api\Exception\ApiException('Invalid Room Id', 404);
        }

        //  Is user in the room?
        $bUserInRoom = false;
        /** @var \Nails\Chat\Resource\Room\User $oRoomUser */
        foreach ($oRoom->users->data as $oRoomUser) {
            if ($oRoomUser->user_id === activeUser('id')) {
                $bUserInRoom = true;
                break;
            }
        }

        if (!$bUserInRoom) {
            throw new Api\Exception\ApiException('You are not in this room.', 401);
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

        /** @var \Nails\Chat\Resource\Room\Message $oMessage */
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

        return Factory::factory('ApiResponse', Api\Constants::MODULE_SLUG)
                        ->setData($aOut);
    }
}
