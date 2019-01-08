<?php

$weather = "";
/*$error = "";*/

if ($_GET['city']) {


    /*$city = str_repeat(' ', '', $_GET['city']);

    $file_headers = @get_headers("https://completewebdevelopercourse.com/locations/".$city."");

    if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {

        $error = "That city could not be found.";

    } else {*/

    $forecastPage = file_get_contents("https://completewebdevelopercourse.com/locations/London");


    $pageArray = explode('3 Day Weather Forecast Summary:</b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">', $forecastPage);

    $secondPageArray = explode('</span></span></span>', $pageArray[1]);

    $weather = $secondPageArray[0];

}

?>




<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>Weather Scraper</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


<style type="text/css">

    html {
        background: url(background.jpeg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    body {

        background: none;

    }

    .container {

         text-align: center;
        padding-top: 100px;
        width: 450px;
    }

    input {

        margin: 20px 0;

    }

    #weather {

        margin-top: 15px;

    }


</style>


</head>
<body>

    <div class="container">

        <h1>What's The Weather?</h1>


        <form>
            <div class="form-group">
                <label for="city">Enter the name of a city.</label>
                <input type="text" class="form-control" id="city" placeholder="Eg. London, Tokyo" >

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <div id="weather"><?php


            if ($weather) {

              echo  '<div class="alert alert-success" role="alert">
                '.$weather.'
                </div>';

            } else  if ($error) {

                echo '<div class="alert alert-danger" role="alert">
                ' . $error . '
                </div>';
            }


            ?></div>


    </div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>