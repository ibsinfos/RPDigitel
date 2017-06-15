
<!-- page content -->
<div class="right_col" role="main">
    <div class="communityWrap">
        <div class="row sliderNewsWrap">
            <div class="col-sm-6">
                <a href="<?php echo base_url(); ?>view-slider" id="carousel-example-generic" class="carousel slide sectionOverlay" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                       <?php
                    if (!empty($slider)) {
                        $c = 0;
                        foreach ($slider as $s) {
                            ?>

                            <div class="item  <?php
                            if ($c == 0) {
                                echo "active";
                            }
                            ?>">
                                <img src="<?php echo base_url() . $s['image']; ?>" alt="background1" class="img-responsive">
                            </div>

                            <?php
                            $c++;
                        }
                    }
                    ?>
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
            <a href="<?php echo base_url()?>header_news" class="newsWrap firstNews sectionOverlay">
                <?php
                $h_img = backend_asset_url() . '/images/community/news1.jpg';
                if (!empty($category['0']['image']))
                    $h_img = base_url() . $category['0']['image'];
                ?>
                <img src="<?php echo $h_img ?>" alt="background1" class="">
                <div class="newsContent">
                    <span class="newsType"><?php echo $category['0']['title']; ?></span>
                    <h4>
                        <?php
                        echo character_limiter($category['0']['description'], 80);
                        ?>
                    </h4>
                </div>
            </a>
            <a href="<?php echo base_url()?>header_news" class="newsWrap secondNews sectionOverlay">
                <?php
                $h_img1 = backend_asset_url() . '/images/community/news2.jpg';
                if (!empty($category['0']['image']))
                    $h_img1 = base_url() . $category['1']['image'];
                ?>
                <img src="<?php echo $h_img1; ?>" alt="background1" class="">
                <div class="newsContent">
                    <span class="newsType"><?php echo $category['1']['title']; ?></span>
                    <h4>
                        <?php
                        echo character_limiter($category['1']['description'], 80);
                        ?>

                    </h4>
                </div>
            </a>
        </div>
        </div>

        <div class="row latestSectionWrap">
            <div class="col-sm-3 ">
                <a href="<?php echo base_url() ?>latest_news" class="panel panel-default latestNews sectionOverlay">
                    <h4 class="heading">Latest News</h4>
                    <ul class="list-unstyled listWrap">
                    <?php
                    if (!empty($latest_news)) {
                        foreach ($latest_news as $n) {
                            ?>
                            <li class="row">
                                <div class="col-md-4 imageBlock">
                                    <?php
                                    $latest_news_url = backend_asset_url() . '/images/community/musician.jpg';
                                    if (!empty($n['image']))
                                        $latest_news_url = base_url() . $n['image'];
                                    ?>
                                    <img src="<?php echo $latest_news_url; ?>" alt="" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="category">
                                        <?php
                                        if (!empty($n['category'])) {
                                            $comm = '';
                                            $cat = explode(',', $n['category']);
                                            foreach ($cat as $c) {
                                                $comm.=$communityClass->getCategoryName($c) . ' , ';
                                            }
                                            echo substr($comm, 0, -2);
                                        }
                                        ?></h5>
                                   <p><?php echo $n['title'] ?></p>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>	


                </ul>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="" class="sectionOverlay">
                    <div class="panel panel-default latestActivity topBorderPatch">
                        <h4 class="heading2">Latest Activity</h4>
                        <ul class="list-unstyled">
                            <li class="row">
                                <div class="col-md-2 imageBlock">
                                    <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="postBy">Jason Chaffetz <span>posted an update</span></h5>
                                    <p class="duration">4 months, 1 week ago</p>
                                    <p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-2">
                                    <img src="<?php echo backend_asset_url() ?>/images/community/qr-code.png" alt="" class="img-responsive">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-2 imageBlock">
                                    <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="postBy">Jason Chaffetz <span>posted an update</span></h5>
                                    <p class="duration">4 months, 1 week ago</p>
                                    <p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="col-md-2">
                                    <img src="<?php echo backend_asset_url() ?>/images/community/qr-code.png" alt="" class="img-responsive">
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-2 imageBlock">
                                    <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="postBy">Jason Chaffetz <span>posted an update</span></h5>
                                    <p class="duration">4 months, 1 week ago</p>
                                    <p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                </div>
                                <div class="col-md-2">
                                    <img src="<?php echo backend_asset_url() ?>/images/community/qr-code.png" alt="" class="img-responsive">
                                </div>
                            </li>
                        </ul>
                        <p class="text-center text-uppercase"><a href="">Load More</a></p>
                    </div>
                </a>
                <a href="<?php echo base_url(); ?>featured_news" class="sectionOverlay">
                    <div class="panel panel-default featuredNews topBorderPatch">
                        <h4 class="heading2">Featured News</h4>
                        <div class="row">
                             <?php
                    $img_featured = backend_asset_url() . '/images/community/featured.jpg';
                    if (!empty($featured[0]['image'])) {
                        $img_featured = base_url() . $featured[0]['image'];
                    }
                    ?>
                            <div class="col-md-6">
                                 <img src="<?php echo $img_featured; ?>" alt="" class="img-responsive">
                                <br>
                                <p class="category"><?php
                            if (!empty($featured[0]['category'])) {
                                $comm = '';
                                $cat = explode(',', $featured[0]['category']);
                                foreach ($cat as $c) {
                                    $comm.=$communityClass->getCategoryName($c) . ' , ';
                                }
                                echo substr($comm, 0, -2);
                            }
                            ?></p>
                                <h4><?php
                                if (!empty($featured[0]['title'])) {
                                    echo $featured[0]['title'];
                                }
                                ?></h4>
                                <p class="message"><?php
                            if (!empty($featured[0]['description']))
                                echo character_limiter($featured[0]['description'], 150);
                            ?>		 </p>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                            <?php foreach ($featured as $featured) { ?>
                                <li class="row">
                                    <div class="col-md-3 imageBlock">
                                        <?php
                                        $img_featured1 = backend_asset_url() . '/images/community/musician.jpg';
                                        if (!empty($featured['image'])) {
                                            $img_featured1 = base_url() . $featured['image'];
                                        }
                                        ?>
                                        <img src="<?php echo $img_featured1; ?>" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-md-9">
                                        <p class="category">
                                            <?php
                                            if (!empty($featured['category'])) {
                                                $comm = '';
                                                $cat = explode(',', $featured['category']);
                                                foreach ($cat as $c) {
                                                    $comm.=$communityClass->getCategoryName($c) . ' , ';
                                                }
                                                echo substr($comm, 0, -2);
                                            }
                                            ?>
                                        </p>
                                        <h4 class="heading4"><?php echo $featured['title']; ?></h4>
                                    </div>
                                </li>
                            <?php } ?>


                        </ul>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="" class="panel panel-default entertainmentNews sectionOverlay">
                    <h4 class="heading3">Entertainment</h4>
                    <div class="row">
                    <?php
                    if (!empty($entertainment_category)) {

                        foreach ($entertainment_category as $ec) {
                            $eimg = backend_asset_url() . '/images/community/musician.jpg';
                            if (!empty($ec['image'])) {
                                $eimg = base_url() . $ec['image'];
                            }
                            ?>
                            <div class="col-md-4">
                               
                                    <img src="<?php echo $eimg; ?>" alt="" class="img-responsive">
                                    <p class="category">
                                        <?php
                                        if (!empty($ec['category'])) {
                                            $comm = '';
                                            $cat = explode(',', $ec['category']);
                                            foreach ($cat as $c) {
                                                $comm.=$communityClass->getCategoryName($c) . ' , ';
                                            }
                                            echo substr($comm, 0, -2);
                                        }
                                        ?>

                                    </p>
                                    <h4 class="heading4"><?php echo $ec['title']; ?></h4>
                               
                            </div>
                            <?php
                        }
                    }
                    ?>	
                    <!--<div class="col-md-4">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            <p class="category">Business</p>
                            <h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
                            </div>
                            <div class="col-md-4">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            <p class="category">Business</p>
                            <h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
                    </div>-->
                </div>
                </a>

                <a href="" class="panel panel-default fashionNews sectionOverlay">
                    <h4 class="heading3">Fashion</h4>
                    <ul class="list-unstyled">
                    <?php
                    if (!empty($fashion_category)) {

                        foreach ($fashion_category as $fc) {
                            $fimg = backend_asset_url() . '/images/community/musician.jpg';
                            if (!empty($fc['image'])) {
                                $fimg = base_url() . $fc['image'];
                            }
                            ?>
                            <li class="row">
                               
                                    <div class="col-md-4 imageBlock">
                                        <img src="<?php echo $fimg; ?>" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="category">
                                            <?php
                                            if (!empty($fc['category'])) {
                                                $comm = '';
                                                $cat = explode(',', $fc['category']);
                                                foreach ($cat as $c) {
                                                    $comm.=$communityClass->getCategoryName($c) . ' , ';
                                                }
                                                echo substr($comm, 0, -2);
                                            }
                                            ?>
                                        </p>
                                        <h4 class="heading4"><?php echo $fc['title']; ?></h4>
                                
                                <p class="message">

                                    <?php
                                    echo character_limiter($fc['description'], 150);
                                    ?>
                                </p>
                                </div>

                            </li>
                            <?php
                        }
                    }
                    ?>

                </ul>
                </a>

                <div class="panel panel-default otherNews">
                    <a href="" id="carousel-other-news" class="carousel slide sectionOverlay" data-ride="carousel">
                        <!-- Indicators -->
                       <ol class="carousel-indicators">
                        <?php for($i=0;$i<count($category_slider);$i++){?>
                        <li data-target="#carousel-other-news" data-slide-to="<?php echo $i;?>" class="<?php if($i==0) echo 'active';?>"></li>  
                        <?php }?>
                    </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">

                        <?php
                        if (!empty($category_slider)) {
                            $c1 = 0;
                            foreach ($category_slider as $cs) {
                                ?>
                                <div class="item <?php
                                if ($c1 == 0) {
                                    echo "active";
                                }
                                ?>" >
                                    
                                        <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
                                        <div class="carousel-caption">
                                            <span class="newsType"><?php echo $cs['title'] ?></span>
                                            <h4>
                                                <?php
                                                echo character_limiter($cs['description'], 80);
                                                ?>	
                                            </h4>
                                        </div>
                                   
                                </div>
                                <?php
                                $c1++;
                            }
                        }
                        ?>
                        <!--<div class="item active">
                                <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
                                <div class="carousel-caption">
                                <span class="newsType">Entertainment</span>
                                <h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
                                </div>
                                </div>
                                <div class="item">
                                <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
                                <div class="carousel-caption">
                                <span class="newsType">Entertainment</span>
                                <h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
                                </div>
                                </div>
                                <div class="item">
                                <img src="<?php echo backend_asset_url() ?>/images/community/other-news.jpg" alt="..." class="img-responsive">
                                <div class="carousel-caption">
                                <span class="newsType">Entertainment</span>
                                <h4>Force Touch on the iPhone 6S could change the way you launch apps</h4>
                                </div>
                        </div>-->
                    </div>
                    </a>
                    <br>
                    <h4 class="heading3">Other News</h4>
                    <a href="<?php echo base_url(); ?>news" class="sectionOverlay">
                        <ul class="list-unstyled">
                    <?php
                    if (!empty($other)) {
                        foreach ($other as $o_news) {
                            $other_img = backend_asset_url() . '/images/community/musician.jpg';
                            if (!empty($o_news['image'])) {
                                $other_img = base_url() . $o_news['image'];
                            }
                            ?>
                            <li class="row">
                                
                                    <div class="col-md-4 imageBlock">
                                        <img src="<?php echo $other_img; ?>" alt="" class="img-responsive">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="category">
                                            <?php
                                            if (!empty($o_news['category'])) {
                                                $comm = '';
                                                $cat = explode(',', $o_news['category']);
                                                foreach ($cat as $c) {
                                                    $comm.=$communityClass->getCategoryName($c) . ' , ';
                                                }
                                                echo substr($comm, 0, -2);
                                            }
                                            ?>

                                        </p>
                                        <h4 class="heading4"><?php echo $o_news['title'] ?> </h4>
                              
                                <p class="message">
                                    <?php
                                    echo character_limiter($o_news['description'], 150);
                                    ?></p>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <!--<li class="row">
                            <div class="col-md-4 imageBlock">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-8">
                            <p class="category">Technology</p>
                            <h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
                            <p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                            </li>
                            <li class="row">
                            <div class="col-md-4 imageBlock">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-8">
                            <p class="category">Business</p>
                            <h4 class="heading4">Simply Sylvio is Vine's first avant -garded gorilla, and he's doing big things </h4>
                            <p class="message">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                    </li>-->
                </ul>
                    </a>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="panel panel-default joinCommunity">
                    <h4 class="heading">Join The Community</h4>
                    <form class="">
                        <div class="form-group">
                            <p class="calloutInfo">Username: demo &nbsp; Password: demo </p>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="userNameEmail">Username Or Email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control" id="userNameEmail" placeholder="Username Or Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <a href="">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn">Login</button>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                        <div class="form-group">
                            <ul class="list-unstyled list-inline socialShareWrap">
                                <li>
                                    <a href="" class="facebook"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="" class="twitter"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="" class="googlePlus"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="" class="pinterest"><i class="fa fa-pinterest-p"></i></a>
                                </li>
                                <li>
                                    <a href="" class="instagram"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

                <div class="panel panel-default activeMembers">
                    <h4 class="heading">Recently Active Members</h4>
                    <div class="row">
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3">
                            <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>

                <div class="panel panel-default groups">
                    <h4 class="heading">Groups</h4>
                    <ul class="list-unstyled">
                        <li class="row">
                            <div class="col-md-3 imageBlock">
                                <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <h5 class="listHeading">Terminator</h5>
                                <span class="totalMembers">13 members</span>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-md-3 imageBlock">
                                <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <h5 class="listHeading">Source Code</h5>
                                <span class="totalMembers">13 members</span>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-md-3 imageBlock">
                                <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <h5 class="listHeading">Goin in 60 Seconds<h5>
                                        <span class="totalMembers">13 members</span>
                                        </div>
                                        </li>
                                        </ul>
                                        </div>

                                        <div class="panel panel-default groups">
                                            <h4 class="heading">Members</h4>
                                            <ul class="list-unstyled">
                                                <li class="row">
                                                    <div class="col-md-3 imageBlock">
                                                        <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5 class="listHeading">Arnold Greitan John</h5>
                                                        <span class="totalMembers">active 36 minutes ago</span>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-3 imageBlock">
                                                        <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5 class="listHeading">GhostPool</h5>
                                                        <span class="totalMembers">active 1 day, 14 hours ago</span>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-3 imageBlock">
                                                        <img src="<?php echo backend_asset_url() ?>/images/community/musician.jpg" alt="" class="img-responsive">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5 class="listHeading">Chynna Phillips<h5>
                                                                <span class="totalMembers">active 3 weeks ago</span>
                                                                </div>
                                                                </li>
                                                                </ul>
                                                                </div>

                                                                <div class="panel events sectionOverlay">
                                                                <h4 class="heading">Events</h4>
                                                                <?php foreach ($events as $event) { ?>
                                                                    <a href="<?php echo base_url() . "event/" . $event['id'] ?>"><p class="eventName"><?php echo $event['event_name'] ?></p></a>
                                                                    <p class="eventDate"><?php echo date("F d, Y", strtotime($event['start_date'])) . "-" . date("F d, Y", strtotime($event['end_date'])) ?></p>
                                                                <?php } ?>
                                                                <div class="text-center"><a href="" class="viewAll">View All Events</a></div>
                                                            </div>

                                                                <div class="panel panel-default statistics">
                                                                    <h4 class="heading">Statistics</h4>
                                                                    <div class="row">
                                                                        <div class="col-xs-6 col-sm-12 col-lg-6">
                                                                            <div class="table">
                                                                                <div class="tableCol">
                                                                                    <span class="iconCircle"><i class="fa fa-pencil"></i></span>
                                                                                </div>
                                                                                <div class="tableCol">
                                                                                    <h5 class="colHeading">Posts</h5>
                                                                                    <span class="count">18</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-6 col-sm-12 col-lg-6">
                                                                            <div class="table">
                                                                                <div class="tableCol">
                                                                                    <span class="iconCircle"><i class="fa fa-comments-o"></i></span>
                                                                                </div>
                                                                                <div class="tableCol">
                                                                                    <h5 class="colHeading">Comments</h5>
                                                                                    <span class="count">55</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-6 col-sm-12 col-lg-6">
                                                                            <div class="table">
                                                                                <div class="tableCol">
                                                                                    <span class="iconCircle"><i class="fa fa-comments"></i></span>
                                                                                </div>
                                                                                <div class="tableCol">
                                                                                    <h5 class="colHeading">Activity</h5>
                                                                                    <span class="count">1502</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-6 col-sm-12 col-lg-6">
                                                                            <div class="table">
                                                                                <div class="tableCol">
                                                                                    <span class="iconCircle"><i class="fa fa-user"></i></span>
                                                                                </div>
                                                                                <div class="tableCol">
                                                                                    <h5 class="colHeading">Members</h5>
                                                                                    <span class="count">16</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-6 col-sm-12 col-lg-6">
                                                                            <div class="table">
                                                                                <div class="tableCol">
                                                                                    <span class="iconCircle"><i class="fa fa-users"></i></span>
                                                                                </div>
                                                                                <div class="tableCol">
                                                                                    <h5 class="colHeading">Groups</h5>
                                                                                    <span class="count">12</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-6 col-sm-12 col-lg-6">
                                                                            <div class="table">
                                                                                <div class="tableCol">
                                                                                    <span class="iconCircle"><i class="fa fa-comment"></i></span>
                                                                                </div>
                                                                                <div class="tableCol">
                                                                                    <h5 class="colHeading">Forums</h5>
                                                                                    <span class="count">11</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12">
                                                                        <a href="" class="well adArea sectionOverlay">RESPONSIVE  AD AREA</a>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                </div>
                                                                <!-- /page content -->
