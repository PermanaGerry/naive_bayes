<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenyebabGejala extends Admin_Controller 
{
  public function __construct()
  {
    parent::__construct();

    $this->load->model([
      'admin/daftar_penyakit_model',
      'admin/daftar_penyebab_gejala_model'
    ]);
    $this->load->helper('url');

    /* Breadcrumbs */
    $this->codePenyakit = $this->uri->segment(4);

    $this->data['breadcrumb'] = $this->breadcrumbs->show();
  }

  public function index()
  {

    $penyakitModel = $this->daftar_penyakit_model;
    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;

    $this->data['penyakit']  = $penyakitModel->getByCode($this->codePenyakit);
    $this->data['gejalas']   = $penyebabGejalaModel->getPenyakitGejalaAll($this->codePenyakit);
    $this->data['penyebabs'] = $penyebabGejalaModel->getPenyebabsPenyakitAll($this->codePenyakit);

    /* Title Page */
    $this->page_title->push('List Penyebab dan Penyakit Pada Burung Lovebird');
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    /* Load Template */
    $this->template->css_top_render([
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.css'
    ]);
    
    $this->template->js_bottom_render([
        $this->config->item('plugins_dir') . '/datatables/jquery.dataTables.min.js',
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.min.js',
        $this->config->item('plugins_dir') . '/jquery.validation/jquery.validate.min.js',
        $this->config->item('assets_dir') . '/js/penyakit-gejala.js',
    ]);

    $this->template->admin_render('admin/peyebab_penyakit/index', $this->data);
  }

  //---------------------------- gejala

  public function indexGejala()
  {

    $penyakitModel = $this->daftar_penyakit_model;
    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;

    $this->data['penyakit']   = $penyakitModel->getByCode($this->codePenyakit);
    $this->data['gejalas']    = $penyebabGejalaModel->getGejalaWhereNot($this->codePenyakit);

    /* Title Page */
    $this->page_title->push('Input Gejala');
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    /* Load Template */
    $this->template->css_top_render([
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.css'
    ]);
    
    $this->template->js_bottom_render([
        $this->config->item('plugins_dir') . '/datatables/jquery.dataTables.min.js',
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.min.js',
        $this->config->item('plugins_dir') . '/jquery.validation/jquery.validate.min.js',
        $this->config->item('assets_dir') . '/js/penyakit-gejala.js',
    ]);

    $this->template->admin_render('admin/peyebab_penyakit/gejala/index', $this->data);
    
  }

  public function storeGejala()
  {
    if (!$this->input->post('check_list')) {
      redirect('admin/penyakit/penyebab-gejala/'.$this->codePenyakit);
    }

    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;
    $response = $penyebabGejalaModel->saveGejala($this->codePenyakit);

    if (!$response) show_404();

    redirect('admin/penyakit/penyebab-gejala/'.$this->codePenyakit);
  }

  public function deleteGejala($codePenyakit, $id)
  {

    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;
    $response = $penyebabGejalaModel->deleteGejala($id);

    if (!$response) show_404();

    redirect('admin/penyakit/penyebab-gejala/'.$this->codePenyakit);
  }

  //---------------------------- peyebab

  public function indexPenyebab()
  {

    $penyakitModel = $this->daftar_penyakit_model;
    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;

    $this->data['penyakit']   = $penyakitModel->getByCode($this->codePenyakit);
    $this->data['penyebabs']    = $penyebabGejalaModel->getPenyebabWhereNot($this->codePenyakit);

    /* Title Page */
    $this->page_title->push('Input Penyebab');
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    /* Load Template */
    $this->template->css_top_render([
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.css'
    ]);
    
    $this->template->js_bottom_render([
        $this->config->item('plugins_dir') . '/datatables/jquery.dataTables.min.js',
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.min.js',
        $this->config->item('plugins_dir') . '/jquery.validation/jquery.validate.min.js',
        $this->config->item('assets_dir') . '/js/penyakit-gejala.js',
    ]);

    $this->template->admin_render('admin/peyebab_penyakit/penyebab/index', $this->data);
    
  }

  public function storePenyebab()
  {
    if (!$this->input->post('check_list')) {
      redirect('admin/penyakit/penyebab-gejala/'.$this->codePenyakit);
    }

    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;
    $response = $penyebabGejalaModel->savePenyebab($this->codePenyakit);

    if (!$response) show_404();

    redirect('admin/penyakit/penyebab-gejala/'.$this->codePenyakit);
  }

  public function deletePenyebab($codePenyakit, $id)
  {

    $penyebabGejalaModel = $this->daftar_penyebab_gejala_model;
    $response = $penyebabGejalaModel->deletePenyebab($id);

    if (!$response) show_404();

    redirect('admin/penyakit/penyebab-gejala/'.$this->codePenyakit);
  }

  //---------------------------- test

  public function test()
  {
    print_r(2);
    exit();
  }

}