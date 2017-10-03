<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Testimonials
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 */
class Testimonials extends CI_Controller {

    /**
     * Displays the testimonials page
     */
    public function index() {
        // Create the header details
        $header['title']       = 'Testimonials';
        $header['description'] = 'What people say about the Computer Science Club at Georgia State University';

        // Load the header
        $data['header']  = $this->load->view('partials/header', $header, true);

        // @todo retrieve content from the database using the testimonials model
        // @todo load the testimonials view and store it in $data['content']
        $data['content'] = null;

        // Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

        $this->load->view('partials/layout', $data);
    }
}