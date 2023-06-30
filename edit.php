<?php include "header.php"?>
 <?php
 $user_baance=$conn->prepare("SELECT * FROM balance WHERE balance_id=$_GET[id]");
 $user_baance->execute();
 $row = $user_baance->fetch(PDO::FETCH_ASSOC);

?>
<div class="container">
        <div>
            <form action="" method="POST">
                <label for="name">driver name:</label>
                <input type="text" name="name" value=<?= $row["driver_name"]?> class="form-control form-control-lg">
                <label for="cnumber">car number:</label>
                <input type="text" name="cnumber" value=<?= $row["car_number"]?> class="form-control form-control-lg">
                <label for="cweight">Complement Weight:</label>
                <input type="text" name="cweight"value=<?= $row["complement_weight"]?> class="form-control form-control-lg">
                <label for="Eweight">Empty weight:</label>
                <input type="text" name="Eweight" value=<?= $row["empty_weight"]?> class="form-control form-control-lg">
                <label for="price">price balance:</label>
                <input type="text" name="price"value=<?= $row["price_balance"]?> class="form-control form-control-lg">
                <label for="select"> select type care</label>
                <select name="type_care" id="type_care" value=<?= $row["type_care"]?> class="form-control form-control-lg">
                    <option value="kia">كيا</option>
                    <option value="Sotota">ستوتة</option>
                    <option value="Trailer">تريلة</option>
                    <option value="Sexs">سكس</option>
                    <option value="Hino">هينو </option>
                    <option value="Tick">تك</option>
                </select>
                <button type="submit" name="edit" class="btn btn-info ">save</button>
            </form>
        </div>
    </div>
    <?php
if(isset($_POST['edit'])){
    date_default_timezone_set("Asia/Baghdad");
    $name_drive=$_POST['name'];
    $car_number=$_POST['cnumber'];
    $Cweight=$_POST['cweight'];
    $Eweight=$_POST['Eweight'];
    $Nweight=$_POST['cweight']- $_POST['Eweight'];
    $price=$_POST['price'];
    $type_car=$_POST['type_care'];
    $time_insert=date('Y-m-d-h-m-s');

$inser_information=$conn->prepare("UPDATE balance SET complement_weight=:complement_weight , empty_weight=:empty_weight , Net_weight=:Net_weight , driver_name=:driver_name , car_number=:car_number , time_insert=:time_insert , type_care=:type_care , price_balance=:price_balance WHERE balance_id= $_GET[id]");
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
// echo" successful";

}}

?>