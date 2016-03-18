<?php
/*
 *  Created on :Jul 10, 2015, 12:18:54 PM
 *  Author     :Varun Garg <varun.10@live.com>
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controls extends CI_Controller
{

    function index()
    {
        redirect(base_url() . 'user_controls/view_all');
    }

    var $image_path = NULL;

    function secure_hard($level = 4)
    {

        if ($this->input->get("user_id") == NULL && $this->permissions->get_level() < 4) {
            //new user
            echo $this->load->view('common/header', '', TRUE);
            $message['errors'] = "Insufficient Privelleges. Please Contact an Administrator";
            echo $this->load->view('Error_message', $message, TRUE);
            echo $this->load->view('common/footer', '', TRUE);
            die();
        }

        if ($this->input->get("user_id") == $this->session->userdata('user_id'))
            return 1; //current user


        if ($this->permissions->get_level() < $level) { //minimnum level to edit/create a user
            //not current user
            echo $this->load->view('common/header', '', TRUE);
            $message['errors'] = "Insufficient Privelleges. Please Contact an Administrator";
            echo $this->load->view('Error_message', $message, TRUE);
            echo $this->load->view('common/footer', '', TRUE);
            $this->load->view('common/footer');
            die();
        }
        //however
        if ($this->input->get("user_id") != NULL && $this->permissions->check_if_greater(NULL, $this->input->get("user_id")) != 1) {
            //Cant modify boss
            echo $this->load->view('common/header', '', TRUE);
            $message['errors'] = "Insufficient Privelleges. You cannot modify a user with equal or greater access";
            echo $this->load->view('Error_message', $message, TRUE);
            echo $this->load->view('common/footer', '', TRUE);
            die();
        }
        return 1;
    }

    function secure_post()
    {
        if ($this->permissions->get_level() < $this->permissions->get_level($this->input->post('type'))) {
            echo $this->load->view('common/header', '', TRUE);
            $message['errors'] = "Serious attempt to breach security has been detected. Your action will be reported<br />" .
                'You can help us in improving security, contact - varun.10@live.com ';
            echo $this->load->view('Error_message', $message, TRUE);
            echo $this->load->view('common/footer', '', TRUE);

            die();
        }
    }

    function CreateOrUpdate()
    {
        $this->secure_hard();
        error_reporting(E_ERROR);

        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));

        $this->form_validation->set_rules('full_name', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email');
        $this->form_validation->set_rules('profile_picure', 'Profile Picture', 'callback_check_image_and_upload');
        $this->form_validation->set_rules('roll_number', 'Roll Number', 'required|callback_check_roll_no');
        $this->form_validation->set_rules('fathersName', 'fathersName', 'required');
        $this->form_validation->set_rules('degreeName', 'degreeName', 'required');
        $this->form_validation->set_rules('AreaSpecialization', 'AreaSpecialization', 'required');
        $this->form_validation->set_rules('year', 'year', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('accomodation', 'Accomodation', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run() == FALSE) {


            if ($this->input->get("user_id") != NULL) {

                $query = $this->db->get_where('users', array('user_id' => $this->input->get('user_id')));
                if ($query->num_rows() == 0) {
                    echo "<br /><br /><br /><br />No such user exists";
                    return;
                }
                $form_data = $query->row();
                if ($form_data->final_submission == 1) {
                    echo $this->load->view('common/header', '', TRUE);
                    ?>
                    <style>
                        .centered-form {
                        }

                        .centered-form .panel {
                            background: rgba(255, 255, 255, 0.8);
                            box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;

                    </style>
                    <div class="row">
                        <br/><br/><br/>
                        <div class="col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-2">
                            <div class="alert alert-success centered-form">
                                Your Application is already Submitted.
                                <br/><b>Now you must pay registration fee to complete the registration process.</b>
                            </div>
                            <br/><br/>
                            <div class="pm-button text-center"><a
                                    href="https://www.payumoney.com/paybypayumoney/#/116435"><img
                                        src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png"/></a>
                            </div>
                            <br/><br/>
                            <div class="pm-button text-center">
                                <a class="btn btn-bg btn-md btn-success " target="_blank"
                                   href="<?= base_url('convert_pdf?user_id=' . $this->input->get('user_id')) ?>">Download
                                    Registration Receipt</a>
                            </div>
                            <br/>
                            <div class="text-center">
                                <b><font color='red'>Note:</font> You must bring both registration receipt and <br/>payment
                                    receipt (That you receive from
                                    payment gateway ) at convocation ceremony.</b>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo $this->load->view('common/footer', '', TRUE);
                    die();
                }
                $this->load->view('common/header');
                $this->load->view('User_form', $form_data);
                $this->load->view('common/footer');
            } else {
                $this->load->view('common/header');

                $this->load->view('User_form');
                $this->load->view('common/footer');
            }
        } else {
            $this->load->helper('htmlpurifier');

            $password = $this->input->post('password');
            $hash = $this->bcrypt->hash_password($password);
            $confirmation_link = bin2hex(openssl_random_pseudo_bytes(18)); // 36 character lin
            $extra_log_message = NULL;

            $form_data = array(
                'email' => html_purify($this->input->post('email')),
                'type' => html_purify($this->input->post('type')),
                'full_name' => html_purify($this->input->post('full_name')),
                'roll_number' => html_purify($this->input->post('roll_number')),
                'profile_picture' => $this->image_path,
                'active' => 1, // auto activate
                'address' => html_purify($this->input->post('address')),
                'gender' => html_purify($this->input->post('gender')),
                'fathersName' => html_purify($this->input->post('fathersName')),
                'degreeName' => html_purify($this->input->post('degreeName')),
                'AreaSpecialization' => html_purify($this->input->post('AreaSpecialization')),
                'year' => html_purify($this->input->post('year')),
                'phone_number' => html_purify($this->input->post('phone_number')),
                'accomodation' => html_purify($this->input->post('accomodation')),
                'company_name' => html_purify($this->input->post('company_name')),
                'company_location' => html_purify($this->input->post('company_location')),
                'compay_designation' => html_purify($this->input->post('compay_designation')),
                'final_submission' => '1',
            );

            if (strlen($this->image_path) == 0)
                unset($form_data['profile_picture']);

            if ($this->input->get('user_id') != "") {

                $query = $this->db->get_where('users', array('user_id' => $this->input->get('user_id')));
                $old_form_data = $query->row();

                $this->secure_post();
                if (strlen($password) == 0) { // no change
                    unset($form_data['password']);
                } else {
                    $extra_log_message = $extra_log_message . ' + updated password ';
                }

                if ($form_data['type'] != $old_form_data->type) {
                    $extra_log_message = $extra_log_message . ' + Changed role to ' .
                        $this->permissions->get_full_type($form_data['type']);
                } else {
                    unset($form_data['type']);
                }

                unset($form_data['confirmation_link']); //not needed

                $this->db->update('users', $form_data, " user_id = '" . $this->input->get('user_id') . "'");
                $this->logger->insert('Updated user - ' . html_purify($this->input->post('username')) . ' (' . $this->input->get('user_id') . ')' . $extra_log_message, TRUE, TRUE);
            } else {
                $this->db->insert('users', $form_data, TRUE, TRUE);
            }
            //redirect(base_url() . 'user_controls/view_all');
            echo $this->load->view('common/header', '', TRUE);
            ?>
            <br/><Br/><br/>
            <div class="col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-2">
                <div class="alert alert-success centered-form">

                    <span class="glyphicon glyphicon-ok"></span> <strong>Success</strong>
                    <hr class="message-inner-separator">
                    Your Application is now Submitted
                    <br/><b>Now you must pay registration fee to complete the registration process.</b>

                </div>
                <br/><br/>
                <div class="pm-button text-center"><a class=""
                                                      href="https://www.payumoney.com/paybypayumoney/#/B768B5B1DA942E2106287E0360C621A3"><img
                            src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png"/></a></div>
                <br/><br/>
                <div class="pm-button text-center">
                    <a class="btn btn-bg btn-md btn-success " target="_blank"
                       href="<?= base_url('convert_pdf?user_id=' . $this->input->get('user_id')) ?>">Download
                        Registration Receipt</a>
                </div>
                <br/>
                <div class="text-center">
                    <b><font color='red'>Note:</font> You must bring both registration receipt and <br/>payment receipt
                        (That you receive from
                        payment gateway ) at convocation ceremony.</b>
                </div>
            </div>
            <?php
            echo $this->load->view('common/footer', '', TRUE);

            die();
        }
    }

    function view_all()
    {

        $this->load->view('common/header');
        $this->load->view('View_allusers');
        $this->load->view('common/footer');
    }

    function check_username()
    { // Check if user already exists
        $username = $this->input->post('username');
        $user_id = $this->input->get('user_id');
        $q = $this->db->query("select * from users where username = '$username' and user_id != '$user_id'");
        if ($q->num_rows() > 0) {
            $this->form_validation->set_message('check_username', 'The user ' . $username . ' already exists.');
            return FALSE;
        }
        return TRUE;
    }

    function check_email()
    { // Check if email already exists
        $email = $this->input->post('email');
        $user_id = $this->input->get('user_id');

        $q = $this->db->query("select * from users where email = '$email' and user_id != '$user_id'");
        if ($q->num_rows() > 0) {
            $this->form_validation->set_message('check_email', 'The email account ' . $email . ' already exists.');
            return FALSE;
        }
        return TRUE;
    }

    function check_pass()
    { //If password is not empty it should match with repeated password in form.
        $password = $this->input->post('password');
        $passconf = $this->input->post('passconf');

        if ($this->input->get('user_id') == NULL) { // new user
            if (strlen($password) < 6) {
                $this->form_validation->set_message('check_pass', 'Password must be of atleast 6 letters ');
                return FALSE;
            }
        }

        if ($password == $passconf)
            return TRUE;
        $this->form_validation->set_message('check_pass', 'Passwords do not match ');
        return FALSE;
    }

    function check_image_and_upload()
    {

        if (isset($_FILES['profile_picure']['tmp_name']) && strlen($_FILES['profile_picure']['tmp_name']) > 0) {

            if (!file_exists('../user_uploads/profile_images')) {
                mkdir('../user_uploads/profile_images', 0777, true);
            }

            $info = new SplFileInfo($_FILES['profile_picure']['name']);

            $config['upload_path'] = '../user_uploads/profile_images';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $this->input->get('user_id') . '.' . $info->getExtension();

            $this->image_path = 'user_uploads/profile_images/' . $config['file_name']; //to be used by main f'n

            $this->load->library('upload', $config);
            if ($this->upload->do_upload("profile_picure")) {
                return TRUE;
            } else {
                $this->form_validation->set_message('check_image_and_upload', $this->upload->display_errors());
                return FALSE;
            }
        } else {
            $curr_q = $this->db->query("select profile_picture from users where user_id = '" . $this->input->get('user_id') . "'");
            $curr_r = $curr_q->row();
            $profile_picture = $curr_r->profile_picture;
            echo $profile_picture;

            if ($profile_picture == 'resources/images/blank.jpg') {
                $this->form_validation->set_message('check_image_and_upload', 'Please Upload a Profile Picture');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    function delete()
    {
        $this->secure_hard();
        $this->secure_post();

        $title_q = $this->db->query("select username from users where user_id = '" . $this->input->get('user_id') . "' ");
        $title_r = $title_q->row();
        $title = $title_r->username;

        $this->db->query("delete from users where user_id = '" . $this->input->get('user_id') . "'");

        $this->logger->insert('deleted user ' . $title . ' (' . $this->input->get('user_id') . ')', TRUE, TRUE);

        redirect(base_url() . 'user_controls/view_all');
    }

    function set_type()
    {
        $this->secure_hard(2);
        $this->secure_post();
        $form_data['type'] = $this->input->post('type');

        $query = $this->db->get_where('users', array('user_id' => $this->input->get('user_id')));
        $old_form_data = $query->row();
        if ($form_data['type'] != $old_form_data->type) {
            $log_message = ' Changed ' . $old_form_data->username . ' (' . $old_form_data->user_id . ')\'s role to ' .
                $this->permissions->get_full_type($form_data['type']);
            $this->logger->insert($log_message, TRUE, TRUE);
        }
        $this->db->update('users', $form_data, " user_id = '" . $this->input->get('user_id') . "'");
        redirect(base_url() . 'user_controls/view_all');
    }

    function set_distinguished()
    {
        $this->secure_hard(2);
        $form_data['distinguished'] = $this->input->post('distinguished');

        $query = $this->db->get_where('users', array('user_id' => $this->input->get('user_id')));
        $old_form_data = $query->row();
        if ($form_data['distinguished'] != $old_form_data->distinguished) {
            $log_message = ' Changed ' . $old_form_data->username . ' (' . $old_form_data->user_id . ')\'s status to ' .
                $form_data['distinguished'];
            $this->logger->insert($log_message, TRUE, TRUE);
        }
        $this->db->update('users', $form_data, " user_id = '" . $this->input->get('user_id') . "'");
        redirect(base_url() . 'user_controls/view_all');
    }

    public function check_roll_no()
    {
        return TRUE; // due to old roll numbers in numerical format

        if (preg_match("@^([^/]*/){2}@", $roll_no))
            return TRUE;

        $this->form_validation->set_message('check_roll_no', 'Roll Number ' . $roll_no . ' must be in XX/XXX/XXX format ');
        return FALSE;
    }

    public function payment()
    {
        $request = ltrim($_SERVER['QUERY_STRING'], "=");
        echo $this->load->view('common/header', '', TRUE);

        if ($request == "success") {
            ?>
            <br/><br/><br/>
            <div class="col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-2">
                <div class="alert alert-success centered-form text-center">

                    <span class="glyphicon glyphicon-ok"></span> <strong>Success</strong>
                    <hr class="message-inner-separator">
                    Your Registration Fee has been received.
                    <br/><b>Please bring <b><div style = "color: #ff0000; display: inline" >both</div></b> Fee Slip and
                        <a target="_blank"
                           href="<?= base_url('convert_pdf?user_id=' . $this->session->userdata('user_id')) ?>">Registration Receipt</a>
                        with you for ceremony.</b>

                </div>
            </div>
            <?php
        }
        else
            {
  ?>
                <br/><br/><br/>
                <div class="col-sm-6 col-md-6 col-sm-offset-2 col-md-offset-2">
                    <div class="alert alert-danger centered-form text-center">

                        <span class="glyphicon glyphicon-remove"></span> <strong>Error</strong>
                        <hr class="message-inner-separator">
                        Your Registration Fee could not be received. <br />
                        Please try again using button bellow.
                    </div>
                    <br/><br/>
                    <div class="pm-button text-center"><a class=""
                                                          href="https://www.payumoney.com/paybypayumoney/#/B768B5B1DA942E2106287E0360C621A3"><img
                                src="https://www.payumoney.com//media/images/payby_payumoney/buttons/212.png"/></a></div>
                    <br/><br/>
                    <br/>
                    <div class="text-center">
                        <b><font color='red'>Note:</font> You must bring both registration receipt and <br/>payment receipt
                            (That you receive from
                            payment gateway ) at convocation ceremony.</b>
                    </div>
                </div>
                <?php
            }
            echo $this->load->view('common/footer', '', TRUE);

        }

    }
    
