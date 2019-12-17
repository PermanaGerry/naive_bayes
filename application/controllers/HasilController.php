<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilController extends Public_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->driver('cache');
    $this->load->library('session');
  }

  public function index()
  {
    // $data = $this->session->flashdata('hasil');

    $this->data['hasil'] = $this->session->userdata('hasil');

    print_r($this->data['hasil']);
    exit();

    $this->template->public_render('public/hasil', $this->data);
  }


}