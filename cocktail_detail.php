<?php
include_once 'api.php';


?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Cockatail detail</title>
</head>
<body class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    </div>
</nav>
<div class="row">

    <?php

    $result = json_decode(callAPI('GET','https://www.thecocktaildb.com/api/json/v1/1/lookup.php?i='.$_GET['id'],[]));


    if($result === null){

        ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h3>Nothing found</h3>
        </div>
    </div>

        <?php

    }
    else{

    ?>
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img src="<?php echo $result->drinks[0]->strDrinkThumb; ?>/preview " alt="<?php echo $result->drinks[0]->strDrink; ?>" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h3>Product Id: <span><?php echo $result->drinks[0]->idDrink ?> </span></h3>
                        <h4>Product Name: <span><?php echo $result->drinks[0]->strDrink ?> </span></h4>

                        <p> <?php echo $result->drinks[0]->strInstructions ?></p>

                    </div>
                </div>
            </div>
        </div>


        <?php
    }

    ?>



</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.2.1.slim.min.js" ></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
