<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_penyebab_gejala_model extends CI_Model
{
  
  private $CI;
  // table gejala penyakit
  private $_table = "daftar_penyakit_gejala";
  // table penyebab penyakit
  private $_table1 = "daftar_penyakit_penyebab";
  // gejala
  private $_table_daftar_gejala = "daftar_gejala";
  // penyebab
  private $_table_daftar_penyebab = "daftar_penyebab";
  // penyakit
  private $_table_daftar_penyakit = "daftar_penyakit";

  public function __construct()
  {
    parent::__construct();
    
    $this->CI =& get_instance();

    $this->CI->load->model([
      'admin/daftar_gejala_model',
      'admin/daftar_penyebab_model',
    ]);
  }

  public function getGejalaAll()
  {
    return $this->CI->daftar_gejala_model->getAll();
  }

  public function getPenyakitForGejala($codePenyakit)
  {
    return $this->db->select('*')
      ->from($this->_table)
      ->where_in('code_gejala', $codePenyakit)
      ->get()
      ->result();
  }

  public function getPenyakitGejala($codePenyakit)
  {
    return $this->db->get_where($this->_table, ['code_penyakit' => $codePenyakit])->result();
  }

  public function deleteRelasi($table, $code)
  {
    return $this->db->delete($table, $code);
  }

  //------------------------------- gejala

  public function getPenyakitGejalaAllGroupBY($codePenyakit = NULL, $groupBy)
  {
    if (is_array($codePenyakit))
    {
      $this->db->where_in('m_t.code_penyakit', $codePenyakit);
    } else {
      $this->db->where('m_t.code_penyakit', $codePenyakit);
    }

    return $this->db->select('m_dg.id as id_gejala, m_dg.code, m_dg.nama_gejala, m_t.id, m_t.code_gejala, m_t.code_penyakit,
    m_dp.nama_penyakit, m_dp.id as id_penyakit, m_dp.code')
    ->from($this->_table . ' as m_t')
    ->join($this->_table_daftar_penyakit . ' as m_dp', 'm_dp.code = m_t.code_penyakit')
    ->join($this->_table_daftar_gejala . ' as m_dg', 'm_dg.code = m_t.code_gejala')
    ->group_by('m_t.' . $groupBy)
    ->get()
    ->result();
  }

  public function getPenyakitGejalaAll($codePenyakit = NULL)
  {
    if (!$codePenyakit) return;
    
    if (is_array($codePenyakit))
    {
      $this->db->where_in('m_t.code_penyakit', $codePenyakit);
    } else {
      $this->db->where('m_t.code_penyakit', $codePenyakit);
    }

    return $this->db->select('m_dg.id as id_gejala, m_dg.code, m_dg.nama_gejala, m_t.id, m_t.code_gejala, m_t.code_penyakit,
    m_dp.nama_penyakit, m_dp.id as id_penyakit, m_dp.code')
    ->from($this->_table . ' as m_t')
    ->join($this->_table_daftar_penyakit . ' as m_dp', 'm_dp.code = m_t.code_penyakit')
    ->join($this->_table_daftar_gejala . ' as m_dg', 'm_dg.code = m_t.code_gejala')
    ->get()
    ->result();
  }

  public function getGejalaWhereNot($codePenyakit)
  {
    $data = $this->getPenyakitGejala($codePenyakit);

    $result = array();
    foreach($data as $key)
    {
      $result[] = $key->code_gejala;
    }

    return $this->CI->daftar_gejala_model->getWhereNot('code', $result ? $result : NULL);
  }

  public function saveGejala($codePenyakit)
  {
    $post = $this->input->post();

    $result = [];
    foreach($post['check_list'] as $gejala => $valueGejala)
    {
      $result[] = array(
        'code_penyakit' => $codePenyakit, 
        'code_gejala' => $valueGejala);
    }

    return $this->db->insert_batch($this->_table, $result);
  }

  public function deleteGejala($id)
  {
    // return $this->db->update($this->_table, ['status' => 0,], array('id' => $id));
    return $this->db->delete($this->_table, array('id' => $id));
  }

  //-------------------------------- penyebab

  public function getPenyebabsPenyakitAll($codePenyakit)
  {
    return $this->db->select('m_dp.id as id_penyebab, m_dp.code, m_dp.nama_penyebab, m_t.id, m_t.code_penyebab, m_t.code_penyakit')
    ->from($this->_table1 . ' as m_t')
    ->join($this->_table_daftar_penyebab . ' as m_dp', 'm_dp.code = m_t.code_penyebab')
    ->where('m_t.code_penyakit', $codePenyakit)
    ->get()
    ->result();
  }

  public function getPenyebabWhereNot($codePenyakit)
  {
    $data = $this->getPenyakitGejala($codePenyakit);

    $result = array();
    foreach($data as $key)
    {
      $result[] = $key->code_gejala;
    }

    return $this->CI->daftar_penyebab_model->getWhereNot('code', $result ? $result : NULL);
  }
  
  public function savePenyebab($codePenyakit)
  {
    $post = $this->input->post();

    $result = [];
    foreach($post['check_list'] as $penyebab => $valuePenyebab)
    {
      $result[] = array(
        'code_penyakit' => $codePenyakit, 
        'code_penyebab' => $valuePenyebab);
    }

    return $this->db->insert_batch($this->_table1, $result);
  }

  public function deletePenyebab($id)
  {
    // return $this->db->update($this->_table, ['status' => 0,], array('id' => $id));
    return $this->db->delete($this->_table1, array('id' => $id));
  }

}