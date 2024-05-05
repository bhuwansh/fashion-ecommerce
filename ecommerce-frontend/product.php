<div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">
                            <?php
                            // Assuming get_product function fetches products correctly
                            $get_product = get_product($con, 'latest', 5 ,1);
                            foreach ($get_product as $list) {
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
                            }
                            ?>
                        </div>
                    </div>
                </div>