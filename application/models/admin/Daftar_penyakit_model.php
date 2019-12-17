<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_penyakit_model extends CI_Model
{
  private $_table = "daftar_penyakit";

  public $code;
  public $nama_penyakit;

  public function rules()
  {
    return [
      ['field' => 'code',
      'label' => 'Code',
      'rules' => 'required|is_unique[daftar_penyakit.code]'],
      ['field' => 'penyakit',
      'label' => 'penyakit',
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

    $this->code = 'pt-'.$post["code"];
    $this->nama_penyakit = $post["penyakit"];
    $this->status = 1;

    $this->db->insert($this->_table, $this);

    return $this->db->insert_id();
  }

  public function update()
  {
    $post = $this->input->post();
    
    $this->db->update($this->_table, 
    ['nama_penyakit' => $post["penyakit"]], array('id' => $post['id']));

    return $post['id'];
  }

  public function delete($id)
  {
    // return $this->db->update($this->_table, ['status' => 0,], array('id' => $id));
    return $this->db->delete($this->_table, array('id' => $id));
  }
}