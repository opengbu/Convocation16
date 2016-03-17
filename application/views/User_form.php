<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-sm-5 col-sm-offset-2">
    <div class="text-center">
        <h2>Registration Form</h2><br />
    </div>
    <?php echo form_open_multipart(current_url() . "?" . $_SERVER['QUERY_STRING']); ?>

    <?php
    if (isset($profile_picture) && strlen($profile_picture) > 0) {
        ?>
        <label>Active Picture</label><br />

        <img src = "<?= dirname(base_url()) . '/' . $profile_picture ?>" width="200px"/>
        <br /><br />
        <?php
    }
    ?>
    <label>Add/Change Profile Picture</label><br />
    <?php
    if ($this->input->get('user_id') != NULL) {
        ?>
        <input type = "file" name = "profile_picure" size = "20" />
        <br />
        <?php
    } else {
        echo 'Please create account first. Then go to profile picture and update it from there<br /><br />';
    }
    ?>
    <label>Full Name</label>
    <input type = "text" class = "form-control" name = "full_name" value = "<?php echo set_value('full_name', @$full_name); ?>"/>
    <br />

    <label>Father's Name</label>
    <input type="text" name="fathersName" value="<?= set_value('fathersName', @$fathersName) ?>" class="form-control input-sm" placeholder="Father's Name">
    <br />


    <label>Roll Number</label>
    <input type = "text" class = "form-control" name = "roll_number" value = "<?php echo set_value('roll_number', @$roll_number); ?>"/>
    <br />

    <label>Degree Name</label>
    <input type="text" name="degreeName" value="<?= set_value('degreeName', @$degreeName) ?>" class="form-control input-sm" placeholder="Degree Name">
    <br />

    <label>Area Of Specialization</label>
    <input type="text" name="AreaSpecialization" value="<?= set_value('AreaSpecialization', @$AreaSpecialization) ?>" class="form-control input-sm" placeholder="Area Of Specialization">
    <br />

    <label>Passout Year</label>
    <input type="text" name="year" value="<?= set_value('year', @$year) ?>" class="form-control input-sm" placeholder="Passout Year">
    <br />

    <label>Email Address (unique)</label>
    <input type = "text" class = "form-control" name = "email" value = "<?php echo set_value('email', @$email); ?>"/>
    <br />

    <label>Phone Number</label>
    <input type = "text" class = "form-control" name = "phone_number" value = "<?php echo set_value('phone_number', @$phone_number); ?>"/>
    <br />

    <p>
        <label for="address">Residential Address <span class="required">*</span></label>
        <br /><input class="form-control" id="address" type="text" name="address"  value="<?php echo set_value('address', @$address); ?>"  />
    </p>
    <p>
        <label for="gender">Gender <span class="required">*</span></label>

        <?php
        $options = array(
            '' => 'Please Select',
            'male' => 'Male',
            'female' => 'Female',
        );
        ?>

        <br /><?php echo form_dropdown('gender', $options, set_value('gender', @$gender), 'class="selectpicker"') ?>
    </p>                                             

    <br />
    <p>
        <label for="accomodation">Accommodation Required?<span class="required">*</span></label>

        <?php
        $options = array(
            '' => 'Please Select',
            'no' => 'No',
            'Yes, 1 Extra Guest' => 'Yes, 1 Extra Guest',
            'Yes, 2 Extra Guests' => 'Yes, 2 Extra Guests',
        );
        ?>

        <br /><?php echo form_dropdown('accomodation', $options, set_value('accomodation', @$accomodation), 'class="selectpicker"') ?>
    </p>  

    <br />
    <label>Present Company Name</label>
    <input type = "text" class = "form-control" name = "company_name" value = "<?php echo set_value('company_name', @$company_name); ?>"/>
    <br />


    <label>Work Address</label>
    <input type = "text" class = "form-control" name = "company_location" value = "<?php echo set_value('company_location', @$company_location); ?>"/>
    <br />


    <label>Designation</label>
    <input type = "text" class = "form-control" name = "compay_designation" value = "<?php echo set_value('compay_designation', @$compay_designation); ?>"/>
    <br />

    <br /><?php
    if (!isset($user_id) || $user_id != $this->session->userdata('user_id')) {   // new user, or not current user
        $options = $this->permissions->all_permisiions();

        echo '<label>Type</label><br />';
        echo form_dropdown('type', $options, set_value('type', @$type), 'class="selectpicker"');
        echo '<br /><br />';
    } else
        echo '<input type="hidden" name="type" value="' . $this->session->userdata('type') . '" />';
    ?>   


    <?php
    echo '<label><font color="red">' . validation_errors() . '</font></label>';
    ?>
    <div>
        <b><font color='red'>NOTE: You can not change information once you click on final submit</font></b><br />
        <input type="submit" value="Final Submit" class="btn btn-danger"/>
    </div>
    <?php
    echo form_close();
    ?>
</div>