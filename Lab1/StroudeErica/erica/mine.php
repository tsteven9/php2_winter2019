<?php
    echo '<!DOCTYPE html>';
    echo '<html lang="en">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1">';

    // BootStrap CSS bootstrap-4.2.1-dist
    echo '<link rel="stylesheet" href="php2_winter2019/Lab1/StroudeErica/css/bootstrap.min.css">';

    // jQuery
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';

    // BootStrap JS bootstrap-4.2.1-dist
    echo '<script src="php2_winter2019/Lab1/StroudeErica/js/bootstrap.bundle.min.js"></script>';

    // JavaScript
    echo '<script type="text/javascript" src="php2_winter2019/Lab1/StroudeErica/js/myjs.js"></script>';
    // Custom CSS
    echo '<link rel="stylesheet" href="php2_winter2019/Lab1/StroudeErica/css/custom.css">';
    echo '</head>';
    echo '<title>First Page</title>';
    echo '</head>';
    echo '<body>';
    // Main div
    echo '<div id="image">';
    echo '<h1>Hello World</h1>';
    echo '<p>This is my <b>first</b> page for PHP Programming with MySQL II.</p>';
    // Sun div
    echo '<div id="sun">';

    echo '</div>';

    echo '</div>';
    echo '<button id="button" type="submit">Change it!</button>';

    // Sign in form
    echo '<form id="signin" class="form-inline">';
    echo '<p id="form">Please sign in</p>';
    echo '<label class="sr-only" for="inlineFormInputName2">Name</label>';
    echo '<input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">';

    echo '<label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>';
    echo '<div class="input-group mb-2 mr-sm-2">';
    echo '<div class="input-group-prepend">';
    echo '<div class="input-group-text">@</div>';
    echo '</div>';
    echo '<input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">';
    echo '</div>';

    echo '<div class="form-check mb-2 mr-sm-2">';
    echo '<input class="form-check-input" type="checkbox" id="inlineFormCheck">';
    echo '<label class="form-check-label" for="inlineFormCheck">';
    echo 'Remember me';
    echo '</label>';
    echo '</div>';

    echo '<button type="submit" class="btn btn-primary mb-2">Submit</button>';
    echo '</form>';

    echo '<footer>&copy; 2019 <p id="sources">Sources: commons.wikimedia.org/wiki/File:Kanchenjunga_India.jpg</p></footer>';


    // JavaScript
    echo '<script>';
        echo '$("#button").click(function() {';

        echo 'document.body.style.backgroundColor = "#ED6353";';

        echo 'document.getElementById("image").style.backgroundImage = "url(\'images/kanchenjunga.jpg\')";';
        echo 'document.getElementById("image").style.backgroundRepeat = "no-repeat";';
        echo 'document.getElementById("image").style.backgroundPosition = "bottom";';
        echo 'document.getElementById("image").style.backgroundSize = "cover";';

        echo 'document.getElementById("sun").style.visibility = "visible";';


        echo 'document.getElementById("button").style.display = "none";';
        echo 'document.getElementById("signin").style.visibility = "visible";';

        echo 'document.getElementById("sources").style.visibility = "visible";';

        echo '});';



    echo '</script>';
    echo '</body>';
    echo '</html>';