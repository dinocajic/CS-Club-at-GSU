<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Contact
 *
 * @contributor Dino Cajic (dinocajic@gmail.com)
 *
 */
class Contact extends CI_Controller {

    /**
     * Calls the contact view to display the contact page
     */
    public function index() {
        // Create the header details
        $header['title']       = 'Contact the CS Club at GSU';
        $header['description'] = 'CS Club contact page';

        // Load the header
        $data['header']  = $this->load->view('partials/header', $header, true);

        // @todo load the contact view and store it in $data['content']
        // @todo if we list other contact details, like emails, we'll need to retrieve them from either a database or config file and pass them here.
        $data['content'] = null;

        // Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

        $this->load->view('partials/layout', $data);
    }

    /**
     * Adds the submitted contact message into the database
     */
    public function process() {
        // retrieve all POST variables from contact message form
        // Make sure all required fields are not empty
        // use Email_model to validate email
        // use Contact_model to add the message
        // display success message

        // Create the header details
        $header['title']       = 'Contact the CS Club at GSU';
        $header['description'] = 'CS Club contact page';

        // Load the header
        $data['header']  = $this->load->view('partials/header', $header, true);

        // @todo this is where the success message will be passed
        // @todo use the same contact/contact view to pass the success message to it. You'll have to modify the view to display the message.
        $data['content'] = null;

        // Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

        $this->load->view('partials/layout', $data);
    }
}