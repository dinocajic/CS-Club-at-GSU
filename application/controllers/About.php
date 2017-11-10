<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class About
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 *
 */
class About extends CI_Controller {

    /**
     * Calls the about view to display the about page
     */
    public function index() {
        // Create the header details
        $header['title']       = 'About the CS Club at GSU';
        $header['description'] = 'The Computer Science Club about page';

        // Load the header
        $data['header']  = $this->load->view('partials/header', $header, true);

        // @todo load the about view and store it in $data['content']
        $baseOfficer = 1;
        $numberOfCurrentOfficers = 2;

        $this->load->model('User_model');
        $this->load->model('Roles_model');

        while($baseOfficer <= $numberOfCurrentOfficers){
          $users['user'][$baseOfficer] = $this->User_model->get_user_details($baseOfficer);
          $users['user'][$baseOfficer]['role'] = $this->Roles_model->get_role($baseOfficer);
          $baseOfficer++;
        }


        $data['content'] = $this->load->view('about/about',$users,true);

        // Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

//        for($i =1; $i <= 2; $i++){
  //        print_r($users['user'][$i]);
  //      }
       $this->load->view('partials/layout', $data);
    }
}
