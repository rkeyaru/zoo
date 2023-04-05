<?php
// $this->registerJsFile("@web/js/main.js");
// $this->registerCssFile("@web/css/style.css");

use app\assets\AppAsset;

AppAsset::register($this);

?>



<!-- <button class="btn btn-sm btn-success" onclick="showUsers()">Show users</button> -->
<div class="container m-5">
    <div class="row row-cols-1 row-cols-lg-3 justify-content-center">
        <div class="col py-1 p">
            <div class="dashboard1 p-5 text-center">
                <i class="fa-regular fa-roller-coaster fa-3x"></i>
                <h1 class="text-light" id="zooCount">Zoo count:<?= $zooCount ?> </h1>
                <button onclick="showZoos()" id="zoo" class=" mt-2 btn btn-dark">Show Zoos</button>
            </div>
        </div>
        <div class="col py-1">
            <div class="dashboard2 p-5 text-center">

                <!-- <i class="fa-solid fa-user fa-3x"></i> -->
                <h1 class="text-light" id="userCount">User count:<?= $userCount ?></h1>
                <button onclick="showUsers()" id="user" class=" mt-2 btn btn-dark">Show User </button>
            </div>
        </div>
        <div class="col py-1">
            <div class="dashboard3 px-3 py-5 text-center">
                <!-- <span>  <i class="fa-solid fa-hippo fa-3x"></i></span> -->
                <h1 class="text-light" id="animalCount">Animal count:<?= $animalCount ?> </h1>
                <button onclick="showAnimals()" id="animal" class=" mt-2 btn btn-dark">Show Animal </button>
            </div>
        </div>
    </div><br><br>
    <div id="data">

    </div>
</div>


<div id="del">

</div>