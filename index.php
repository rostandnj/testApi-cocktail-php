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

    <title>Cockatail!</title>
</head>
<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">


    </div>
</nav>
<div class="container-fluid">



<div class="container-fluid row mt-3 mb-3">
    <form action="" class="form form-inline col-xs-8 col-xs-offset-2">
        <div class="input-group">
            <div class="input-group-btn search-panel">
                <button type="button" class="btn btn-default">
                    <span id="search_concept">Filter by</span>
                </button>
                <select name="search-type" class="form-control mr-1">
                    <option value="1">
                        Name
                    </option value="2">
                    <option>
                        ingredient
                    </option>
                </select>
            </div>

            <input type="text" class="form-control mr-1" name="key" placeholder="Search term...">
            <span class="input-group-btn">
                    <button class="btn btn-default mr-1" type="submit">Go</button>
                </span>
        </div>
    </form>
</div>
    <div class="row">

    <?php

    if($_GET['search-type'] !== null && $_GET['key'] !==null){
        if($_GET['search-type'] === "1"){
            $result = json_decode(callAPI('GET','https://www.thecocktaildb.com/api/json/v1/1/search.php?f='.$_GET['key'],[]));
        }
        else{
            $result = json_decode(callAPI('GET','https://www.thecocktaildb.com/api/json/v1/1/filter.php?i='.$_GET['key'],[]));
        }

    }
    else{
        $result = json_decode(callAPI('GET','https://www.thecocktaildb.com/api/json/v1/1/search.php?s=margarita',[]));
    }






    foreach ($result->drinks as $r){

        ?>
        <div class="card col-md-4 pb-2 pt-2 mt-3 ">
            <img class="card-img-top" src="<?php echo $r->strDrinkThumb; ?>/preview " alt="<?php echo $r->strDrink; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $r->strDrink; ?></h5>
                <p class="card-text"><?php echo $r->strCategory; ?></p>
                <a href="<?php echo $_SERVER['host']?>/cocktail_detail.php?id=<?php echo $r->idDrink; ?>" class="btn btn-primary">show</a>
            </div>
        </div>

        <?php



    }

    ?>

    </div>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="assets/js/jquery-3.2.1.slim.min.js" ></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
