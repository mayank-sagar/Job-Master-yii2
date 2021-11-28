<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form ActiveForm */
$this->title = "Create New Category - Job Master";
?>
<div class="container">
<div class="d-flex justify-content-between">
    <a href="<?= Url::base(true) ?>/index.php?r=category" class="mt-4 btn btn-success">Back to Categories</a>
</div>
<div class="category-create">
<h2 class="pb-2 mt-4 mb-2  pt-4 border-bottom"  >Create New Category</h2>


    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'slug') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- category-create -->

</div>
