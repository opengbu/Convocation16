<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url('application/views/common/favicon.ico') ?>">


        <title>Convocation | GBU</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/bootstrap.min.css' ?>"
              type="text/css">

        <!-- Custom Fonts -->

        <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
              type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/font-awesome.min.css' ?>">

        <link rel="stylesheet" href="<?php echo base_url() . 'application/views/common/' . 'css/grayscale.css' ?>"
              type="text/css">
        <style>

            .intro {
                display: table;
                width: 100%;
                // height: auto;
                padding: 100px 0;
                text-align: center;
                color: #fff;
                background: url(<?php echo base_url() . 'application/views/common/' . 'intro-bg.jpg' ?>) no-repeat bottom center scroll;
                background-color: #000;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }

            .download-section {
                width: 100%;
                padding: 50px 0;
                color: #fff;
                background: url(<?php echo base_url() . 'application/views/common/' . 'downloads-bg.jpg' ?>) no-repeat center center scroll;
                background-color: #000;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
            }

            h3{
                padding: 0px;
                margin: 0px;
            }

            #myModal
            {
                color: black;
            }


        </style>
        <?php
        $phpToJsVars = [
            'map_marker_path' => base_url() . 'application/views/common/' . 'map-marker.png',
        ];
        ?>
        <script type="text/javascript">
            var phpVars = {
<?php
foreach ($phpToJsVars as $key => $value) {
    echo '  ' . $key . ': ' . '"' . $value . '",' . "\n";
}
?>
            };
        </script>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">
                        <i class="fa fa-play-circle"></i> <span class="light">GBU</span> Convocation
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#about">About</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?= base_url('/Login') ?>">Register</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#map">Destination</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Intro Header -->
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading">Convocation 2016</h1>
                            <h2>First Convocation Ceremony Of</h2>

                            <h2>Gautam Buddha University</h2>
                            <a href="#about" class="btn btn-circle page-scroll">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section id="about" class="container content-section text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>About Convocation</h2>
                    <p align="justify">
                        Congratulation on your success in completing your studies at Gautam Buddha University,
                        We are pleased to extend this invitation to attend the first convocation ceremony on 12th April 2016,
                        at 08:30 a.m. venue- University Auditorium,
                        Gautam Buddha University, Greater Noida,
                        for the conferment of degree to the students passed out in 2013, 2014, and 2015.
                        Please refer to the Registration process for the convocation guidelines, dress code,
                        registration fees, and accommodation
                        for details. To confirm your attendance at the ceremony, please get yourself registered.

                        Please note that all who are to receive their degree must be present for the rehearsal
                        on the 10th April 2016 at 11:00 a.m. at the University Auditorium. You are required to report in
                        person on 10th April 2016 at 11:00 a.m. at University Auditorium. You will be given the necessary
                        instructions before the rehearsal.

                        If you do not get yourself registered, you will not be allowed to receive the degree from the Chief
                        Guest. However, you can receive your degree in person from the University Exam Office after the function
                        is over.
                        The convocation dress code of our University is as follows:<br><br>
                        <font color="red"> Boys:</font> White Shirt, Black Pant, Formal Shoes, Cap, Sash<br>
                        <font color="red"> Girls:</font> Cream coloured saree with golden border and cream blouse, Cap, Cape<br><br>
                        <font color="red"> Note:</font> Jodhpuri coats and caps of all sizes are available with the university.
                        Student may buy/hire
                        these items from Dean Student Affairs office on or before 10th April 2016. It is advisable to
                        intimate about the coat size on dsa@gbu.ac.in as soon as you get this mail.<br><br>
                        Looking forward to welcoming you at the convocation ceremony.<br><br>
                        <font size="4">
                        With best wishes<br><br>
                        Yours affectionately<br>
                        (Prof. Anuradha Mishra) <br>
                        Chairperson, Examination & Admission<br>
                        Gautam Buddha University

                        </font>
                    </p>

                    <h4>Your parents are cordially invited. No other guests / relatives are allowed.</h4>


                </div>
            </div>
        </section>


        <!-- Contact Section -->
        <section id="contact" class="content-section text-center">
            <div class="download-section">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2>Contact Us</h2>
                        <p>Feel free to email us to get information about the Convocation 2016</p>

                        <p><a href="mailto:feedback@startbootstrap.com">exams@gbu.ac.in</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <br /><br />

        <div class="text-center"><h3>Destination</h3></div>
        <!-- Map Section -->
        <div id="map"></div>

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Gautam Buddha University 2016 | <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                        Developers</button></p>
            </div>
        </footer>


        <!-- jQuery -->
        <script type="text/javascript"
        src="<?php echo base_url() . 'application/views/common/' . 'js/jquery-2.1.3.min.js' ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script type="text/javascript"
        src="<?php echo base_url() . 'application/views/common/' . 'js/bootstrap.min.js' ?>"></script>

        <!-- Plugin JavaScript -->
        <script type="text/javascript"
        src="<?php echo base_url() . 'application/views/common/' . 'js/jquery.easing.min.js' ?>"></script>

        <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <script type="text/javascript"
        src="<?php echo base_url() . 'application/views/common/' . 'js/grayscale.js' ?>"></script>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog text-center">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Developers</h4>
                    </div>
                    <div class="modal-body">
                        Developed under supervision of Dr. Pradeep Tomar.<br /><br />
                        <p><a href="mailto:sharmasaket703@gmail.com" target="_top">Saket Sharma</a><br />
                            <a href="mailto:varun.10@live.com" target="_top">Varun Garg</a></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </body>

</html>
