<?php include 'Views/Layout/Header.php';?>  
<section class="description">
    <div class="container">
    <?php if($house['grid_type'] == 0):?>
        <h1>Donec a gravida</h1>

        <div class="row">

            <div class="col-lg-4 col-md-4">
                <img src="<?php echo $image[0];?>" />
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="row">

                    <div class="col-lg-8 col-md-8">
                        <img src="<?php echo $image[1];?>" />
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <img src="<?php echo $image[2];?>" />
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 top">
                        <img src="<?php echo $image[3];?>" />
                    </div>
                    <div class="col-lg-6 col-md-6 top">
                        <img src="<?php echo $image[4];?>" />
                    </div>
                </div>
            </div>

        </div>
    <?php else:?>
        <div class="row">

            <div class="col-lg-6 col-md-6 ">
                <img class="extend_grid" src="<?php echo $image[0];?>" />
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="row">

                    <div class="col-lg-5 col-md-5">
                        <img src="<?php echo $image[1];?>" />
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <img src="<?php echo $image[2];?>" />
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-5 top">
                        <img class="extend_grid_sec" src="<?php echo $image[3];?>" />
                    </div>
                    <div class="col-lg-6 col-md-6 top">

                        <img src="<?php echo $image[4];?>" />
                    </div>
                </div>
            </div>

        </div>
    <?php endif;?>
        <div class="container">

            <h1>Description</h1>
            <div class="row">

                <div class="col-lg-7">

                    <h4 class="descr_text gre"><?php echo $house['name'];?></h4>

                    <p class="descr_text">
                        <?php echo $house['description'];?>
                    </p>

                </div>

                <div class="col-lg-4">
                    <h4 class="gre">Libero</h4>

                    <ul>
                        <li><svg></svg>Suspendisse venenatis leo feugiat</li>
                        <li><svg></svg>Est in sagittis cursus</li>
                        <li><svg></svg>Pretium interdum nibh non</li>
                        <li><svg></svg>Praesent volutpat vulputate lobortis</li>
                        <li><svg></svg>Vulputate lobortis, quam leo</li>
                        <li><svg></svg>Purus id tellus eleifend tempus auctor</li>
                    </ul>

                    <h3 class="gre">Nullam</h3>
                    <h3 class="price_n"><?php echo $house['price'];?> y.e.</h3>
                </div>
            </div>

            <button class="to_order_l">To order</button>
            <button class="see_more">See more</button>
        </div>
    </div>
</section>
<?php include 'Views/Layout/Footer.php';?>  