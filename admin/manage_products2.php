<?php
require('top.inc.php');
$categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc = '';
$description = '';
$meta_title = '';
$meta_desc = '';
$meta_keyword = '';

$products='';
$msg='';
$image_required = 'required';

// if(isset($_GET['id']) && (isset($_GET['id'])!='')){
//     $id=get_safe_value($con,$_GET['id']);
//     $res=mysqli_query($con,"select * from products where id='$id'");
//     $check=mysqli_num_rows($res);
//     if($check>0){
//      $row=mysqli_fetch_assoc($res);
//     $categories=$row['categories'];
//     }else{
//         header('location:product.php');
//         die();
//     }
// }

if(isset($_POST['submit'])){
    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    $image=get_safe_value($con,$_POST['image']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);

    // $update_sql = "UPDATE products SET categories_id = '$categories_id', name = '$name', mrp = '$mrp', 
    // price = '$price', qty = '$qty', image = '$image', short_desc = '$short_desc', 
    // description = '$description', meta_title = '$meta_title', meta_desc = '$meta_desc', 
    // meta_keyword = '$meta_keyword' WHERE id = '$id'";
    // mysqli_query($con, $update_sql);

    // $image =  rand(111111111, 999999999) . '_' .$_FILES['image']['name'];
    // move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH. $image);
           
   $res=  mysqli_query($con, "INSERT INTO products (categories_id, name, mrp, price, qty,image, short_desc, description, 
   meta_title, meta_desc, meta_keyword, status) VALUES ('1', '$name', 
   '$mrp', '$price', '$qty','western (4).jpeg','short_desc', 'description', 'meta_title', 
   'meta_desc', 'meta_keyword', 1)");

echo $res;
header('location:product.php');
die();

// if ($_FILES['image']['type']!= '' && 
// ($_FILES['image']['type']!= 'image/png' && 
//  $_FILES['image']['type']!= 'image/jpg' && 
//  $_FILES['image']['type']!= 'image/jpeg')) {
// $msg = "Please select only jpg, jpeg, or png format for the image";
// }

    // $res=mysqli_query($con,"select * from categories where categories='$categories'");
    // $check=mysqli_num_rows($res);
    // if($check>0){
    //     if(isset($_GET['id']) && $_GET['id']!=''){
    //      $getData=mysqli_fetch_assoc($res);
    //      if($id==$getData['id']){
          
    //     }else{
    //     $msg="Category Already Exist";
    //     }
    //         }else{
    //            $msg="Category Already Exist";   
    //     }
    // }

    // if($msg==''){
    //     if(isset($_GET['id']) && $_GET['id']!=''){
    //         mysqli_query($con,"update categories set categories='$categories' where id=$id");
    //     }else{
    //         mysqli_query($con,"insert into categories(categories,status)values('$categories , 1)");
    //     }
    //     header('location:categories.php');
    //     die();
    // }


}
?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>products</strong><small> Form</small></div>
                        <form method="post">
                         <div class="card-body card-block">
                           <div class="form-group">
                           <label class=" form-control-label">products</label>
                           <input type="text" 
                             name="name" placeholder="Enter product name" class="form-control" required value=<?php echo $products?>>
                            </div>
                            <div class="form-group">
                            <select class="form-select" aria-label="Default select example" name="categories_id">
                                    <option selected>Select categories</option>
                                    <?php
                                    $get_cat = get_categories($con);
                                    foreach ($get_cat as $list) {
                                        ?>
                                        <option value='<?php echo $list['id'] ?>' <?php if ($list['id'] == $categories_id) echo 'selected="selected"' ?>><?php echo $list['categories'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            <div class="form-group">
                                <label class="form-control-label">MRP</label>
                                <input type="text" name="mrp" id="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Price</label>
                                <input type="text" name="price" id="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Qty</label>
                                <input type="text" name="qty" id="qty" class="form-control" placeholder="Enter quantity" required value="<?php echo $qty ?>">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Image</label>
                                <input type="file" name="image" id="image" placeholder="Select product image" class="form-control" <?php echo $image_required ?>>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Short Description</label>
                                <textarea name="short_desc" id="short_desc" placeholder="Please Enter Product's Short Description!" class="form-control" required><?php echo $short_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <textarea name="description" id="desc" placeholder="Please Enter Product's Description!" class="form-control" required><?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Meta Title</label>
                                <textarea name="meta_title" id="meta_title" placeholder="Please Enter Product's meta title!" class="form-control"><?php echo $meta_title ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Meta Description</label>
                                <textarea name="meta_desc" id="meta_desc" placeholder="Please Enter Product's Meta Description!" class="form-control"><?php echo $meta_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword" placeholder="Please Enter Product's meta keyword !" class="form-control"><?php echo $meta_keyword ?></textarea>
                            </div>
                               <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
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