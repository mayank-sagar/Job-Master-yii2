<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form ActiveForm */
$this->title = "Create New Job - Job Master";
?>
<div class="container">   
<div class="d-flex justify-content-between">
    <a href="<?= Url::base(true) ?>/index.php?r=job" class="mt-4 btn btn-success">Back to Jobs</a>
</div>                                                                                                   
<div class="job-create mt-4">
<h2 class="pb-2 mt-4 mb-2  pt-4 border-bottom"  >Create New Job</h2>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($job, 'category_id')->dropDownList(
        $categories,
        ['prompt' => 'Select Category']
    ) ?>
    <?= $form->field($job, 'title') ?>
    <?= $form->field($job, 'description')->textarea([
        'rows' => 5
    ]) ?>
    <?= $form->field($job, 'type')->dropDownList(
        $type,
        ['prompt' => 'Select Job Type']
    )  ?>
    <?= $form->field($job, 'requirements') ?>
    <?= $form->field($job, 'salary_range')->dropDownList(
        $salaryRange,
        ['prompt' => 'Select Salary Range']
    )  ?>
    <?= $form->field($job, 'city') ?>
    <?= $form->field($job, 'address') ?>
    <?= $form->field($job, 'contact_email') ?>
    <?= $form->field($job, 'contact_phone') ?>
    <?= $form->field($job, 'is_published')->radioList([
        1 => 'Yes',
        0 => 'No'
    ],[
        'unselect' => 'Yes'
    ]) ?>
    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>

</div><!-- job-create -->
</div>
