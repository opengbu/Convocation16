<?php
/*
 *  Created on :Jul 15, 2015, 4:38:16 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Sign Up GBU Convocation 2016
        </title>       

        <link rel="stylesheet" href="<?php echo $this->cdn->users() . 'application/views/common/' . 'css/bootstrap-select.min.css' ?>">
        <link rel="stylesheet" href="<?php echo $this->cdn->users() . 'application/views/common/' . 'css/bootstrap.min.css' ?>">
        <link rel="shortcut icon" href="<?php echo $this->cdn->base() . '/resources/images/favicon.ico' ?>">

        <script type="text/javascript" src="<?php echo $this->cdn->users() . 'application/views/common/' . 'js/jquery-2.1.3.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo $this->cdn->users() . 'application/views/common/' . 'js/bootstrap-select.min.js' ?>"></script>
        <script type="text/javascript" src="<?php echo $this->cdn->users() . 'application/views/common/' . 'js/bootstrap.min.js' ?>"></script>
        <style>
            body{
                background-image: url('<?php echo $this->cdn->users() . 'application/views/common/' . 'color-splash.jpg' ?>');
                background-size: cover;
            }
            .centered-form{
                margin-top: 60px;
            }

            .centered-form .panel{
                background: rgba(255, 255, 255, 0.8);
                box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
            }
            .navbar-brand
            {
                position: absolute;
                width: 100%;
                left: 0;
                text-align: center;
                margin: auto;
            }
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row centered-form">

                <nav class="navbar navbar-fixed-top navbar-inverse navbar-default navbar-custom" role="navigation">
                    <a class="navbar-brand" href="<?php echo base_url() ?>"><font size="6" color="white">Welcome To GBU Convocation 2016</font></a> 
                </nav>
                <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><div class="text-center"> Sign up for GBU Convocation</div></h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            echo form_open('Register/index/');
                            ?>
                            <div class="form-group">
                                <input type="text" name="username" value="<?= set_value('username') ?>"class="form-control input-sm"  placeholder="username" required="true">
                            </div>

                            <div class="form-group">
                                <input type="text" name="full_name" value="<?= set_value('full_name', @$full_name) ?>" class="form-control input-sm" placeholder="Full Name" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" name="fathersName" value="<?= set_value('fathersName', @$fathersName) ?>" class="form-control input-sm" placeholder="Father's Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="roll_number" value="<?= set_value('roll_number', @$roll_number) ?>" class="form-control input-sm" placeholder="Roll Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="degreeName" value="<?= set_value('degreeName', @$degreeName) ?>" class="form-control input-sm" placeholder="Degree Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="AreaSpecialization" value="<?= set_value('AreaSpecialization', @$AreaSpecialization) ?>" class="form-control input-sm" placeholder="Area Of Specialization">
                            </div>
                            <div class="form-group">
                                <input type="text" name="year" value="<?= set_value('year', @$year) ?>" class="form-control input-sm" placeholder="Passout Year">
                            </div>

                            <div class="form-group">
                                <select class="selectpicker" name="gender">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" value="<?= set_value('email', @$email) ?>" class="form-control input-sm" placeholder="Email Address" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone_number" value="<?= set_value('phone_number', @$phone_number) ?>" class="form-control input-sm" placeholder="Phone Number">
                            </div>




                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password"   class="form-control input-sm" placeholder="Password" required="required">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="passconf" class="form-control input-sm" placeholder="Confirm Password" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <?php
                                echo '<label><font color="red">' . validation_errors() . '</font></label>';
                                ?>
                            </div>
                            <input type="submit" value="Register" class="btn btn-info btn-block" />

                            </form>
                            <a href="<?= base_url('login') ?>" class="btn btn-info btn-block" />Already Registered?    Sign in </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>