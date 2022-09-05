<?php 
include("config.php");

$id = $_GET['id'];
$action = $_GET['action'];
$sql = "SELECT * FROM `users` WHERE `id`='$id'";
$sel = mysqli_query($conn,$sql);

$form_data = array();
foreach($sel as $datas){
    $form_data = unserialize($datas['form_data']);
}
// echo"<pre>";
// print_r($form_data);
// die;
foreach($form_data as $key =>$val){
    echo "<pre>";
    echo $val['email']." ".$val['phone_no'];
}
?>