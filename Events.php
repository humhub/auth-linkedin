<?php

namespace humhubContrib\auth\linkedin;

use humhub\components\Event;
use humhub\modules\user\authclient\Collection;
use humhubContrib\auth\linkedin\authclient\LinkedinAuth;
use humhubContrib\auth\linkedin\authclient\LinkedinAuthV2;
use humhubContrib\auth\linkedin\models\ConfigureForm;

class Events
{
    /**
     * @param Event $event
     */
    public static function onAuthClientCollectionInit($event)
    {
        /** @var Collection $authClientCollection */
        $authClientCollection = $event->sender;

        if (!empty(ConfigureForm::getInstance()->enabled)) {
            $authClientCollection->setClient('linkedin', [
                'class' => ConfigureForm::getInstance()->useV2 ? LinkedinAuthV2::class : LinkedinAuth::class,
                'clientId' => ConfigureForm::getInstance()->clientId,
                'clientSecret' => ConfigureForm::getInstance()->clientSecret,
            ]);
        }
    }

}
