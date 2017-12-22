<?php

require_once("vendor/autoload.php");

class MainController extends Controller {

    function render() {
        $mainPageTemplate = new Template();
        echo $mainPageTemplate -> render('mainPage.htm');
    }

}