<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * KuNaon Point Of Sales
 *
 * @author KuNaon Team - kunaon.studio@gmail.com
 *
 */

// Copyright (C) 2017 KuNaon Team - kunaon.studio@gmail.com
//
// This file is part of KuNaon Point Of Sales software library.
//
// KuNaon Point Of Sales is free software: you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// KuNaon Point Of Sales is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// See LICENSE.TXT file for more information.

class App {

    private $title;
    private $layout;
    private $active;

    public function __Construct() {
        $this->CI = get_instance();
        $this->_class = $this->CI->router->fetch_class();
        $this->_method = $this->CI->router->fetch_method();
    }

    public function getLayout() {
        return $this->layout;
    }

    public function setLayout($var) {
        $this->layout = $var;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($var) {
        $this->title = $var;
    }

     public function getActive() {
        return $this->active;
    }

    public function setActive($var) {
        $this->active = $var;
    }


    public function auth(){
        if($this->CI->session->userdata('IS_LOGIN')==true){
            if($this->_class!='api'){
                $CONTROLLER = $this->CI->session->userdata('CONTROLLER');
                $i = 0;
                foreach($CONTROLLER as $c){
                    if($this->_class==$c->controller){
                        $i++;
                    }
                }
                if($i==0){
                    redirect('error');
                }
            }
        }else{
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $this->CI->session->set_flashdata('callback', $actual_link); 
            redirect('account/login');
        }
    }

    public function render($title = "Super Cafe",$render, $data = null,$backkoffice = true) {
        $this->setTitle($title);
        $view = $this->CI->load->view('public/'.$render, $data, true);
        $this->setLayout($view);
        if($backkoffice){
            $this->CI->load->view('templates/backoffice/content', null);
        }else{
            $this->CI->load->view('templates/frontoffice/content', null); 
        }
    }

    public function generateBreadcrumb() {
        $ci = &get_instance();
        $i = 1;
        $uri = $ci->uri->segment($i);
        $link = '
        <ol class="breadcrumb"><li><a href="'.base_url().'"><i class="fa fa-dashboard"></i> Home</a></li>';

        while ($uri != '') {
            $prep_link = '';
            for ($j = 1; $j <= $i; $j++) {
                $prep_link .= $ci->uri->segment($j) . '/';
            }

            if ($ci->uri->segment($i + 1) == '') {
                $link .= '<li class="active">';
                $link .= ucwords($ci->uri->segment($i)) . '</li> ';
            } else {
                $link .= '<li><a href="#">';
                $link .= ucwords($ci->uri->segment($i)) . '</a><span class="divider"></span></li> ';
            }

            $i++;
            $uri = $ci->uri->segment($i);
        }
        $link .= '</ol>';
        return $link;
    }

    public function script(){
        $current = $this->CI->router->fetch_class();
        if(file_exists('assets/scripts/'.$current.'.js')){
            return "<script type='text/javascript' src='".base_url()."assets/scripts/".$current.".js'></script>";
        }
        return false;
    }

    public function get_post($post){
        $data = array();
        foreach ($post as $key => $value) {
            $data[$key] = $value;
        }
        return $data;
    }

    public function reset_search($name){
        $this->CI->session->unset_userdata($name);
    } 

    public function search_handler($name,$searchterm){
        if($searchterm){
            $this->CI->session->set_userdata($name, $searchterm);
            return $searchterm;
        }
        else if($this->CI->session->userdata($name)){
            $searchterm = $this->CI->session->userdata($name);
            return $searchterm;
        }
        else{
            $searchterm ="";
            return $searchterm;
        }
    }

    public function pagination_config($url, $uri_segment, $totalRow, $per_page) {
        $config = array();
        $config["base_url"] = base_url($url);
        $config["total_rows"] = $totalRow;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $uri_segment;
        $config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        return $config;
    }

   
}
