<?php

use humhub\components\View;
use humhub\widgets\bootstrap\Button;
use humhub\widgets\bootstrap\Link;
use humhub\widgets\form\ActiveForm;
use humhubContrib\auth\linkedin\models\ConfigureForm;

/* @var $this View */
/* @var $model ConfigureForm */
?>

<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Yii::t('AuthLinkedinModule.base', '<strong>LinkedIn</strong> Sign-In configuration') ?></div>
        <div class="panel-body">
            <p>
                <?= Yii::t('AuthLinkedinModule.base', 'Please follow the LinkedIn instructions to create the required <strong>OAuth client</strong> credentials.'); ?>
            </p>
            <p>
                <?= Link::primary(Yii::t('AuthLinkedinModule.base', 'LinkedIn Documentation') . ' v1')
                    ->link('https://www.linkedin.com/help/linkedin/answer/5070/log-in-with-linkedin-credentials?lang=en')
                    ->blank()
                    ->sm()
                    ->loader(false) ?>
                <?= Link::primary(Yii::t('AuthLinkedinModule.base', 'LinkedIn Documentation') . ' v2')
                    ->link('https://learn.microsoft.com/en-us/linkedin/consumer/integrations/self-serve/sign-in-with-linkedin-v2')
                    ->blank()
                    ->sm()
                    ->loader(false) ?>
            </p>
            <br/>
            <?php $form = ActiveForm::begin(['id' => 'configure-form', 'enableClientValidation' => false, 'enableClientScript' => false]); ?>
            <?= $form->field($model, 'enabled')->checkbox(); ?>
            <br/>
            <?= $form->field($model, 'useV2')->checkbox(); ?>
            <br/>
            <?= $form->field($model, 'clientId'); ?>
            <?= $form->field($model, 'clientSecret'); ?>
            <br/>
            <?= $form->field($model, 'redirectUri')->textInput(['readonly' => true]); ?>
            <br/>
            <?= Button::save()->submit() ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
