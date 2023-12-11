<?php

require_once "../../functions/autoload.php";

$postData = $_POST;

(new Autenticacion())->log_out();


    header('location: ../index.php?sec=login');





?>