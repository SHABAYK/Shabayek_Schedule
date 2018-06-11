<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>FCIH</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link href="{{url('design/welcome') }}/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Font Awesome icon style  -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="{{url('design/welcome') }}/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('design/welcome') }}/css/contact-input-style.css">
    <link rel="stylesheet" type="text/css" href="{{url('design/welcome') }}/css/loaders.css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div class="loader loader-bg">
    <div class="loader-inner ball-pulse-rise">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- Static navbar -->
<nav class="navbar navbar-default top-bar affix" data-spy="affix" data-offset-top="250" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/sceduale/public/">F<span>CI</span>H</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#home">Home</a></li>
                 @if(Auth::guest())
                    <li><a href="{{ url('login') }}">Login</a></li>
                <li><a href="#product">Products</a></li>
                <li><a href="#about">Who We Are</a></li>
                <li><a href="#service">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                @else
                {{-- @if(Auth::guard('web'))--}}
                    <li><a href="#product">Products</a></li>
                    <li><a href="#about">Who We Are</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ url('logout') }}">Logout</a></li>
            @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="jumbotron" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 content-sec">
                <h1>When you can't make them see the light, make them feel the heat.</h1>
                <p>The regret on our side is, they used to say years ago, we are reading about you in science class.</p>
                <p><a class="btn btn-tranparent btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
    </div>
</div>



<section class="product-sec" id="product">

    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="text-center"><small class="text-green">Our Products</small><br />Don't find fault, find a remedy</h2>
            </div>
        </div>

        <div class="row product-block">
            <div class="col-lg-3 col-md-3 col-md-offset-1 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/product-01.jpg" class="img-circle img-responsive"></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="content-block">
                    <div class="heading">Product Name Goes here</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn btn-green">Read more</a>
                </div>
            </div>



        </div>

        <div class="row product-block">

            <div class="col-lg-4 col-md-4 col-sm-12 pull-right">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/product-02.jpg" class="img-circle img-responsive"></div>
            </div>
            <div class="col-lg-7 col-md-7 pull-left col-md-offset-1 col-sm-12">
                <div class="content-block">
                    <div class="heading">Product Name Goes here</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn btn-green">Read more</a>
                </div>
            </div>



        </div>

        <div class="row product-block">
            <div class="col-lg-3 col-md-3 col-md-offset-1 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/product-03.jpg" class="img-circle img-responsive"></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="content-block">
                    <div class="heading">Product Name Goes here</div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a href="#" class="btn btn-green">Read more</a>
                </div>
            </div>



        </div>


    </div> <!-- /container -->

</section>


<section class="about-sec" id="about">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 pull-right">
                <div class="content-block">
                    <h3>Who We Are</h3>
                    <p>It suddenly struck me that that tiny pea, pretty and blue, was the Earth. I put up my thumb and shut one eye, and my thumb blotted out the planet Earth.</p>
                    <ul>
                        <li>If you could see the earth illuminated when you were in a place as dark as night, it would look to you more splendid than the moon.</li>
                        <li>I put up my thumb and shut one eye, and my thumb blotted out the planet Earth. I didn't feel like a giant. I felt very, very small.</li>
                        <li>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful. </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="services-sec" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="text-center"><small class="text-green">Our Services</small><br />Don't find fault, find a remedy</h2>
            </div>
        </div>


        <div class="row services-container">
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa fa-laptop" aria-hidden="true"></i>
                    <h3>Responsive Design</h3>
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa  fa-calendar" aria-hidden="true"></i>
                    <h3>Integrated Calendar</h3>
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa  fa-bug" aria-hidden="true"></i>
                    <h3>Bug Free Solutions</h3>
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    <h3>Cloud Storage</h3>
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa fa-diamond" aria-hidden="true"></i>
                    <h3>Premium Features</h3>
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa  fa-comments" aria-hidden="true"></i>
                    <h3>24/7 Support</h3>
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe.</p>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="blog-sec" id="blog">
    <div class="container blog-block">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="text-center"><small>Blog</small><br />It always seems impossible until its done.</h2>
            </div>
        </div>
        <div class="row no-gutter content-block">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/service-01.jpg" class="img-responsive"></div>
                <div class="text-block text-center">
                    <h3 class="text-center">Always do your best. What you plant now, you will harvest later.<small>15 Aug, 2:16 PM</small></h3>
                    <p>The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>
                    <a href="#" class="btn btn-default">Read Post</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="text-block text-center">
                    <h3 class="text-center">Always do your best. What you plant now, you will harvest later.<small>15 Aug, 2:16 PM</small></h3>
                    <p>The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>
                    <a href="#" class="btn btn-default">Read Post</a>
                </div>
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/service-02.jpg" class="img-responsive"></div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/service-03.jpg" class="img-responsive"></div>
                <div class="text-block text-center">
                    <h3 class="text-center">Always do your best. What you plant now, you will harvest later.<small>15 Aug, 2:16 PM</small></h3>
                    <p>The path of a cosmonaut is not an easy, triumphant march to glory. You have to get to know the meaning not just of joy but also of grief, before being allowed in the spacecraft cabin.</p>
                    <a href="#" class="btn btn-default">Read Post</a>
                </div>
            </div>
        </div>
        <div class="row  text-center"><a href="#" class="btn btn-tranparent">View All Posts</a></div>
    </div>
</section>


<section class="testimonial-sec" id="testimonial">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="text-center"><small class="text-green">Testimonials</small><br />What People Says About Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" data-wow-delay="0.2s">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive" src="{{url('design/welcome') }}/img/testimonial-01.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="{{url('design/welcome') }}/img/testimonial-02.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="{{url('design/welcome') }}/img/testimonial-03.jpg" alt="">
                        </li>
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner text-center">

                        <!-- Quote 1 -->
                        <div class="item active">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable confidence in your own powers you cannot be successful or happy.</p>
                                        <small>Norman Vincent Peale</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 2 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p>Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work. And the only way to do great work is to love what you do. If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.</p>
                                        <small>Steve Jobs</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        <!-- Quote 3 -->
                        <div class="item">
                            <blockquote>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">

                                        <p>Two roads diverged in a wood and I - I took the one less traveled by, and that has made all the difference.</p>
                                        <small>Robert Frost</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

</section>


<section class="content contact-sec" id="contact">
    <div class="container form-block">
        <div class="row">
            <div class="col-lg-12 text-center"><h2>Contact Us</h2></div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <span class="input input-hoshi">
					<input class="input_field input_field-hoshi" type="text" id="input-4" />
					<label class="input_label input_label-hoshi input_label-hoshi-color-1" for="input-4">
						<span class="input_label-content input_label-content-hoshi">Name</span>
					</label>
				</span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <span class="input input-hoshi">
					<input class="input_field input_field-hoshi" type="text" id="input-4" />
					<label class="input_label input_label-hoshi input_label-hoshi-color-1" for="input-4">
						<span class="input_label-content input_label-content-hoshi">Phone</span>
					</label>
				</span>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <span class="input input-hoshi">
					<input class="input_field input_field-hoshi" type="text" id="input-4" />
					<label class="input_label input_label-hoshi input_label-hoshi-color-1" for="input-4">
						<span class="input_label-content input_label-content-hoshi">Email</span>
					</label>
				</span>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                <span class="t-area input-hoshi">
                <textarea class="input_field input_field-hoshi" rows="1"></textarea>
						<label class="input_label input_label-hoshi input_label-hoshi-color-1" for="input-4">
						<span class="input_label-content input_label-content-hoshi">Email</span>
					</label>
				</span>
                <a href="#" class="btn btn-tranparent">Submit</a>
            </div>

        </div>
    </div>

</section>


<footer>

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">&copy;<script type="text/javascript">document.write(new Date().getFullYear());</script> FCIH.com</div>
            <div class="col-sm-12 col-md-2 pull-right love-text">Created with <i class="fa fa-heart"></i></div>
        </div>

    </div>

</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="{{url('design/welcome') }}/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{url('design/welcome') }}/js/core.js"></script>

<script>
    if ((".loader").length) {
        // show Preloader until the website ist loaded
        $(window).on('load', function () {
            $(".loader").fadeOut("slow");
        });
    }
</script>

</body>
</html>