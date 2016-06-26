<?php

/* load the MX_Controller class */
require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {
    function __construct() {
        parent::__construct();

        // $this->load->library('auth/ion_auth');

        // Check authentication
        // $no_redirect = array('auth/login');
        // if ($this->ion_auth->logged_in() == false && ! in_array(uri_string(), $no_redirect)) {
        //     redirect('auth/login');
        // }

        $this->output->enable_profiler(ENVIRONMENT == 'development');
    }

    /**
     * Set subview and load layout
     * @param  string $subview
     */
    public function load_view($subview) {
        $data = array('subview' => $subview );
		$this->load->view('layouts/layout', $data);
    }
}


 // --------------------------------------------------------------------------
 /**
  * Frontend Controller Deals with public pages that dont require authentication
  */
class Frontend_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

}


// --------------------------------------------------------------------------
/**
 * Backend Controller provides a DRY implementation of auth required by access only pages
 */
class Backend_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('auth/ion_auth');

        // Check authentication
        // $no_redirect = array('auth/login');
        // if ($this->ion_auth->logged_in() == false && ! in_array(uri_string(), $no_redirect)) {
        //     redirect('auth/login');
        // }
    }

}
