<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = "Login - Job Master";
?>
<div class="container">
<div class="d-flex justify-content-between">
    <a href="<?= Url::base(true) ?>/index.php?r=register" class="mt-4 btn btn-success">Register Now!</a>
</div>                                                                                                   
<div class="job-create mt-4">
<?php
        $msg = yii::$app->getSession()->getFlash('msg');
        if($msg):?>
        <div class="alert alert-success"> <?= $msg ?> </div>
<?php endif; ?>
<h2 class="pb-2 mt-4 mb-2  pt-4 border-bottom"  >Login</h2>
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
</div>
</div>