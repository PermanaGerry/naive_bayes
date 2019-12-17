<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyebab extends Admin_Controller 
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('admin/daftar_penyebab_model');
    $this->load->library('form_validation');

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

  }

  public function index()
  {
    /* Title Page */
    $this->page_title->push('List Penyebab Penyakit Pada Burung Lovebird');
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $this->data['penyebabs'] = $this->daftar_penyebab_model->getAll();

    /* Load Template */
    $this->template->css_top_render([
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.css'
    ]);
    
    $this->template->js_bottom_render([
        $this->config->item('plugins_dir') . '/datatables/jquery.dataTables.min.js',
        $this->config->item('plugins_dir') . '/datatables/dataTables.bootstrap.min.js',
        $this->config->item('plugins_dir') . '/jquery.validation/jquery.validate.min.js',
        $this->config->item('assets_dir') . '/js/penyebab.js',
    ]);

    $this->template->admin_render('admin/penyebab/index', $this->data);
  }

  public function store()
  {
      $penyebab = $this->daftar_penyebab_model;
      $validation = $this->form_validation;

      if ($this->input->post('submit-form') == 'update-field' )
      {
        $config = array_filter($penyebab->rules(), function($value) {
            return $value['field'] != 'code';
        });
      } else {
        $config = $penyebab->rules();
      }
      
      $validation->set_rules($config);
      if (!$validation->run()) {
          $this->session->set_flashdata('error', 'Gagal disimpan');
      } else {
          $this->input->post('id') ? $penyebab->update() : $penyebab->save();
          $this->session->set_flashdata('success', 'Berhasil disimpan');
      }

      redirect('admin/penyebab');
  }

  public function get($id = NULL) 
  {
    $response = $this->daftar_penyebab_model->getById($id);

    if (!$response) show_404();

    return $this->template->json_render($response);
  }

  public function getCode() 
  {
    $code = $this->input->get('code');

    $response = $this->daftar_penyebab_model->getByCode('p-'.$code);
    
    return $this->template->json_render((!$response) ? true : false);
  }

  public function delete($id = NULL) 
  {
    $response = $this->daftar_penyebab_model->delete($id);

    if (!$response) show_404();

    redirect('admin/penyebab');
  }

}