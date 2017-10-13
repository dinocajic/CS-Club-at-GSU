<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_address extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("address_model");
    }

    public function index() {
        //$this->is_valid_state_test();
        //$this->is_valid_street();
        //$this->is_valid_city();
        //$this->is_valid_zip();
        //$this->is_valid_address();
        //$this->does_exist();
        //$this->add_address();
        //$this->get_address_id();
        $this->get_address();
    }

    private function is_valid_state_test() {
        //$state = "GA";
        //$state = "BA";
        //$state = "Georgia";
        $state = "South Carolina";

        var_dump(
            $this->address_model->is_valid_state($state)
        );
    }

    private function is_valid_street() {
        //$street = "123 Test Lane";
        //$street = "Hello 123 Test Lane";
        //$street = "123 Test Ln.";
        //$street = "123 Test Ln. Apt 2";
        $street = "Hello 123 Test Ln. Apt# 2";

        var_dump(
            $this->address_model->is_valid_street($street)
        );
    }

    private function is_valid_city() {
        //$city = "H";
        //$city = "Hello";
        //$city = "Hello There";
        //$city = "St. Simon";
        //$city = "St. Simon Island";
        //$city = "St. Simon Island adfasdfasdf adfa sdf asdf asdfasdf asdfasdf asdf asdf";
        $city = "123 St. Simon Island";

        var_dump(
            $this->address_model->is_valid_city($city)
        );
    }

    private function is_valid_zip() {
        //$zip = 30152;
        //$zip = "30152";
        //$zip = "30152-2498";
        $zip = "301521-2498";

        var_dump(
            $this->address_model->is_valid_zip($zip)
        );
    }

    private function is_valid_address() {
        $street = "345 Something Lane";
        $city   = "Atlanta";
        $state  = "GA";
        $zip    = 30152;

        var_dump(
            $this->address_model->is_valid_address()
        );
    }

    private function does_exist() {
        $street = "123 Something Lane";
        $city   = "Atlanta";
        $state  = "GA";
        $zip    = 30331;

        var_dump(
            $this->address_model->does_exist($street, $city, $state, $zip)
        );
    }

    private function add_address() {
        $street = "123 Something Lane";
        $city   = "Atlanta";
        $state  = "GA";
        $zip    = 30331;

        var_dump(
            $this->address_model->add_address($street, $city, $state, $zip)
        );
    }

    private function get_address_id() {
        //$street = "1233 Something Lane";
        $street = "123 Something Lane";
        $city   = "Atlanta";
        $state  = "GA";
        $zip    = 30331;

        var_dump(
            $this->address_model->get_address_id($street, $city, $state, $zip)
        );
    }

    private function get_address() {
        //$id = 2;
        $id = 1;

        var_dump(
            $this->address_model->get_address($id)
        );
    }
}