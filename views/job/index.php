<?php
/* @var $this yii\web\View */
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = "Jobs - Job Master";
?>
<div class="container">
    <h1 class="pb-2 mt-4 mb-2 pt-4 border-bottom" >Jobs<a class="btn btn-primary float-right" href="<?= Url::base(true) ?>/index.php?r=job/create">Post Job!</a></h1>
    <?php
        $msg = yii::$app->getSession()->getFlash('msg');
        if($msg):?>
        <div class="alert alert-success"> <?= $msg ?> </div>
    <?php endif; ?>
    <div class="row">
    <?php
    if(count($jobs) === 0): ?>
        <div class="col-12">
            No Jobs found.
        </div>
    <?php endif; ?>
        <?php foreach($jobs as $job): ?>
        <div class="col-sm-6 col-md-3">
            <div class="card job-card">
                <div class="card-body">
                    <h5 class="card-title"><?= $job->title ? $job->title : '-' ?></h5>
                    <p class="card-text"><strong>Description:</strong>
                    
                    <?php
                    $description = strip_tags($job->description ? $job->description : '');
                    if($description && strlen($description) > 80) {
                        $formatedDescription = substr($description,0,80);
                        $description = $formatedDescription.'...';
                    }
                    ?>
                    <?= $description ?  $description : '-' ?>
                    </p>
                    <p class="card-text"><strong>City:</strong> <?= $job->city ? $job->city : '-' ?> </p>
                    <p class="card-text"><strong>Address:</strong> <?= $job->address ? $job->address : '-' ?> </p>
                    
                    <?php
                    $createdDate = $job->created_at ? $job->created_at : '';
                    if($createdDate) {
                        $datetime = strtotime($createdDate);
                        $createdDate = date('F j, Y',$datetime);
                    }
                    ?>
                    <p class="card-text"><strong>Listed On:</strong> <?= $createdDate ? $createdDate : '-' ?> </p>
                    <div class="d-flex justify-content-end">
                    <a href="<?= Url::base(true) ?>/index.php?r=job/detail&id=<?= $job->id ?>" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?= 
    LinkPager::widget([
        'pagination' => $pagination 
    ])
    ?>
</div>
