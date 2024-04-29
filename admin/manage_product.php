<?php
require('top.inc.php');
$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';

$msg='';
$image_required='required';

if($isset($_GET['id']) && ($isset($_GET['id'])!='')){
    $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
     $row=mysqli_fetch_assoc($res);
    $categories_id=$row['categories_id'];
    $name=$row['name'];
    $mrp=$row['mrp'];
    $price=$row['price'];
    $qty=$row['qty'];
    $short_desc=$row['short_desc'];
    $desc=$row['desc'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];
    }else{
        header(location:product.php);
        die();
    }
}

if($isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);
    $mrpt=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

    $res=mysqli_query($con,"select * from product where name='$name'");
    $row=mysqli_fetch_assoc($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!=''){
         $getData=mysqli_fetch_assoc($res);
         if($id==$getData['id']){

        }else{
             $msg="Product Already Exist";
        }
            }else{
               $msg="Product Already Exist";   
        }
    }


     if($msg==''){
        if($isset($_GET['id']) && ($isset($_GET['id'])!='')){
            mysqli_query($con,"update product set categories_id = '$categories_id',name ='$name',
            mrp ='$mrp',price ='$price,short_desc='$short_desc',desc ='$desc',meta_title='$meta_title',meta_desc ='$meta_desc',
           meta_keyword ='$meta_keyword' where id='$id'");
        }else{
            $image=rand(111111111,999999999).'_'.$FILES['imaage']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);

            mysqli_query($con,"insert into product (categories_id,name,mrp,price,qty
            ,short_desciption,desciption,meta_title,meta_desc,meta_keyword,status,image)
              values('$categories_id','$name','$mrp','$price','$qty'
            ,'$short_desciption','$desciption','$meta_title','$meta_desc','$meta_keyword',1,'$image')");
             }
        header('location:product.php');
        die();
    }
}       
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                         <div class="card-body card-block">
                           <div class="form-group">
                           <label for="categories" class=" form-control-label">Product Name</label><input type="text" 
                           name="name" id="product" placeholder="Enter product name" class="form-control"
                            required value=<?php echo $name?>>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">MRP</label><input type="text" 
                           name="mrp" id="product" placeholder="Enter product mrp" class="form-control" 
                           required value=<?php echo $mrp?>>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Price</label><input type="text" 
                           name="price" id="product" placeholder="Enter product price" class="form-control" 
                          required value=<?php echo $price?>>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Qty</label><input type="text" 
                           name="qty" id="product"  class="form-control" required> 
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Image</label><input type="file" 
                           name="image" id="product" placeholder="Enter product name" class="form-control" <?php echo $image_required?>>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Short Description</label>
                           <textarea name="short_desc" id="product" placeholder="Please Enter Product's Short Desciption!" 
                           class="form-control" required><?php echo $short_desc?>></textarea>

                           <div class="form-group">
                           <label for="categories" class=" form-control-label">Description</label>
                           <textarea name="description" id="product" placeholder="Please Enter Product's Desciption!" 
                           class="form-control" required><?php echo $description?>></textarea>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Meta Title</label>
                           <textarea name="meta_title" id="product" placeholder="Please Enter Product's meta title!" 
                           class="form-control" ><?php echo $meta_title?>></textarea>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Meta Description</label>
                           <textarea name="meta_desc" id="product" placeholder="Please Enter Product's Meta Desciption!" 
                           class="form-control" ><?php echo $meta_desc?>></textarea>
                            </div>
                            <div class="form-group">
                           <label for="categories" class=" form-control-label">Meta Keyword</label>
                           <textarea name="meta_keyword" id="product" placeholder="Please Enter Product's meta keyword !" 
                           class="form-control" ><?php echo $meta_keyword?>></textarea>
                            </div>
                            
                               <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                               <span id="payment-button-amount">Submit</span>
                               </button>
                          </div>
                       </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<?php
require('footer.inc.php');
?>