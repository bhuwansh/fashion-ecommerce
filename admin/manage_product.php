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





if(isset($_GET['id']) && (isset($_GET['id'])!='')){
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
    $image=$row['image'];
    $short_desc=$row['short_desc'];
    $desc=$row['description'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];
    }else{
        header('Location: product.php');
        die();
    }
}

if(isset($_POST['submit']))
{
 $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    // $image=get_safe_value($con,$_POST['img']);
    $qty=get_safe_value($con,$_POST['qty']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

//    move_uploaded_file($_FILES['image']['name'],'PRODUCT_IMAGE_SERVER_PATH'.$image);

//     mysqli_query($con,"insert into products (categories_id,name,mrp,price,qty,image,
//     ,short_desc,description,meta_title,meta_desc,meta_keyword,status)
//       values(2,'$name','$mrp','$price','$qty','$image','$short_description','$description',
//       '$meta_title','$meta_desc','$meta_keyword',1)");
     
//          header('location:product.php');
// die();
// Sanitize input values (assuming get_safe_value() is a function that does this)
// $categories_id = get_safe_value($con, $_POST['categories_id']);
// $name = get_safe_value($con, $_POST['name']);
// $mrp = get_safe_value($con, $_POST['mrp']);
// $price = get_safe_value($con, $_POST['price']);
// $qty = get_safe_value($con, $_POST['qty']);
// $short_desc = get_safe_value($con, $_POST['short_desc']);
// $description = get_safe_value($con, $_POST['description']);
// $meta_title = get_safe_value($con, $_POST['meta_title']);
// $meta_desc = get_safe_value($con, $_POST['meta_desc']);
// $meta_keyword = get_safe_value($con, $_POST['meta_keyword']);

// Check if product already exists
$res = mysqli_query($con, "SELECT * FROM product WHERE name='$name'");
$check = mysqli_num_rows($res);
if ($check > 0) {
    $msg = "Product already exists";
}

// Check file format for image upload
// Note: Your condition for file format was incorrect, fixed it here
if ($_FILES['image']['type']!= '' && 
    ($_FILES['image']['type']!= 'image/png' && 
     $_FILES['image']['type']!= 'image/jpg' && 
     $_FILES['image']['type']!= 'image/jpeg')) {
    $msg = "Please select only jpg, jpeg, or png format for the image";
}

if ($msg == '') {
    if (isset($_GET['id']) && $_GET['id'] != '') {
        // Update product
        $id = $_GET['id'];
        $image = ''; // Initialize image variable
        if ($_FILES['image']['name'] != '') {
            // If a new image is uploaded
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], 'PRODUCT_IMAGE_SERVER_PATH' . $image);
        }
        if (isset($_GET['id']) && $_GET['id'] != '') {
            // Update product
            $id = $_GET['id'];
            $update_sql = "UPDATE product SET categories_id = '$categories_id', name = '$name', mrp = '$mrp', 
                           price = '$price', qty = '$qty', image = '$image', short_desc = '$short_desc', 
                           description = '$description', meta_title = '$meta_title', meta_desc = '$meta_desc', 
                           meta_keyword = '$meta_keyword' WHERE id = '$id'";
            mysqli_query($con, $update_sql);
        } else {
            // Insert new product
            mysqli_query($con, "INSERT INTO product (categories_id, name, mrp, price, qty, image, short_desc, description, 
                               meta_title, meta_desc, meta_keyword, status) VALUES ('$categories_id', '$name', 
                               '$mrp', '$price', '$qty', '$image', '$short_desc', '$description', '$meta_title', 
                               '$meta_desc', '$meta_keyword', 1)");
        }
        // Redirect to product page after adding/updating
        header('Location: product.php');
        exit();
    }
}
        // Update product query
    //     $update_sql = "UPDATE product SET categories_id = '$categories_id', name = '$name', mrp = '$mrp', 
    //                    price = '$price', qty = '$qty', short_desc = '$short_desc', description = '$description', 
    //                    meta_title = '$meta_title', meta_desc = '$meta_desc', meta_keyword = '$meta_keyword'";
    //     if ($image != '') {
    //         // If a new image is uploaded, add it to the update query
    //         $update_sql .= ", image = '$image'";
    //     }
    //     $update_sql .= " WHERE id = '$id'";
    //     mysqli_query($con, $update_sql);
    // } else {
    //     // Insert new product
    //     $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
    //     move_uploaded_file($_FILES['image']['tmp_name'], 'PRODUCT_IMAGE_SERVER_PATH' . $image);
    //     mysqli_query($con, "INSERT INTO product (categories_id, name, mrp, price, qty, image, short_desc, description, 
    //                        meta_title, meta_desc, meta_keyword, status, image) VALUES ('$categories_id', '$name', 
    //                        '$mrp', '$price', '$qty','$image', '$short_desc', '$description', '$meta_title', '$meta_desc', 
    //                        '$meta_keyword', 1, )");
   

    // $categories_id=get_safe_value($con,$_POST['categories_id']);
    // $name=get_safe_value($con,$_POST['name']);
    // $mrpt=get_safe_value($con,$_POST['mrp']);
    // $price=get_safe_value($con,$_POST['price']);
    // $qty=get_safe_value($con,$_POST['qty']);
    // $short_desc=get_safe_value($con,$_POST['short_desc']);
    // $description=get_safe_value($con,$_POST['description']);
    // $meta_title=get_safe_value($con,$_POST['meta_title']);
    // $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    // $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);

    // $res=mysqli_query($con,"select * from product where name='$name'");
    // $row=mysqli_fetch_assoc($res);
    // if($check>0){
    //     if(isset($_GET['id']) && $_GET['id']!=''){
    //      $getData=mysqli_fetch_assoc($res);
    //      if($id==$getData['id']){

    //     }else{
    //          $msg="Product Already Exist";
    //     }
    //         }else{
    //            $msg="Product Already Exist";   
    //     }
    // }
    // if(($_FILES['image']['type']!='') && ($_FILES['image']['type']!='image/png') || 
    // ($_FILES['image']['type']!='image/jpg') || ($_FILES['image']['type']!='image/jpeg'))
    // {
    //     $msg="Please Select Only jpg,jpeg and png format";
    // }
    //  if($msg==''){
    //     if(isset($_GET['id']) && (isset($_GET['id'])!='')){
    //         if($_FILES['image']['name']!=''){
    //             $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
    //             move_uploaded_file($_FILES['image']['tmp_name'],'PRODUCT_IMAGE_SERVER_PATH'.$image);
    //             $update_sql="update product set categories_id = 2,name ='$name',
    //             mrp ='$mrp',price ='$price,short_desc='$short_desc',desc ='$desc',meta_title='$meta_title',meta_desc ='$meta_desc',
    //            meta_keyword ='$meta_keyword',image = '$image' where id='$id'";
    //         }
    //         else{
    //             move_uploaded_file($_FILES['image']['tmp_name'],'PRODUCT_IMAGE_SERVER_PATH'.$image);
    //             $update_sql="update product set categories_id = 2,name ='$name',
    //             mrp ='$mrp',price ='$price,short_desc='$short_desc',desc ='$desc',meta_title='$meta_title',meta_desc ='$meta_desc',
    //            meta_keyword ='$meta_keyword' where id='$id'";
    //         }
    //         mysqli_query($con,update_sql);
    //     }else{
         //       $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
         //       move_uploaded_file($_FILES['image']['tmp_name'], 'PRODUCT_IMAGE_SERVER_PATH' . $image);
         //       mysqli_query($con, "INSERT INTO product (categories_id, name, mrp, price, qty, short_desc, description, 
         //        meta_title, meta_desc, meta_keyword, status, image) VALUES ('$categories_id', '$name', 
         //       '$mrp', '$price', '$qty', '$short_desc', '$description', '$meta_title', '$meta_desc', 
         //       '$meta_keyword', 1, '$image')");
         // }
         // // Redirect to product page after adding/updating
         // header('Location: product.php');
         // exit();
         // }
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
                                <label class="form-control-label">Product Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name ?>">
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
                            </div>
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
                                <input type="file" name="image" id="image" placeholder="Enter product image" class="form-control" <?php echo $image_required ?>>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Short Description</label>
                                <textarea name="short_desc" id="short_desc" placeholder="Please Enter Product's Short Desciption!" class="form-control" required><?php echo $short_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Description</label>
                                <textarea name="description" id="description" placeholder="Please Enter Product's Desciption!" class="form-control" required><?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Meta Title</label>
                                <textarea name="meta_title" id="meta_title" placeholder="Please Enter Product's meta title!" class="form-control"><?php echo $meta_title ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Meta Description</label>
                                <textarea name="meta_desc" id="meta_desc" placeholder="Please Enter Product's Meta Desciption!" class="form-control"><?php echo $meta_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Meta Keyword</label>
                                <textarea name="meta_keyword" id="meta_keyword" placeholder="Please Enter Product's meta keyword !" class="form-control"><?php echo $meta_keyword ?></textarea>
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