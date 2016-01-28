<?php
require "boostrap.php";

(new \Aqua\Aqua)->init();
$app = new \App\Controller\Front;
$app->index();
