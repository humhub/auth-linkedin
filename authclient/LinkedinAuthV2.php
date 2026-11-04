<?php

namespace humhubContrib\auth\linkedin\authclient;

use yii\authclient\clients\LinkedIn;

/**
 * LinkedIn allows authentication via LinkedIn OAuth.
 */
class LinkedinAuthV2 extends LinkedIn
{
    use UsernameTrait;

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
        parent::init();

        $this->scope = implode(' ', [
            'openid',
            'profile',
            'email',
        ]);
    }

    protected function initUserAttributes()
    {
        $attributes = $this->api('userinfo', 'GET');

        // Do not trust an email address which LinkedIn reports as not verified
        if (isset($attributes['email_verified']) && !filter_var($attributes['email_verified'], FILTER_VALIDATE_BOOLEAN)) {
            unset($attributes['email']);
        }

        $username = $this->buildUsername((string)($attributes['name'] ?? ''), $attributes['email'] ?? null);
        if ($username !== '') {
            $attributes['username'] = $username;
        }

        return $attributes;
    }

    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
        return [
            'id' => 'sub',
            'firstname' => 'given_name',
            'lastname' => 'family_name',
            'email' => 'email',
        ];
    }
}
