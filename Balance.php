<?php include "header.php";?>
    <div class="container">
        <div>
            <form action="code.php" method="POST">
                <label for="name">driver name:</label>
                <input type="text" name="name"  class="form-control form-control-lg">
                <label for="cnumber">car number:</label>
                <input type="text" name="cnumber" class="form-control form-control-lg">
                <label for="cweight">Complement Weight:</label>
                <input type="text" name="cweight" class="form-control form-control-lg">
                <label for="Eweight">Empty weight:</label>
                <input type="text" name="Eweight" class="form-control form-control-lg">
                <label for="price">price balance:</label>
                <input type="text" name="price" class="form-control form-control-lg">
                <label for="select"> select type care</label>
                <select name="type_care" id="type_care" class="form-control form-control-lg">
                    <option value="kia">كيا</option>
                    <option value="Sotota">ستوتة</option>
                    <option value="Trailer">تريلة</option>
                    <option value="Sexs">سكس</option>
                    <option value="Hino">هينو </option>
                    <option value="Tick">تك</option>
                </select>
                <button type="submit" name="save" class="btn btn-info">save</button>
            </form>
        </div>
    </div>
    <?php
     $user_baance=$conn->prepare("SELECT * FROM balance ");
     $user_baance->execute();
 
  ?>
  
     <div class="container mt-5">
         <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-header bg-info">
                         <h2> information balance</h2>
                     </div>
                     <div class="card-body">
                         <table class="table">
     
                             <tr>
                                 <th>Balance id</th>
                                 <th>Driver name</th>
                                 <th>Care number</th>
                                 <th> Complement weight</th>
                                 <th>Empty weight</th>
                                 <th>Net weight </th>
                                 <th>Type care</th>
                                 <th>Price balance care</th>
                                 <th>Time balance</th>
                                 <th>Action</th>

                             </tr>
     <?php
     if($user_baance->rowCount()>0){
     foreach($user_baance as $row){
         ?>
         <tr>
     <td><?php echo $row["balance_id"];?></td>
     <td><?php echo $row["driver_name"];?></td>
     <td><?php echo $row["car_number"];?></td>
     <td><?php echo $row["complement_weight"];?></td>
     <td><?php echo $row["empty_weight"];?></td>
     <td><?php echo $row["Net_weight"];?></td>
     <td><?php echo $row["type_care"];?></td>
     <td><?php echo $row["price_balance"];?></td>
     <td><?php echo $row["time_insert"];?></td>
 <td>
    <a href="edit.php?id=<?php echo $row["balance_id"]?>" class="btn btn-primary"> edit</a>
 </td>
 
 
 
     
 
        </tr> 
     
         <?php
     }
     }
         else {
     
             echo "<td>no teachers</td>";  
     }
     ?>
           </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</body>

</html>