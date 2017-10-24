<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_role extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model("roles_model");
    }

    public function index() {
        //$this->does_role_exist();
        //$this->get_role();
        //$this->get_role_id();
        //$this->add_role();
        $this->get_all_roles();
    }

    public function does_role_exist() {
        $role = 'Admin';

        var_dump(
            $this->roles_model->does_exist($role)
        );
    }

    public function get_role() {
        $role_id = 1;

        var_dump(
            $this->roles_model->get_role($role_id)
        );
    }

    public function get_role_id() {
        $role = 'admin';

        var_dump(
            $this->roles_model->get_role_id($role)
        );
    }

    public function add_role() {
        $role = 'customer';

        var_dump(
            $this->roles_model->add_role($role)
        );
    }

    public function get_all_roles() {
        var_dump(
            $this->roles_model->get_all_roles()
        );
    }

}