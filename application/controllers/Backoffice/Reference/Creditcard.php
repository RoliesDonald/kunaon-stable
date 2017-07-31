<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Creditcard extends CI_Controller {

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
		$this->app->auth();
		$this->app->setActive('backoffice/reference/creditcard');
		$this->layout = 'backoffice/reference/creditcard/';
		$this->table = 'en_creditcard';
	}

	public function index(){
		$this->app->render('List Credit Card',$this->layout.'index',null);
	}

	public function add(){
		$this->app->render('Create Credit Card',$this->layout.'add',null);
	}

	public function edit($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
		);
		$this->app->render('Edit Credit Card',$this->layout.'edit',$options);
	}

	public function detail($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
		);
		$this->app->render('Detail Credit Card',$this->layout.'detail',$options);
	}

	public function delete($id=null){
		if($_POST){
			if($this->input->post('dataDeleted')){
				$data = explode(',',  $this->input->post('dataDeleted'));
				$total = 0;
				foreach($data as $row){
					if($row!='on'){
						$this->model_crud->Delete($this->table,$row);
						$total++;
					}
				}
				$this->session->set_flashdata('success', $total.' Credit Card has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Credit Card are not selected !!');
			}
		}else{
			$action = $this->model_crud->Delete($this->table,$id);
			if($action){
				$this->session->set_flashdata('success', 'Credit Card has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Credit Card are not deleted !!'); 		
			}
		}
		redirect('backoffice/reference/creditcard');
	}

	public function submit(){
		if($_POST){
			$post = $this->app->get_post($_POST);
			$submit = $this->model_crud->Submit($this->table,$post,$this->input->post('id'));
			if($submit){
				if($this->input->post('id')){
					$this->session->set_flashdata('success', 'Credit Card has been updated !!'); 
				}else{
					$this->session->set_flashdata('success', 'Credit Card has been inserted !!'); 
				}
			}else{
				$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
			}
			redirect('backoffice/reference/creditcard/detail/'.$submit);
		}
		redirect('backoffice/reference/creditcard');
	}

}