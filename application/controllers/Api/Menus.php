<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

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

	public function __Construct(){
		parent::__Construct();
		$this->app->auth(true);
		$this->load->model('Model_menu','menu');
		$this->load->model('Model_order','order');
	}

	public function index(){
		$value = $this->input->get_post('val');
		$category = $this->input->get_post('cat');
		$menu = $this->menu->GetMenu($value,$category);
		$html = $this->load->view('public/frontoffice/menu/list',array('data'=>$menu),true);
		header("Content-Type: text/html", true);
		echo $html;
	}

	public function reset_table($transaction_number,$table_id){
		$response = $this->order->RemoveTable($transaction_number,$table_id);
		header("Content-Type: application/json", true);
		echo json_encode($response);
	}
	

}