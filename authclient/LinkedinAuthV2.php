<?php

namespace humhubContrib\auth\linkedin\authclient;

use yii\authclient\clients\LinkedIn;

/**
 * LinkedIn allows authentication via LinkedIn OAuth.
 */
class LinkedinAuthV2 extends LinkedIn
{
    /**
     * @inheritdoc
     */
    protected function defaultViewOptions()
    {
        return [
            'popupWidth' => 860,
            'popupHeight' => 480,
            'cssIcon' => 'fa fa-linkedin',
            'buttonBackgroundColor' => '#e0492f',
        ];
    }

    public function init()
    {
        $this->scope = implode(' ', [
            'openid',
            'profile',
            'email',
        ]);
    }

    protected function initUserAttributes()
    {
        return $this->api('userinfo', 'GET');
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'id' => 'sub',
            'username' => 'displayName',
            'firstname' => 'given_name',
            'lastname' => 'family_name',
            'email' => 'email',
        ];
    }
}
