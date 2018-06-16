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
                    <li><a href="#product">Faculty</a></li>
                    <li><a href="#about">Programme Specification</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                @else
                    {{-- @if(Auth::guard('web'))--}}
                    <li><a href="#product">Faculty</a></li>
                    <li><a href="#about">Programme Specification</a></li>
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
                <h1> About FCIH</h1>
                <p>FCIH primary location was in Garden City, Cairo , Egypt then in 2002 ~ 2003 the faculty have been shifted gradually to the main campus in helwan. Getting into the race starting from 1999. FCIH always try to keep its standard student academic level. FCIH with all its resources serve a harmonic education system with new and pioneered education methods".</p>
                <p><a class="btn btn-tranparent btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
    </div>
</div>



<section class="product-sec" id="product">

    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="text-center"><small class="text-green">Our Faculty</small><br />Know About FCIH</h2>
            </div>
        </div>

        <div class="row product-block">
            <div class="col-lg-3 col-md-3 col-md-offset-1 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/product-01.jpg" class="img-circle img-responsive"></div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="content-block">
                    <div class="heading">The origin of the college</div>
                    <p>On 18/7/1994, the Helwan University Council approved the establishment of the Faculty of Computer and Information Sciences. The Higher Council of Universities approved on January 7, 1995 the establishment of the College and the adoption of its internal regulations, which is the first college of computers in Egypt. The President of the Republic Decree No. 419 of 1995 was issued to establish the college in order to contribute effectively to the service of the society and to allow everyone to learn the techniques of computers and information systems to serve the development issues to enter the information age by qualifying the manpower necessary for the labor market in the new era .</p>
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
                    <div class="heading">College Vision</div>
                    <p>The Faculty of Computer and Information at Helwan University seeks to achieve scientific, practical and research excellence in the field of computers and information locally and regionally.</p>
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
                    <div class="heading">College Message</div>
                    <p>The College is working on preparing a distinguished graduate capable of competing in the local and regional labor market in the fields of computers and information, while contributing to serving the local community and enriching scientific research.</p>
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
                    <h3>Programme Specification</h3>
                    <p>Enable graduates to exhibit a high level of practical and theoretical skills over a broad range of Computer Science together with knowledge of currently available techniques and technologies.</p>
                    <ul>
                        <li>Apply the basics of Physics.</li>
                        <li>Apply the basics of Electronics for Digital Design.</li>
                        <li>Describe and model Mathematical Problems.</li>
                        <li>Elaborate Selected Topics in Pattern Recognition and Image Processing.</li>
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
                <h2 class="text-center"><small class="text-green">Our Services</small><br />Know About Our Service</h2>
            </div>
        </div>


        <div class="row services-container">
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa fa-laptop" aria-hidden="true"></i>
                    <h3>Intellectual skills</h3>
                    <p>Develop the act of getting people together to accomplish desired goals and objectives (Management skills).</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa  fa-calendar" aria-hidden="true"></i>
                    <h3>Knowledge and understanding</h3>
                    <p>Describe the Modeling Problems and simulation techniques to solve them.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa  fa-bug" aria-hidden="true"></i>
                    <h3>Professional and Practical skills</h3>
                    <p> use of specialized IT applications such as program development environments and CASE tools.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    <h3>General and Transferable Skills</h3>
                    <p> Practice Learning and working both independently and in groups.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa fa-diamond" aria-hidden="true"></i>
                    <h3>Academic Standards</h3>
                    <p>We used the National Academic References Standards (NARS) for Computing Academic Programs, developed by Computing and Engineering Sector in the Supreme Council of Universities.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-block text-center">
                    <i class="fa  fa-comments" aria-hidden="true"></i>
                    <h3>Intellectual Skills</h3>
                    <p>Identify a range of solutions and evaluation.</p>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="blog-sec" id="blog">
    <div class="container blog-block">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h2 class="text-center"><small>Our Courses</small><br />It always seems impossible until its done.</h2>
            </div>
        </div>
        <div class="row no-gutter content-block">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/service-01.jpg" class="img-responsive"></div>
                <div class="text-block text-center">
                    <h3 class="text-center">Data Storage and Retrieval.<small>15 Oct, 2:16 PM</small></h3>
                    <p> This course presents the study of file structures through an object-oriented approach allowing students to acquire the fundamental tools needed to design cost-effective and appropriate solutions to file structure problems. The course includes the following topics: indexing.</p>
                    <a href="#" class="btn btn-default">Read Post</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="text-block text-center">
                    <h3 class="text-center">Data Structures.<small>15 Sep, 2:16 PM</small></h3>
                    <p>Built-in data structures. Stacks, queues, linked lists, and tree structures. Sorting algorithms, searching algorithms, and hashing. Abstract data types (ADT) scheduling algorithm. Memory organization and management for single user and multi-user system. </p>
                    <a href="#" class="btn btn-default">Read Post</a>
                </div>
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/service-02.jpg" class="img-responsive"></div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="img-sec"><img src="{{url('design/welcome') }}/img/service-03.jpg" class="img-responsive"></div>
                <div class="text-block text-center">
                    <h3 class="text-center">Analysis and Design of Information Systems-2.<small>15 Dec, 2:16 PM</small></h3>
                    <p>This module aims at enabling the students to understand the range of life cycle approaches, methodologies, tools and techniques available for the design of various aspects of information systems.</p>
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
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive" src="{{url('design/welcome') }}/img/draliaa.png" alt="">
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

                                        <p>The Faculty of Computing and Information at Helwan University seeks to achieve scientific, practical and research excellence in the field of computers and information Locally and regionally</p>
                                        <small>DR\ Aliaa</small>
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