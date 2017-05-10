<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="first-slide" src="<?php echo asset_url()?>images/banner_Img.png" alt="First slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h1>Example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-md btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="<?php echo asset_url()?>images/banner_Img.png" alt="Second slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-md btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="<?php echo asset_url()?>images/banner_Img.png" alt="Third slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block text-right">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-md btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section class="branding dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 title">
                <div class="text-center">
                    <p class="script"><span>Our Complete vCard360™ Mobile Marketing System  <br>
                            Delivers <span class="orange">5 Key Benefits.</span> Watch Intro Video... </span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="branding light orange">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 title">
                <div class="text-center">
                    <p class="script"><span><span class="orange">Connect With US...</span></span></p>

                </div>

            </div>
        </div>
    </div>
</section>


<section class="no-padt">
    <div class="container">
        <div class="row">
            <h5>
                Lorem ipsum dolor sit amet, ut facilis dolores definitionem qui. Veritus docendi convenire eos te, 
                eam et aliquam maluisset. Eum audire percipit concludaturque an, eius nostrum voluptua cu vis.
            </h5>

            <div class="col-md-3 contact-div">
                <img src="<?php echo asset_url()?>images/icons/Contact.png"/>
                <h5>PHONE</h5>
                <p>
                    Tel:(100) 123 4536<br>
                    Mobile: +91 8888888888
                </p>
            </div>
            <div class="col-md-3 contact-div offset-md-1 left-border">
                <img src="<?php echo asset_url()?>images/icons/Address.png"/>
                <h5>ADDRESS</h5>
                <p>
                    Lorem ipsum dolor sit amet<br>ut facilis dolores definitionem qui
                </p>
            </div>
            <div class="col-md-3 contact-div offset-md-1 left-border">
                <img src="<?php echo asset_url()?>images/icons/Message.png"/>
                <h5>EMAIL</h5>
                <p>
                    abc@gmail.com<br> xyz@gmail.com
                </p>
            </div>
        </div>
    </div>
</section>

<!--section>
        <div class="container">
                <div class="row"></div>
        </div>
</section-->

<section class="video-section">
    <div class="col-md-6 ">
        <div id="map"></div>
    </div>

    <div class="col-md-6 video-div1 media side-bg">
        <div class="col-md-9 offset-md-2 content1">
            <h2>Lorem ipsum dolor sit amet, ut facilis dolores definitionem qui.</h2>
            <div class="line"></div>
            <div>
                <form>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="icon-addon addon-lg">
                                <input type="text" placeholder="Name" class="form-control" id="Name">
                                <label for="Name" class="fa fa-user" rel="tooltip" title="Name"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="icon-addon addon-lg">
                                <input type="text" placeholder="number" class="form-control" id="number">
                                <label for="number" class="fa fa-phone" rel="tooltip" title="number"></label>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="icon-addon addon-lg">
                                <input type="text" placeholder="email" class="form-control" id="email">
                                <label for="email" class="fa fa-envelope" rel="tooltip" title="email"></label>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="icon-addon addon-lg">
                                <textarea placeholder="Message" class="form-control" id="exampleTextarea" id="Message" rows="3" style="height: 98px;"></textarea>
                                <label for="Message" class="fa fa-comments-o" rel="tooltip" title="Message"></label>
                            </div>

                            <button type="button" class="btn btn-outline-secondary btn-outline1">Secondary</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>


<section class="branding light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-center image-item">
                    <h2 class="span-blue">Lorem ipsum dolor sit amet</h2>
                    <p>
                        Lorem ipsum dolor sit amet, ut facilis dolores definitionem qui. Veritus docendi convenire 
                        eos te, eam et aliquam maluisset. Eum audire percipit concludaturque an, eius nostrum voluptua 
                        cu vis.
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>



<section class="call-action">
    <div class="container">
        <div class="row justify-content-center">
            <p class="">Call On Our Toll Free number : <span class="orange">00 123 4512</span></p>
        </div>
    </div>
</section>
	<script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjE8K348bIMZmFIfEX74T03MjZp0lBzUA&callback=initMap"
    async defer></script>
