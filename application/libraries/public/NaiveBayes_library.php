<?php defined('BASEPATH') OR exit('No direct script access allowed');

class NaiveBayes_library
{
  
  protected $gejalaPenyakit;
  protected $penyakit;
  protected $kemungkinanKerusakan = 2;
  protected $response;
  
  public function __construct()
  {
    
  }

  public function kemungkinanKerusakan()
  {
    return $this->kemungkinanKerusakan;
  }

  public function gejalaPenyakit($data = null)
  {
    if($data)
    {
      $this->gejalaPenyakit = $data;
    }

    return $this;
  }

  public function listPenyakit($data = null)
  {
    if($data)
    {
      $this->penyakit = $data;
    }
    
    return $this;
  }

  public function probabilitas()
  {
    return $this->probabilitasCount();
  }

  public function beyes()
  {
    return $this->countBeyes();
  }

  public function persentase()
  {
    return $this->persentaseBeyes();
  }

  public function render()
  {
    
    $response['gejala_penyakit'] = $response['penyakit'] = $response['kemungkinan_kerusakan'] = $response['response'] = array();

    if ($this->gejalaPenyakit)
    {
      $response['gejala_penyakit'] = array_merge($response['gejala_penyakit'], $this->gejalaPenyakit);
    }

    if ($this->penyakit)
    {
      $response['penyakit'] = array_merge($response['penyakit'], $this->penyakit);
    }

    if ($this->kemungkinanKerusakan)
    {
      $response['kemungkinan_kerusakan'] = $this->kemungkinanKerusakan;
    }

    if ($this->response)
    {
      $response['response'] = array_merge($response['response'], $this->response);
    }

    return $response;
  }

  // ---------- menghitung persentase beyes

  protected function persentaseBeyes()
  {
    $data = $this->response;

    foreach($data['beyes'] as $key => $value)
    {
      $response[] = $value['total'];
    }

    $this->response['persentase'] = $this->countPersentaseBayes($data, array_sum($response));

    return $this;

  }

  protected function countPersentaseBayes($data, $total)
  {

    foreach($data['beyes'] as $key => $value)
    {
      $response[$key] = ($value['total'] / $total) *  100;
    }

    return $response;
  }

  // ----- menghitung beyes

  protected function countBeyes()
  {
    $data = $this->response;

    foreach($data['probabilitas'] as $key => $value)
    {
      $this->response['beyes'][$key]['k'] = $this->countBeyesK($value['g'], $data['probabilitas'][$key]['k']);
      $this->response['beyes'][$key]['total'] = array_sum($this->response['beyes'][$key]['k']);
    }

    return $this;
  }

  protected function countBeyesK($data, $k)
  {
  
    $no = 1;
    foreach($data as $key => $value)
    {
      if ($value)
      {
        $response[] = ($value * $k) / ($value * $k) + ($value * $k);
      } else {
        $response[] = 0;
      }
    }

    return $response;

  }

  // ---- menghitung probilitas

  protected function probabilitasCount()
  {
    $penyakit = $this->penyakit;
    $gejalaPenyakit = $this->gejalaPenyakit;

    $no = 1;
    foreach($penyakit as $value => $key)
    {
      $this->response['probabilitas'][$value]['k'] = $this->countK($key, $gejalaPenyakit);

      $this->response['probabilitas'][$value]['g'] = $this->countG($key, $gejalaPenyakit, count($penyakit));

    }

    return $this;

  }

  protected function countG($data, $gejalaPenyakit, $jumlahPenyakit)
  {
    if(!is_array($data)) return;
    
    $no = 1;
    foreach($data as $key => $value)
    {
      // $response[] = in_array($value->code_gejala, $gejalaPenyakit) ? 1 / $this->kemungkinanKerusakan : 
      //   0 / $this->kemungkinanKerusakan;

      $response[] = in_array($value->code_gejala, $gejalaPenyakit) ? 1 / $this->kemungkinanKerusakan : 
        (0 + 1) / ($this->kemungkinanKerusakan + $jumlahPenyakit);

    }

    return $response;
  }

  protected function countK($data, $gejalaPenyakit)
  {
    
    return count(array_filter($data, function($value) use ($gejalaPenyakit) {
      return in_array($value->code_gejala, $gejalaPenyakit);
    })) / count($data);

  }

}