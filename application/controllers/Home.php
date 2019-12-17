<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/daftar_penyebab_gejala_model');
        $this->load->library(['public/naivebayes_library', 'session']);
    }

	public function index()
	{
        $this->data['gejalas'] = $this->daftar_penyebab_gejala_model->getGejalaAll();

        /* Title Page */
        $this->page_title->push('Mendiagnosa penyakit burung lovebird');

		$this->template->public_render('public/home', $this->data);
    }
    
    public function hitung()
    {
        $inputGejala = $this->input->post('gejala');
        
        if (! $inputGejala) {
            redirect('home');
        }
        

        $libBayes    = $this->naivebayes_library->gejalaPenyakit();
        $inputGejala = $this->input->post('gejala');

        // mengangbil data dari tabel daftar_penyakit_gejala
        $responseGetPenyakit = $this->getIdPenyakit($this->daftar_penyebab_gejala_model->getPenyakitForGejala($inputGejala), 'code_penyakit');
        // mencari data dari gejala dan penyebab di tabel daftar_penyakit_gejala
        $responseGetGejala   = $this->groupPenyakit($this->daftar_penyebab_gejala_model->getPenyakitGejalaAll($responseGetPenyakit));
        // library untuk perhitungan beyes
        $response = $libBayes->gejalaPenyakit($inputGejala)
                    ->listPenyakit($responseGetGejala)
                    ->probabilitas()
                    ->beyes()
                    ->persentase()
                    ->render();
        
        // menyimpan data sementara di session
        // $this->session->set_flashdata('hasil', $response);
        
        $this->session->set_userdata('hasil', $response);
        
        redirect('/hasil');
    }

    protected function groupPenyakit($data = NULL)
    {
        if(!$data) return;

        $response = array();
        foreach ($data as $value => $key)
        {
            $response[$key->code_penyakit][] = $key;
        }

        return $response;
    }

    protected function getIdPenyakit($data = NULL, $keySearch)
    {
        if (!$data) return; 

        $response = array();
        foreach($data as $value => $keys)
        {
            $response[] = $keys->$keySearch;
        }

        return $response;
    }
}
