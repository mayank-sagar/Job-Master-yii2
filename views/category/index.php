<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = "Categories - Job Master";
?>
<div class="container">
    <h1 class="pb-2 mt-4 mb-2 pt-4 border-bottom" >Categories
    <?php if($isAdmin): ?>
        <a class="btn btn-primary float-right" href="<?= Url::base(true) ?>/index.php?r=category/create">Create</a>
    <?php endif; ?>
    </h1>
<?php
$msg = yii::$app->getSession()->getFlash('msg');
if($msg):
?>
<div class="alert alert-success"> <?= $msg ?> </div>
<?php endif; ?>

    <ul class="list-group">
    
    <?php if(count($categories) == 0 ): ?>
        <li class="list-group-item">
            No catgeories found.
        </li>
    <?php endif; ?>

        <?php foreach($categories as $category) : ?>
            <li class="list-group-item">
                <a href="<?= Url::base(true) ?>/index.php?r=job&category=<?= $category->slug ?>"><?= $category->name ?></a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?= 
    LinkPager::widget([
        'pagination' => $pagination
    ]);
    ?>
</div>

