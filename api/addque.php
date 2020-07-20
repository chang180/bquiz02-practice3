<?php
include_once "../base.php";

$subject=$_POST['subject'];
$option=$_POST['option'];

$Que->save(['text'=>$subject,'parent'=>0]);
$parent=$Que->find(['text'=>$subject]);

foreach($option as $o){
    $Que->save(['text'=>$o,'parent'=>$parent['id']]);
}

to("../admin.php?do=que");