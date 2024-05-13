<?php require('top.php');
$cat_id=mysqli_real_escape_string($con,$_GET['id']);

 $get_products = get_products($con,'','',$cat_id );
?>


        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/banner1.jpeg) no-repeat scroll center center / cover ;">
        
        <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item text-dark" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item  text-dark">Products</span>
                                 

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                              
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                    
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                     
                                        <!-- End Single Product -->
                                        <!-- Start Single Product -->
                                       
                                        <!-- End Single Product -->
                                        <!-- Start Single Product -->
                                        <?php
                            // Assuming get_product function fetches products correctly
                            $get_products = get_products($con,'','',$cat_id );
                            foreach ($get_products as $list) {
                            ?>
                                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                                <img src="<?php echo PRODUCT_IMAGE_SERVER_PATH . $list['image'] ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="product-details.php?id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <!-- Assuming $list['mrp'] and $list['price'] contain appropriate values -->
                                                <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                                <li><?php echo $list['price'] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            
                                    
                                       
                                       
                                       
                                
                                  
                                        </div>
                                        <!-- End Single Product -->
                                        <!-- Start Single Product -->
                                       
                                        <!-- End Single Product -->
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
        
        <?php require('brand.php')?>
        <!-- End Banner Area -->

<?php require('footer.php')?>