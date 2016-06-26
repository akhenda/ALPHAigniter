<?php

/* load the MX_Controller class */
require APPPATH."third_party/MX/Controller.php";

class MY_Controller extends MX_Controller {

    protected $data = array();
    function __construct() {
        parent::__construct();

        $this->output->enable_profiler(ENVIRONMENT == 'development');

        $this->data['page_title'] = 'ALPHAigniter';
        $this->data['page_description'] = 'A barebones CI 3 setup';
        $this->data['before_closing_head'] = '';
        $this->data['before_closing_body'] = '';
    }

    /**
     * Set subview and load layout
     * @param  string $subview
     */
    public function load_view($subview, $moredata) {
        // $data = array('subview' => $subview );
        $data = $moredata;
        $data['subview'] = $subview;
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

        $this->load->library(array('auth/ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
		$this->lang->load('auth/auth');

        // Check authentication
        $no_redirect = array('users/login');
        if ($this->ion_auth->logged_in() == false && ! in_array(uri_string(), $no_redirect)) {
            redirect('users/login');
        }
    }

}
