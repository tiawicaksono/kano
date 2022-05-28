<?php
require_once("controller.php");
$read_csv = new Controller();

if($_POST['action'] == 'getList'){
    $read_csv->getList($_POST);
}

if($_POST['action'] == 'update'){
    $read_csv->updateDataList($_POST);
}