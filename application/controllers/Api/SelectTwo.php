<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SelectTwo extends CI_Controller{

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
	}

	public function timezone(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('app_timezone',20,0,$q,false,array('name','asc'));
		header("Content-Type: application/json", true);
		echo json_encode(json_select2($response,false));
	}

	public function currency(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('app_currency',20,0,$q,false,array('name','asc'));
		header("Content-Type: application/json", true);
		echo json_encode(json_select2($response,false));
	}

	public function dateformat(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('app_dateformat',20,0,$q,false,array('name','asc'));
		header("Content-Type: application/json", true);
		echo json_encode(json_select2($response,false));
	}

	public function printer(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('app_printers',20,0,$q,false,array('name','asc'));
		header("Content-Type: application/json", true);
		echo json_encode(json_select2($response,false));
	}

	public function countries(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('app_countries',20,0,$q,false,array('name','asc'));
		header("Content-Type: application/json", true);
		echo json_encode(json_select2($response,true));
	}

	public function menu(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('en_menu',20,0,$q,false,array('menu_name','asc'));
		$data = array();
		foreach($response as $row){
			$data[] = array(
				'id'=>$row->id_main,
				'text'=>$row->menu_name
			);
		}
		header("Content-Type: application/json", true);
		echo json_encode($data);
	}

	public function menu_category(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('en_categories',20,0,$q,false,array('category_name','asc'));
		$data = array();
		foreach($response as $row){
			$data[] = array(
				'id'=>$row->id_main,
				'text'=>$row->category_name
			);
		}
		header("Content-Type: application/json", true);
		echo json_encode($data);
	}

	public function supplier(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('en_suppliers',20,0,$q,false,array('supplier_name','asc'));
		$data = array();
		foreach($response as $row){
			$data[] = array(
				'id'=>$row->id_main,
				'text'=>$row->supplier_name
			);
		}
		header("Content-Type: application/json", true);
		echo json_encode($data);
	}

	public function bank(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('en_banks',20,0,$q,false,array('bank_name','asc'));
		$data = array();
		foreach($response as $row){
			$data[] = array(
				'id'=>$row->id_main,
				'text'=>$row->bank_name
			);
		}
		header("Content-Type: application/json", true);
		echo json_encode($data);
	}

	public function creditcard(){
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('en_creditcard',20,0,$q,false,array('credit_name','asc'));
		$data = array();
		foreach($response as $row){
			$data[] = array(
				'id'=>$row->id_main,
				'text'=>$row->credit_name
			);
		}
		header("Content-Type: application/json", true);
		echo json_encode($data);
	}

	public function user(){
		$id_user = $this->session->userdata('ID_USER');
		$q = $this->input->get_post('q');
		$response = $this->model_crud->GetAll('app_users',20,0,$q,false,array('fullname','asc'));
		$data = array();
		foreach($response as $row){
			if($id_user!=$row->id_main){
				$data[] = array(
					'id'=>$row->id_main,
					'text'=>$row->fullname
				);
			}
		}
		header("Content-Type: application/json", true);
		echo json_encode($data);
	}

	
}