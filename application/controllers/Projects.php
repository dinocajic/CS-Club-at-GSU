<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Projects
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */

class Projects extends CI_Controller {

    /**
     * Displays the projects page
     */
    public function index() {
        // Create the header details
        $header['title']       = "CS Club's latest projects";
        $header['description'] = 'The CS Club at GSU project list';

        // Load the header
        $data['header']  = $this->load->view('partials/header', $header, true);

        // @todo get all of the latest projects from the Projects_model and pass them to the projects/projects view
        // @todo load the projects view
        $data['content'] = null;

        // Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

        $this->load->view('partials/layout', $data);
    }
}
