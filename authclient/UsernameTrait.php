<?php

namespace humhubContrib\auth\linkedin\authclient;

use Yii;

/**
 * Builds a username suggestion for the registration form from the LinkedIn profile data.
 */
trait UsernameTrait
{
    /**
     * @param string $name full name, e.g. "John Doe"
     * @param string|null $email used as fallback when the name is empty
     * @return string
     */
    protected function buildUsername(string $name, ?string $email = null): string
    {
        if (trim($name) === '' && !empty($email)) {
            $name = (string)strstr($email, '@', true);
        }

        $username = preg_replace('/[^\p{L}\d_\-@.]+/u', '.', $name);

        return mb_substr(trim($username, '.'), 0, Yii::$app->getModule('user')->maximumUsernameLength);
    }
}
