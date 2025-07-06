<?php

use humhub\components\View;
use humhub\widgets\form\ActiveForm;
use humhubContrib\auth\linkedin\models\ConfigureForm;
use yii\helpers\Html;

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
                <?= Html::a(Yii::t('AuthLinkedinModule.base', 'LinkedIn Documentation') . ' v1', 'https://www.linkedin.com/help/linkedin/answer/5070/log-in-with-linkedin-credentials?lang=en', ['class' => 'btn btn-primary btn-sm', 'target' => '_blank']); ?>
                <?= Html::a(Yii::t('AuthLinkedinModule.base', 'LinkedIn Documentation') . ' v2', 'https://learn.microsoft.com/en-us/linkedin/consumer/integrations/self-serve/sign-in-with-linkedin-v2', ['class' => 'btn btn-primary btn-sm', 'target' => '_blank']); ?>
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
            <div class="mb-3">
                <?= Html::submitButton(Yii::t('base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
