<?php

namespace humhubContrib\auth\linkedin;

use yii\helpers\Url;

/**
 * @inheritdoc
 */
class Module extends \humhub\components\Module
{
    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/auth-linkedin/admin']);
    }
}
