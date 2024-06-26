<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
  $type = get_safe_value($con,$_GET['type']);
  if($type == 'status'){
    $operation = get_safe_value($con,$_GET['operation']);
    $id = get_safe_value($con,$_GET['id']);
    if($operation=='active'){
        $status='1';
    }else{
        $status='0';
    }
    $update_status_sql="update products set status='$status' where id='$id'";
    mysqli_query($con,$update_status_sql);
   }
    elseif($type == 'delete'){
      $id = get_safe_value($con,$_GET['id']);
      $delete_sql = "Delete from products where id=$id";
      mysqli_query($con,$delete_sql);
      }    
  }      

//   $sql = "SELECT products.*, categories.categories AS name FROM products 
//   INNER JOIN categories ON products.categories_id = categories.categories 
//   ORDER BY products.id ASC";

$product_list=get_product_list($con);

// prx($res);
?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Products</h4>
                           <h4 class="box-link"><a href="manage_products2.php">Add Prducts</a></h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                    <th class="serial">#</th>
                                       <!-- <th>ID</th> -->
                                       <th>Name</th>
                                       <th>Category</th>
                                       <th>Image</th>
                                       <th>MRP</th>
                                       <th>Price</th>
                                       <th>Qty</th>
                                       
                                        </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    if($product_list) {
                                       $i = 1;
                                       foreach ($product_list as $row) {
                                       ?>
                                       <tr>
                                           <td class="serial"><?php echo $i ?></td>
                                           <!-- <td><?php echo $row['id'] ?></td> -->
                                           <td><?php echo $row['name'] ?></td>
                                           <td><?php echo $row['cat_name'] ?></td>
                                           <td><img src="<?php echo PRODUCT_IMAGE_SERVER_PATH .$row['image'] ?>" /></td>
                                           <td><?php echo $row['mrp'] ?></td>
                                           <td><?php echo $row['price'] ?></td>
                                           <td><?php echo $row['qty'] ?></td>
                                           <td>
                                               <?php
                                               if ($row['status'] == 1) {
                                                   echo "<span class='badge badge-complete'>
                                                   <a href='?type=status&operation=deactive&id=".$row['id']."'>Active</a></span>&nbsp;";
                                               } else {
                                                   echo "<span class='badge badge-pending'>
                                                   <a href='?type=status&operation=active&id=".$row['id']."'>Deactive</a></span>&nbsp;";
                                               }
                                               ?>
                                               <span class='badge badge-edit'><a href='manage_products2.php?id=".$row['id']."'>Edit</a></span>&nbsp; 
                                               <span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span> 
                                           </td>
                                       </tr>
                                     <?php
                                    $i++;
                                       }
                                    } else {
                           
                                       echo "Error executing query: " . mysqli_error($con); // Assuming $conn is your database connection
                                   }
                                       ?>
                                      
                                       
                              </tbody>
                            </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
     </div>
</div>

<?php
require('footer.inc.php');
?>