<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Job Master';

?>
<div class="site-index">

    <div class="main-banner-bg">
        <div class="jumbotron text-center bg-transparent">
            <h1 class="text-white display-4">Job Master</h1>

            <p class="text-white lead">Become the carrier master with Job Master. Start working or hire now!.</p>

            <p><a class="btn btn-lg btn-primary" href="<?= Url::base(true) ?>/index.php?r=job">Start Working</a>
            <a class="btn btn-lg btn btn-lg btn-outline-success" href="<?= Url::base(true) ?>/index.php?r=job/create">Hire Employee</a></p>
        </div>
    </div>
    
    <div class="container body-content">

        <div class="row">
            <div class="col-lg-4">
                <h4 class="logo-title"><i class="fas fa-briefcase"></i>Checkout Job's</h4>

                <p class="text-muted" >
                We work hard to attract best companies to list jobs in our platform and our platform is growing every day with more then 1000 user registrations per day. So you will find best job's here
                </p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['job/index']) ?>"" >Checkout Now &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h4 class="logo-title"><i class="fas fa-address-card"></i>Simplified Hirings</h4>

                <p class="text-muted">
                We cut down the lot of hassel to connect with employee becuase we know as business owner you need painless hiring process.Our Site do not force to create account to see contact details so Employeer will get as much of options to explore. 
                </p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['site/login']) ?>">Checkout Now &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2 class="logo-title"><i class="fal fa-badge-percent"></i> 100% Free</h2>

                <p class="text-muted">
                We do not force plans or ads we are completly 100% free wether you are employee or employer we provide 100% complete service.You can register with us to enjoy full benift which is completly free.
                </p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['user/register']) ?>">Register Free Now!&raquo;</a></p>
            </div>
        </div>
    </div>
    <section>
          <!-- Testimonial Slider Section -->
    <section id="testimonial" class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Testimonials</h2>
                </div>
                <div class="col-12">
                    <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Slide Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#testimonialCarousel" data-slide-to="1"></li>
                            <li data-target="#testimonialCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <div class="carousel-content">
                                    <div class="client-img">
                                    <img src="<?= Url::base(true) ?>/images/testimonial1.jpg" alt="Testimonial Slider"></div>
                                    <h3>Darsy Willson<br><span>USA</span></h3>
                                    <p class="col-md-8 offset-md-2">I am using this for my startup and using Job Master made my hiring process less painfull compare to other sites.</p>
                                </div>
                            </div>
                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <div class="carousel-content">
                                    <div class="client-img"><img src="<?= Url::base(true) ?>/images/testimonial2.jpg" alt="Testimonial Slider"></div>
                                    <h3>Luwalhati <br><span>Philippines</span></h3>
                                    <p class="col-md-8 offset-md-2">
                                    We have 200 employees in our company and working as a HR manager Job Master is been such a great tool to use. I do all of my hiring from this site. I highly recommend everyone to try this out.
                                    </p>
                                </div>
                            </div>
                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <div class="carousel-content">
                                    <div class="client-img"><img src="<?= Url::base(true) ?>/images/testimonial3.jpg" alt="Testimonial Slider"></div>
                                    <h3>Kelly Watson<br><span>USA</span></h3>
                                    <p class="col-md-8 offset-md-2">
                                    I like using Job Master it made my company hiring process simpler and faster.Thanks Job Master.
                                    </p>
                                </div>
                            </div>
                            <!-- Slider pre and next arrow -->
                            <a class="carousel-control-prev text-white" href="#testimonialCarousel" role="button" data-slide="prev">
                            <i class="fas fa-chevron-left"></i>
                            </a>
                            <a class="carousel-control-next text-white" href="#testimonialCarousel" role="button" data-slide="next">
                            <i class="fas fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Slider Section -->
    </section>
</div>
