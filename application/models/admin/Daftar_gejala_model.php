<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_gejala_model extends CI_Model
{
        private $_table = "daftar_gejala";
        private $CI;

        public $code;
        public $nama_gejala;

        public function __construct()
        {
                parent::__construct();
                
                $this->CI =& get_instance();

                $this->CI->load->model([
                        'admin/daftar_penyebab_gejala_model'
                ]);
        }

        public function rules()
        {
                return [
                        ['field' => 'code',
                        'label' => 'Code',
                        'rules' => 'required|is_unique[daftar_gejala.code]'],
                        ['field' => 'gejala',
                        'label' => 'Gejala',
                        'rules' => 'required'],
                ];
        }
        
        public function getAll()
        {
                return $this->db->get_where($this->_table, ['status !=' => 0])->result();
        }

        public function get_count_record()
        {
                return count($this->getAll());
        }

        public function getWhereNot($param, $data = NULL)
        {
                return $this->db
                ->select('*')
                ->from($this->_table)
                ->where_not_in($param, $data)
                ->get()
                ->result();
        }

        public function getById($id)
        {
               return $this->db->get_where($this->_table, ["id" => $id])->row();
        }

        public function getByCode($code)
        {
                return $this->db->get_where($this->_table, ["code" => $code])->row();
        }

        public function save()
        {
                $post = $this->input->post();

                $this->code = 'g-'.$post["code"];
                $this->nama_gejala = $post["gejala"];
                $this->status = 1;

                $this->db->insert($this->_table, $this);
        }

        public function update()
        {
                $post = $this->input->post();
                $this->db->update($this->_table,
                ['nama_gejala' => $post["gejala"]], array('id' => $post['id']));
        }

        public function delete($id)
        {
                $response = $this->deletePenyebabGejala($id);
                
                if( ! $response) show_404();

                return $this->db->delete($this->_table, array('id' => $id));
        }

        public function deletePenyebabGejala($id)
        {
                $data = $this->getById($id);
                return $this->CI->daftar_penyebab_gejala_model->deleteRelasi('daftar_penyakit_gejala', ['code_gejala' => $data->code]);
        }
}