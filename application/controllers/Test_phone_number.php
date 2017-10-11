<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_phone_number extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model("phone_number_model");
    }

    public function index() {
        //$this->is_valid_test();
        //$this->does_exist_test();
        //$this->add_phone_number_test();
        //$this->get_phone_number_id_test();
        //$this->get_phone_number_test();
        $this->get_phone_number_with_type_test();
    }

    private function is_valid_test() {
        //$num = "5554443333";
        //$num = "55544433331";
        $num = "15554443333";

        var_dump(
            $this->phone_number_model->is_valid($num)
        );
    }

    private function does_exist_test() {
        $num = "5554443333";

        var_dump(
            $this->phone_number_model->does_exist($num)
        );
    }

    private function add_phone_number_test() {
        $num = "5554443333";

        var_dump(
            $this->phone_number_model->add_phone_number($num)
        );
    }

    private function get_phone_number_id_test() {
        $num = "5554443333";

        var_dump(
            $this->phone_number_model->get_phone_number_id($num)
        );
    }

    private function get_phone_number_test() {
        //$num_id = 2;
        $num_id = 1;

        var_dump(
            $this->phone_number_model->get_phone_number($num_id)
        );
    }

    private function get_phone_number_with_type_test() {
        //$num_id = 2;
        $num_id = 1;

        var_dump(
            $this->phone_number_model->get_phone_number_with_type($num_id)
        );
    }
}