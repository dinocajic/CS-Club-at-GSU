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
        $data['content'] = null;

        // Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

        $this->load->view('partials/layout', $data);
    }
}