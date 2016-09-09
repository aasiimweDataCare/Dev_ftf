<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-config" content="<?php echo base_url() ?>assets/xml/browserconfig.xml"/>


    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/icons/favicon.ico">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png">

    <link href="<?php echo base_url() ?>css/nta.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>css/slide.css" media="all" rel="stylesheet" type="text/css">
    <title>CPMA:MIS</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/jquery.ui.1.9.2.theme/ui/1.9.2/themes/base/jquery-ui.css"
          type="text/html">
    <link href="<?php echo base_url() ?>assets/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" type="text/html">
    <link href="<?php echo base_url() ?>font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/login.css">


</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 well main-container">
            <div align="center" class="row h1-login-div">
                <h1><img src="<?php echo base_url() ?>assets/images/logo_header_main.png"/></h1>
            </div>

            <div class="col-sm-12">
                <div class="col-sm-5 well img-frames">
                    <div id="myCarouselOne" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarouselOne" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarouselOne" data-slide-to="1"></li>
                            <li data-target="#myCarouselOne" data-slide-to="2"></li>
                            <li data-target="#myCarouselOne" data-slide-to="3"></li>
                            <li data-target="#myCarouselOne" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/1.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Training farmers on ICT usage.</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/2.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Facilitating rural households to benefit directly from U.S. government
                                        interventions-Output.</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/3.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Harvesting and making preparations to sell in the market</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/4.jpg"
                                     width="520"
                                     height="320" alt="Coffee">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Coffee</h3>

                                    <p>Production and harvesting.</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/5.jpg"
                                     width="520"
                                     height="320" alt="Beans">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Beans</h3>

                                    <p>Post-Harvest handling services.</p>
                                </div>-->
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarouselOne" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarouselOne" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!--end of box one-->


                <div class="col-sm-5 col-sm-offset-2 well img-frames">
                    <div id="myCarouselTwo" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarouselTwo" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarouselTwo" data-slide-to="1"></li>
                            <li data-target="#myCarouselTwo" data-slide-to="2"></li>
                            <li data-target="#myCarouselTwo" data-slide-to="3"></li>
                            <li data-target="#myCarouselTwo" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/10.jpg"
                                     width="520"
                                     height="320" alt="Beans">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Beans</h3>

                                    <p>Post Harvest Handling Services.</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/9.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Dry Storage solution.</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/8.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Increased production through encouraging women to participate in U.S.
                                        government-assisted programs designed to increase access to productive economic
                                        resources .</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/7.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Facilitating increase in installed dry storage capacity.</p>
                                </div>-->
                            </div>

                            <div class="item">
                                <img class="img-fade" src="<?php echo base_url() ?>assets/images/slide-show/6.jpg"
                                     width="520"
                                     height="320" alt="Maize">

                                <!--<div class="carousel-caption img-caption">
                                    <h3>Maize</h3>

                                    <p>Enabling reduction in post-harvest losses by activity-assisted smallholders.</p>
                                </div>-->
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarouselTwo" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarouselTwo" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!--end of box two-->

            </div>

            <div class="container">
                    <!--start of welcome text-->
                    <div class="col-sm-6 text-right welcome">
                        Welcome to Feed the Future Commodity Production and Marketing Activity MIS. Through Partnership
                        with
                        the Ugandan Government, the private sector, other USAID Feed the Future activities and donor
                        initiatives, we are proud to improve Agriculture and commodity markets in the country.

                    </div>

                    <!--end of welcome text-->

                    <!--start login nav-->
                    <div class="col-sm-6 col-lg-6 login-container">
                        <?php
                        $attributes = array("class" => "navbar-form", "id" => "loginform", "name" => "loginform");
                        echo form_open("LoginController/index", $attributes); ?>
                        <div class="form-group">
                            <input class="form-control" id="txt_username" name="txt_username"
                                   placeholder="Username"
                                   type="text" value="<?php echo set_value('txt_username'); ?>"/>
                            <span class="text-danger"><?php echo form_error('txt_username'); ?></span>

                        </div>
                        <div class="form-group">
                            <input class="form-control" id="txt_password" name="txt_password"
                                   placeholder="Password"
                                   type="password" value="<?php echo set_value('txt_password'); ?>"/>
                            <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                        </div>

                        <input id="btn_login" name="btn_login" type="submit" class="btn btn-default"
                               value="Sign In"/>
                        <i class="fa fa-question-circle fa-2x"></i>
                        <?php echo form_close(); ?>
                        <?php echo $this->session->flashdata('msg'); ?>


                    </div>

                    <!--end login nav-->
            </div>

            <div class="container col-sm-12 col-lg-12 text-center">
                <p class="disclaimer">This Management Information System (MIS) is made possible by the support of the
                    American People through
                    the United States Agency for International Development (USAID.) The content of this MIS is the sole
                    responsibility of USAID/Uganda Feed the Future Commodity Production and Marketing Activity and do
                    not
                    necessarily reflect the views of USAID or the United States Government</p>
                <img src="<?php echo base_url() ?>assets/images/logo_footer.png" alt="USAID_logo">
            </div>

        </div>


    </div>
</div>


<div class="container">

    <!--start of Footer-->
    <div align="center" class="row">
        <div class="col-xs-18 col-md-12">
            <footer>
                <div class="container">

                    <p>Developed By <a target="_blank" href="http://www.dcareug.com/" rel="author">Data Care (U)
                            Ltd&trade;</a>&nbsp;&nbsp;  <a target="_blank" href="http://www.mis.ftfcpm.com:9000/"
                                                                               rel="">mis.ftfcpm.com</a> &copy;2014 - <?php echo gmdate('Y'); ?>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <!--end of Footer-->
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url() ?>bootstrap-3.3.5/js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url() ?>bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>js/slide.js"></script>
</body>
</html>