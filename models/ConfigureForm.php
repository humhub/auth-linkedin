<?php

namespace humhubContrib\auth\linkedin\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use humhubContrib\auth\linkedin\Module;

/**
 * The module configuration model
 */
class ConfigureForm extends Model
{
    /**
     * @var boolean Enable this authclient
     */
    public $enabled;

    /**
     * @var string the client id provided by LinkedIn
     */
    public $clientId;

    /**
     * @var string the client secret provided by LinkedIn
     */
    public $clientSecret;

    /**
     * @var string readonly
     */
    public $redirectUri;

    /**
     * @var boolean use signing with LinkedIn version 2
     */
    public $useV2;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientId', 'clientSecret'], 'required'],
            [['enabled', 'useV2'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enabled' => Yii::t('AuthLinkedinModule.base', 'Enabled'),
            'clientId' => Yii::t('AuthLinkedinModule.base', 'Client ID'),
            'clientSecret' => Yii::t('AuthLinkedinModule.base', 'Client secret'),
            'useV2' => Yii::t('AuthLinkedinModule.base', 'Use v2'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
        ];
    }

    /**
     * Loads the current module settings
     */
    public function loadSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-linkedin');

        $settings = $module->settings;

        $this->enabled = (boolean)$settings->get('enabled');
        $this->clientId = $settings->get('clientId');
        $this->clientSecret = $settings->get('clientSecret');
        $this->useV2 = $settings->get('useV2');

        $this->redirectUri = Url::to(['/user/auth/external', 'authclient' => 'linkedin'], true);
    }

    /**
     * Saves module settings
     */
    public function saveSettings()
    {
        /** @var Module $module */
        $module = Yii::$app->getModule('auth-linkedin');

        $module->settings->set('enabled', (boolean)$this->enabled);
        $module->settings->set('clientId', $this->clientId);
        $module->settings->set('clientSecret', $this->clientSecret);
        $module->settings->set('useV2', $this->useV2);

        return true;
    }

    /**
     * Returns a loaded instance of this configuration model
     */
    public static function getInstance()
    {
        $config = new static;
        $config->loadSettings();

        return $config;
    }

}
