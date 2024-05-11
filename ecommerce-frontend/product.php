<?php
require('connection.inc.php');
require('function.inc.php');
?> 
 
 <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                            // Assuming get_product function fetches products correctly
                            $get_product = get_product($con,'','');
                            // foreach($get_product as $list) {
                                if (is_array($get_product) || is_object($get_product)) {
                                    foreach ($get_product as $list) {
                                        // Your foreach loop logic here
                                    }
                                } else {
                                    // Handle the case where $get_product is neither an array nor an object
                                    // You might want to log an error or take other appropriate action
                                }
                            ?>
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product.php?id=<?php echo $list['id'] ?>">
                                                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $list['image'] ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="product-details.html"><?php echo $list['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                <!-- Assuming $list['mrp'] and $list['price'] contain appropriate values -->
                                                <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                                <li><?php echo $list['price'] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            // }
                            ?>
                        </div>
                    </div>
                </div>