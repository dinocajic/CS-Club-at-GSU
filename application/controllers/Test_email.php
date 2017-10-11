<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_email extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("email_model");
    }

    public function index() {
        //$this->is_valid_email_test();
        //$this->add_email_test();
        //$this->does_exist_test();
        //$this->get_email_id_test();
        //$this->get_email_address_test();
        //$this->get_emails_test();
        $this->get_all_emails_test();
    }

    private function is_valid_email_test() {
        //$email = "dinocajic@gmail.com";
        $email = "dinocajicgmail.com";

        var_dump(
            $this->email_model->is_valid($email)
        );
    }

    public function add_email_test() {
        $email = "dinocajic@gmail.com";

        var_dump(
          $this->email_model->add_email($email)
        );
    }

    public function does_exist_test() {
        $email = "dinocajic@gmail.com";

        var_dump(
            $this->email_model->does_exist($email)
        );
    }

    public function get_email_id_test() {
        $email = "dinocajic@gmail.com";

        var_dump(
            $this->email_model->get_email_id($email)
        );
    }

    public function get_email_address_test() {
        $email_id = 1;

        var_dump(
            $this->email_model->get_email_address($email_id)
        );
    }

    public function get_emails_test() {
        var_dump(
            $this->email_model->get_emails(),
            $this->email_model->get_emails(2),
            $this->email_model->get_emails(2,0),
            $this->email_model->get_emails(2,1)
        );
    }

    public function get_all_emails_test() {
        var_dump(
            $this->email_model->get_all_emails()
        );
    }
}