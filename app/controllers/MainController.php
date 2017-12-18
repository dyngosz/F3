<?php

require_once("vendor/autoload.php");

class MainController {

    function MainPage() {
        $mainPageTemplate = new Template();
        echo $mainPageTemplate -> render('mainPage.htm');
    }

    function AboutPage() {
        $aboutPageTemplate = new Template();
        echo $aboutPageTemplate -> render('about.htm');
    }
}