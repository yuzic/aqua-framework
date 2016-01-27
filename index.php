<?php

require "boostrap.php";


\Aqua\Aqua::init();
///$app = new \App\Controller\Index;
$app = new \App\Controller\Front;
$app->index();


