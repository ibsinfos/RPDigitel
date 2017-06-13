<div class="newsWrapper">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            
            <img src="<?php echo backend_asset_url()?>images/news/banner1.jpg" alt="banner1">
            
            <div class="carousel-caption">
                <h2><?php echo $news['title']?></h2>
            </div>
        </div>
<!--        <div class="item">
            <img src="<?php echo backend_asset_url()?>images/news/banner2.jpg" alt="banner1">
            <div class="carousel-caption">
                <h2><?php echo $news['title']?></h2>
            </div>
        </div>-->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-9">
            <div class="newsDetail">
                <?php if(file_exists($news['image']) && $news['image'] !='') { ?>
                <img src="<?php  echo base_url().$news['image']?>" class="img-responsive newsImage">
                <?php }?>
                <h3 class="heading"><?php echo $news['title']?></h3>
                <ul class="list-unstyled list-inline">
                    <li class="postBy">By <strong>Admin</strong></li>
                    <li><i class="fa fa-calendar"></i> <?php echo date("d F Y",strtotime($news['created']))?></li>
<!--                    <li><i class="fa fa-eye"></i> 25600</li>
                    <li><i class="fa fa-comments-o"></i> 56</li>-->
                </ul>
                <p><?php echo $news['description']?></p>
            </div>
            
            <div class="row">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ul class="list-unstyled list-inline socialShareWrap">
                        <li class="heading"><strong>Share:</strong></li>
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
            </div>
            <div class="table postAuthor">
                <div class="tableCol">
                    <img src="<?php echo backend_asset_url()?>images/news/post1.jpg" class="img-circle">
                </div>
                <div class="tableCol">
                    <h4>AUTHOR: <strong class="authorName">Admin</strong></h4>
                    <!--<p>Its about the news author John snow with that. Hey, tell me something. You’ve got all this money. How come you always dress like you’re doing your laundry? Explain that. Leela, Bender, we’re going grave robbing.</p>-->
                </div>
            </div>

<!--            <div class="showComments">
                <h4 class="heading">4 Comments</h4>
                <ul class="list-unstyled">
                    <li class="row">
                        <div class="col-xs-2 col-lg-1 imageBlock"><img src="<?php echo backend_asset_url()?>images/news/tag.png" class="img-responsive"></div>
                        <div class="col-xs-10 col-lg-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Juliya Anderson</h5>
                                </div>
                                <div class="col-md-6">
                                    <span>January 26, 2016 / <i class="fa fa-reply"></i> Reply</span>
                                </div>
                                <div class="col-md-12">
                                    <p>Its about a the news author John snow with that. Hey, tell me something. You’ve got all this money. How come you dress like you’re doing your laundry? Explain that. Leela, Bender, we’re going grave robbing.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="row repliedRow">
                        <div class="col-xs-2 col-lg-1 imageBlock"><img src="<?php echo backend_asset_url()?>images/news/tag.png" class="img-responsive"></div>
                        <div class="col-xs-10 col-lg-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Juliya Anderson</h5>
                                </div>
                                <div class="col-md-6">
                                    <span>January 26, 2016 / <i class="fa fa-reply"></i> Reply</span>
                                </div>
                                <div class="col-md-12">
                                    <p>Its about a the news author John snow with that. Hey, tell me something. You’ve got all this money. How come you dress like you’re doing your laundry? Explain that. Leela, Bender, we’re going grave robbing.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="row">
                        <div class="col-xs-2 col-lg-1 imageBlock"><img src="<?php echo backend_asset_url()?>images/news/tag.png" class="img-responsive"></div>
                        <div class="col-xs-10 col-lg-11">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Juliya Anderson</h5>
                                </div>
                                <div class="col-md-6">
                                    <span>January 26, 2016 / <i class="fa fa-reply"></i> Reply</span>
                                </div>
                                <div class="col-md-12">
                                    <p>Its about a the news author John snow with that. Hey, tell me something. You’ve got all this money. How come you dress like you’re doing your laundry? Explain that. Leela, Bender, we’re going grave robbing.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="leaveComment">
                <h4 class="heading">Leave a comment</h4>
                <form>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="col-md-4 form-group">
                            <input type="url" class="form-control" placeholder="Website">
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" placeholder="Your Comment" rows="10"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>-->
        </div>
        <div class="col-sm-4 col-md-3">
            <div class="input-group searchBtn">
                <input type="search" class="form-control" placeholder="Search...">
                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-search"></i></span>
            </div>
            <h4 class="heading">Why choose us</h4>
            <p>Curabitur libero. Donec facilisis velit eu est. Phasellues cons quat. Aenean vitae quamic. Vivdamus nunc. Nunc conseq usemdw veld metus imperdiet lacinia.</p>
            <p>In viverra.dolor non justo. Proin molest erat inder rhoncus posuere de nibh quam onsectet uer lectus acwl vulputate ligula lorem dolor.Donec nunc. Suspendisse potent. Integer</p>
            <h4 class="heading">Recent Posts</h4>
            <?php foreach($recent_news as $re){?>
            <?php if(file_exists($re['image']) && $re['image'] !='') { ?>
            <a href="<?php echo base_url()."news/".$re['id']?>">
            <img src="<?php echo base_url().$re['image']?>" alt="banner1"  class="img-responsive">
             <?php }?>
            <h5 class="heading2"><?php echo $re['title']?></h5>
            </a>
            <p class="postDate"><i class="fa fa-calendar"></i> <?php echo date("d F Y",strtotime($re['created']))?></p>
            
           <?php }?>
            
        </div>
    </div>
</div>
</div>