<?php require('top.php')?>





<!-- <div class="body__overlay"></div> -->


<div class="slider__container slider--one bg__cat--3">


            <div class="slide__container slider__activation__wrap owl-carousel">

                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Collection 2024</h2>
                                        <h1>ZARA TOP</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/product/zara top1.jpg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single__slide animation__style01 slider__fixed--height">
                    <div class="container">
                        <div class="row align-items__center">
                            <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                                <div class="slide">
                                    <div class="slider__inner">
                                        <h2>Collection 2024</h2>
                                        <h1>ANARKALIS</h1>
                                        <div class="cr__btn">
                                            <a href="cart.html">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                                <div class="slide__thumb">
                                    <img src="images/product/traditional (1).jpeg" alt="slider images">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
</div>



        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">

                        <?php
                            // Assuming get_product function fetches products correctly
                             $get_products = get_products($con, '',4,'');
                            foreach ($get_products as $list) {
                            ?>
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                                <img src="<?php echo PRODUCT_IMAGE_SERVER_PATH . $list['image'] ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="product-details.php?id=<?php echo $list['id'] ?>">
                                            <?php echo $list['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                
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
            </div>
        </section>

        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Western wear</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">

                        <?php
                            // Assuming get_product function fetches products correctly
                             $get_w_products = get_products($con, '','4','1');
                            foreach ($get_w_products as $list) {
                            ?>
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                                <img src="<?php echo PRODUCT_IMAGE_SERVER_PATH . $list['image'] ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="product-details.php?id=<?php echo $list['id'] ?>">
                                            <?php echo $list['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                
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
            </div>
        </section>

        <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Traditional Wear</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30">

                        <?php
                            // Assuming get_product function fetches products correctly
                             $get_t_products = get_products($con, '','4','2');
                            foreach ($get_t_products as $list) {
                            ?>
                                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                    <div class="category">
                                        <div class="ht__cat__thumb">
                                            <a href="product-details.php?id=<?php echo $list['id'] ?>">
                                                <img src="<?php echo PRODUCT_IMAGE_SERVER_PATH . $list['image'] ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="fr__product__inner">
                                            <h4><a href="product-details.php?id=<?php echo $list['id'] ?>">
                                            <?php echo $list['name'] ?></a></h4>
                                            <ul class="fr__pro__prize">
                                                
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
            </div>
        </section>


        <?php require('brand.php')?>

 <?php require('footer.php')?>