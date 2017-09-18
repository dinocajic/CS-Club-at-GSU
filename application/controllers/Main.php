<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Main
 */
class Main extends CI_Controller {

	/**
     * @author Dino Cajic
     * @email  dinocajic@gmail.com
     *
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
     *      http://example.com/welcome
     *  - or -
     *      http://example.com/welcome/index
     *
     * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    // Create the header details
        $header['title']       = 'CS Club at GSU';
        $header['description'] = '';

        // Load the header
	    $data['header']  = $this->load->view('partials/header', $header, true);

		// Load all of partials for the main page into the index/index view
		$index['main_slider']     = $this->load->view('index/main-slider',     null, true);
		$index['about']           = $this->load->view('index/about',           null, true);
		$index['highlights']      = $this->load->view('index/highlights',      null, true);
		$index['latest_projects'] = $this->load->view('index/latest-projects', null, true);
		$index['learning']        = $this->load->view('index/learning',        null, true);
		$index['our_works']       = $this->load->view('index/our-works',       null, true);
		$index['testimonials']    = $this->load->view('index/testimonials',    null, true);
		$index['contact']         = $this->load->view('index/contact',         null, true);

		// Load the content that'll go into the layout page
		$data['content'] = $this->load->view('index/index', $index, true);

		// Load the footer
        $data['footer']  = $this->load->view('partials/footer', null, true);

		$this->load->view('partials/layout', $data);
	}
}
