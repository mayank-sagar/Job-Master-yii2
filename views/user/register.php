<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $user app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-register">
<div class="container">   
<div class="d-flex justify-content-between">
    <a href="<?= Url::base(true) ?>/index.php?r=site/login" class="mt-4 btn btn-success">Already have an account!</a>
</div>                                                                                                   
<div class="job-create mt-4">
<h2 class="pb-2 mt-4 mb-2  pt-4 border-bottom"  >Register Yourself.</h2>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($user, 'name') ?>
    <?= $form->field($user, 'username') ?>
    <?= $form->field($user, 'email') ?>
    <?= $form->field($user, 'password')->passwordInput() ?>
    <?= $form->field($user, 'confirm_password')->passwordInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div><!-- user-register -->
