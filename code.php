<?php 
include "db.php"
?>
<?php
if(isset($_POST['save'])){
    date_default_timezone_set("Asia/Baghdad");
    $name_drive=$_POST['name'];
    $car_number=$_POST['cnumber'];
    $Cweight=$_POST['cweight'];
    $Eweight=$_POST['Eweight'];
    $Nweight=$_POST['cweight']- $_POST['Eweight'];
    $price=$_POST['price'];
    $type_car=$_POST['type_care'];
    $time_insert=date('Y-m-d-h:m:s');

$inser_information=$conn->prepare("INSERT INTO balance(complement_weight , empty_weight , Net_weight , driver_name , car_number , time_insert , type_care , price_balance)value(:complement_weight , :empty_weight ,:Net_weight , :driver_name , :car_number , :time_insert , :type_care , :price_balance)");
$inser_information->bindParam(":complement_weight",$Cweight);
$inser_information->bindParam(":empty_weight",$Eweight);
$inser_information->bindParam(":Net_weight",$Nweight);
$inser_information->bindParam(":driver_name",$name_drive);
$inser_information->bindParam(":car_number",$car_number);
$inser_information->bindParam(":time_insert",$time_insert);
$inser_information->bindParam(":type_care",$type_car);
$inser_information->bindParam(":price_balance",$price);
$inser_information->execute();
if($inser_information){
header("location:Balance.php");

}}?>

   
    