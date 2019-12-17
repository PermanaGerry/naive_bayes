<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    private $CI;
    private $js_bottom;
    private $css_top;

    public function __construct()
    {	
        $this->CI =& get_instance();
    }

    public function js_bottom_render($data = NULL)
    {
        return $this->js_bottom($data);
    }

    public function css_top_render($data = NULL)
    {
        return $this->css_top($data);
    }

    public function json_render($response = '')
    {
        return $this->CI->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    public function public_render($content, $data = NULL)
    {
        if( ! $content ) {
            return NULL;
        }
        
        $data['js_bottom'] = $this->js_bottom();
        $data['css_top']   = $this->css_top();
        
        $this->template['header']          = $this->CI->load->view('public/_templates/header', $data, TRUE);
        $this->template['menu']            = $this->CI->load->view('public/_templates/menu', $data, TRUE);
        $this->template['content']         = $this->CI->load->view($content, $data, TRUE);
        $this->template['footer']          = $this->CI->load->view('public/_templates/footer', $data, TRUE);

        return $this->CI->load->view('public/_templates/template', $this->template);
    }

    public function admin_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $data['js_bottom'] = $this->js_bottom();
            $data['css_top']   = $this->css_top();

            $this->template['header']          = $this->CI->load->view('admin/_templates/header', $data, TRUE);
            $this->template['main_header']     = $this->CI->load->view('admin/_templates/main_header', $data, TRUE);
            $this->template['main_sidebar']    = $this->CI->load->view('admin/_templates/main_sidebar', $data, TRUE);
            $this->template['content']         = $this->CI->load->view($content, $data, TRUE);
            $this->template['control_sidebar'] = $this->CI->load->view('admin/_templates/control_sidebar', $data, TRUE);
            $this->template['footer']          = $this->CI->load->view('admin/_templates/footer', $data, TRUE);

            return $this->CI->load->view('admin/_templates/template', $this->template);
        }
	}

    public function auth_render($content, $data = NULL)
    {
        if ( ! $content)
        {
            return NULL;
        }
        else
        {
            $data['js_bottom'] = $this->js_bottom();
            $data['css_top']   = $this->css_top();

            $this->template['header']  = $this->CI->load->view('auth/_templates/header', $data, TRUE);
            $this->template['content'] = $this->CI->load->view($content, $data, TRUE);
            $this->template['footer']  = $this->CI->load->view('auth/_templates/footer', $data, TRUE);

            return $this->CI->load->view('auth/_templates/template', $this->template);
        }
    }

    // -------------------------------------------------------------------
    
    protected function js_bottom($data = NULL)
    {        
        if(is_array($data))
        {
            $this->js_bottom = array_merge($data);
        } else {
            $this->js_bottom[] = $data;
        }

        return array_filter($this->js_bottom, function($value) {
            return ($value != null ) || ($value != '');
        });
    }

    protected function css_top($data = NULL)
    {
        if(is_array($data))
        {
            $this->css_top = array_merge($data);
        } else {
            $this->css_top[] = $data;
        }

        return array_filter($this->css_top, function($value) {
            return ($value != null ) || ($value != '');
        });
    }

}