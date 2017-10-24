<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("user_model");
    }

    public function index() {
        //$this->does_username_exist_test();
        //$this->add_user_test();
        //$this->get_username_test();
        //$this->get_user_id_test();
        //$this->link_user_to_address_test();
        //$this->link_user_to_new_phone_number_test();
        //$this->change_user_phone_number_test();
        //$this->change_email_test();
        //$this->change_username_test();
        //$this->change_password_test();
        //$this->change_user_role_test();
        //$this->disable_user_test();
        //$this->ban_user_test();
        //$this->enable_user_test();
        //$this->get_user_details_test();
        $this->update_user_test();
    }

    private function does_username_exist_test() {
        $username = "dinocajic@gmail.com";

        var_dump(
            $this->user_model->does_username_exist($username)
        );
    }

    private function add_user_test() {
        $data['username']   = 'dinocajic@gmail.com';
        $data['password']   = 'test';
        $data['first_name'] = 'Dino';
        $data['last_name']  = 'Cajic';
        $data['email']      = 'dinocajic@gmail.com';
        $data['user_role']  = 1;

        var_dump(
            $this->user_model->add_user($data)
        );
    }

    private function get_username_test() {
        $id = 1;

        var_dump(
            $this->user_model->get_username($id)
        );
    }

    private function get_user_id_test() {
        $username = "dinocajic@gmail.com";

        var_dump(
            $this->user_model->get_user_id($username)
        );
    }

    private function link_user_to_address_test() {
        $user_id        = 1;

        //$data['street'] = '123 Lane';
        $data['street'] = '123 Lane';
        $data['city']   = 'Atlanta';
        $data['state']  = 'GA';
        $data['zip']    = 30152;

        var_dump(
            $this->user_model->link_user_to_address($user_id, $data)
        );
    }

    public function link_user_to_new_phone_number_test() {
        $user_id      = 1;
        //$phone_number = '7704443333';
        //$phone_number = '77044433331';
        $phone_number = '7704443332';

        var_dump(
            $this->user_model->link_user_to_new_phone_number($user_id, $phone_number)
        );
    }

    public function change_user_phone_number_test() {
        $user_id      = 1;
        //$phone_number = '7704443333';
        //$phone_number = '77044433331';
        $old = '7704443339';
        $new = '7704443340';

        var_dump(
            $this->user_model->change_phone_number($user_id, $old, $new)
        );
    }

    public function change_email_test() {
        $user_id = 1;
        //$email = 'dinocajic@gmail.com';
        $email = 'dino6@cyberrims.com';

        var_dump(
            $this->user_model->change_email($user_id, $email)
        );
    }

    public function change_username_test() {
        $user_id = 1;
        $un = "dino@cyberrims.com";

        var_dump(
            $this->user_model->change_username($user_id, $un)
        );
    }

    public function change_password_test() {
        $user_id = 1;
        $pw = "some_new_password";

        var_dump(
            $this->user_model->change_password($user_id, $pw)
        );
    }

    public function change_user_role_test() {
        $user_id = 1;
        $role_id = 2;

        var_dump(
            $this->user_model->change_user_role($user_id, $role_id)
        );
    }

    public function disable_user_test() {
        $user_id = 1;

        var_dump(
            $this->user_model->disable_user(1)
        );
    }

    public function ban_user_test() {
        $user_id = 1;

        var_dump(
            $this->user_model->ban_user($user_id)
        );
    }

    public function enable_user_test() {
        $user_id = 1;

        var_dump(
            $this->user_model->enable_user($user_id)
        );
    }

    public function get_user_details_test() {
        $user_id = 1;

        var_dump(
            $this->user_model->get_user_details($user_id)
        );
    }

    public function update_user_test() {
        $data = array();

        $data['users']['user_id']            = 1;
        $data['users']['username']           = "dinocajic@gmail.com";
        $data['users']['status']             = 1;
        $data['user_details']['first_name']  = "Dino";
        $data['user_details']['last_name']   = "Cajic";
        $data['user_details']['user_image']  = "img/gallery/dinocajic.jpg";
        $data['user_email']['email']         = "dinocajic@gmail.com";
        $data['user_phone']['old']           = "3332223313";
        $data['user_phone']['new']           = "3332223313";
        $data['user_phone']['phone_type_id'] = 1;
        $data['user_address']['street']      = "1234 Something Ln";
        $data['user_address']['city']        = "Atlanta";
        $data['user_address']['state']       = "GA";
        $data['user_address']['zip']         = 30339;
        $data['user_social']['bio']          = "Something really long needs to go here";
        $data['user_social']['homepage']     = "http://dinocajic.xyz";
        $data['user_social']['blog']         = "http://dinocajic.com";
        $data['user_social']['linkedin']     = "https://www.linkedin.com/in/dinocajic/";
        $data['user_social']['facebook']     = "https://www.facebook.com/dinocajic";
        $data['user_social']['twitter']      = "https://twitter.com/dinocajic";
        $data['user_social']['instagram']    = "https://www.instagram.com/dinocajic/";
        $data['user_social']['github']       = "https://github.com/dinocajic";
        $data['user_social']['google_plus']  = "https://plus.google.com/u/0/+DinoCajic";
        $data['user_social']['youtube']      = "https://www.youtube.com/user/dinocajic";

        var_dump(
            $this->user_model->update_user($data)
        );
    }



}