<?php

use yii\helpers\Url;
$this->title = $job->title." - Job Master";
?>
<div class="container">
<div class="d-flex justify-content-between">
    <a href="<?= Url::base(true) ?>/index.php?r=job" class="mt-4 btn btn-success">Back to Jobs</a>
    <?php if($isCreator): ?>
        <div>
        <a href="<?= Url::base(true) ?>/index.php?r=job/edit&id=<?= $job->id ?>" class="mt-4 btn btn-primary">Edit</a>&nbsp;
        <button onclick="onDeleteJob(event)" data-redirect="<?= Url::base(true) ?>/index.php?r=job/delete&id=<?= $job->id ?>" class="mt-4 btn btn-danger">Delete</button>
        </div>
    <?php endif; ?>
</div>
    <h1 class="pb-2 mt-2 mb-2 pt-4 border-bottom" ><?= $job->title ?>
    <small class="text-muted"><?= $job->address ? 'in '.$job->address: '' ?></small>
    </h1>

    <?php
    if(!empty($job->description)): ?>
    <div class="card my-4">
        <div class="card-body">
            <?= $job->description ?>
        </div>
    </div>
    <?php endif; ?>

<?php
$createdDate = $job->created_at ? $job->created_at : '';
$category =  $job->category ? $job->category->name:'';
if($createdDate) {
    $datetime = strtotime($createdDate);
    $createdDate = date('F j, Y',$datetime);
}
?>

    <ul class="list-group">

    <li class="list-group-item">
    <strong>
        Listed on: 
    </strong>
    <?= $createdDate ? $createdDate : '-'?>
    </li>


    <li class="list-group-item">
    <strong>
        Category: 
    </strong>
        <?= $category ? $category : '-'?>
    </li>


    <li class="list-group-item">
    <strong>
        Job Type: 
    </strong>
        <?= $job->type ? ucfirst(str_replace('_',' ',$job->type,)) : '-'?>
    </li>

    <li class="list-group-item">
    <strong>
        Requirements: 
    </strong>
        <?= $job->requirements ? $job->requirements : '-'?>
    </li>


    <li class="list-group-item">
    <strong>
        Salary Range: 
    </strong>
        <?= $job->salary_range ? $job->salary_range : '-'?>
    </li>

    <li class="list-group-item">
    <strong>
        City: 
    </strong>
        <?= $job->city ? $job->city : '-'?>
    </li>

    <li class="list-group-item">
    <strong>
        Email: 
    </strong>
        <?= $job->contact_email ? $job->contact_email : '-'?>
    </li>

    <li class="list-group-item">
    <strong>
        Phone: 
    </strong>
        <?= $job->contact_phone ? $job->contact_phone : '-'?>
    </li>
    </ul>
    <?php
    if($job->contact_email):
    ?>
    <div class="mt-3 d-flex justify-content-end">
    <a href="mailto:<?= $job->contact_email ?>" class="btn btn-success">Contact Employeer</a>
    </div>
    <?php endif;?>
</div>
<script>
function onDeleteJob(event) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    if(event.target.getAttribute('data-redirect')) {
        window.location.replace(event.target.getAttribute('data-redirect'));
    }
  }
})
}
</script>