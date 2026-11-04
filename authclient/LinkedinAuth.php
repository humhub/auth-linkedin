<?php

namespace humhubContrib\auth\linkedin\authclient;

use yii\authclient\clients\LinkedIn;

/**
 * LinkedIn allows authentication via LinkedIn OAuth.
 */
class LinkedinAuth extends LinkedIn
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

    /**
     * @inheritdoc
     */
    protected function initUserAttributes()
    {
        $attributes = parent::initUserAttributes();

        $attributes['firstname'] = $this->getLocalizedValue($attributes['firstName'] ?? null);
        $attributes['lastname'] = $this->getLocalizedValue($attributes['lastName'] ?? null);

        $username = $this->buildUsername(
            trim($attributes['firstname'] . ' ' . $attributes['lastname']),
            $attributes['email'] ?? null,
        );
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
            'title' => 'tagline',
        ];
    }

    /**
     * Returns the first value of a LinkedIn localized field, e.g. `['localized' => ['en_US' => 'John']]`
     *
     * @param mixed $field
     * @return string
     */
    private function getLocalizedValue($field): string
    {
        $values = is_array($field) && is_array($field['localized'] ?? null) ? array_values($field['localized']) : [];

        return isset($values[0]) && is_string($values[0]) ? $values[0] : '';
    }
}
