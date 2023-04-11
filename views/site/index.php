<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
$this->registerCssFile("@web/css/index.css");
?>
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval = "3000">  
      <?= Html::img("@web/img/lion1.jpg", ['class' => 'd-block w-100']) ?>
     
    
    </div>
    <div class="carousel-item"  data-bs-interval="3000" >
      <?= Html::img("@web/img/elephant.jpg", ['class' => 'd-block w-100']) ?>
     
    </div>
    <div class="carousel-item" data-bs-interval="3000">
      <?= Html::img("@web/img/lion2.jpg", ['class' => 'd-block w-100']) ?>
     
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>



<div>
  <div class="curve-image"></div>
  <div class="container-fluid mb-5 py-5  ">
    <div class="row">
      <div class="text-center   col-sm-12 col-md-6 col-lg-3 p-5  ">
        <i class="fa-solid fa-clock"></i>
        Open Today

        9:30am - 5pm

      </div>
      <div class="text-center   col-sm-12 col-md-6 col-lg-3 p-5  ">
        <i class="fa fa-ticket" aria-hidden="true"></i>

        Tickets

        Bookings and Prices
      </div>
      <div class="text-center   col-sm-12 col-md-6 col-lg-3 p-5  ">
        <i class="fa fa-map-marker" aria-hidden="true"></i>

        Visit us

        Bus and parking info
      </div>
      <div class="text-center   col-sm-12 col-md-6 col-lg-3 p-5  ">
        <i class='fa fa-calendar'></i>

        What's on

        Events
      </div>
    </div>
  </div>
</div>    


 