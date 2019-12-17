<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model([
            'admin/dashboard_model',
            'admin/daftar_penyakit_model',
            'admin/daftar_penyebab_model',
            'admin/daftar_gejala_model'
        ]);
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Title Page */
            $this->page_title->push('Mendiagnosa penyakit burung lovebird');
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();
            
            /* Data */
            $this->data['count_users']             = $this->dashboard_model->get_count_record('users');
            $this->data['count_penyakit']          = $this->daftar_penyakit_model->get_count_record();
            $this->data['count_penyebab']          = $this->daftar_penyebab_model->get_count_record();
            $this->data['count_gejala']            = $this->daftar_gejala_model->get_count_record();

            /* Load Template */
            $this->template->admin_render('admin/dashboard/index', $this->data);
        }
	}
}
