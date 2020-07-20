<?php
include_once "../base.php";
$total=$Que->find($_GET['id']);
$total['count']++;
$Que->save($total);

$total=$Que->find($_POST['opt']);
$total['count']++;
$Que->save($total);

to("../index.php?do=result&id=".$_GET['id']);