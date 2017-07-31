<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
		$this->table = 'app_users';
		$this->layout = 'frontoffice/member/';
		$this->load->model('Model_account','member');
	}

	public function index(){
		$this->app->render('List Member',$this->layout.'index',null,false);
	}

	public function add(){
		$this->app->render('Create Member',$this->layout.'add',null,false);
	}

	public function edit($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
		);
		$this->app->render('Edit Member',$this->layout.'edit',$options,false);
	}

	public function detail($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
		);
		$this->app->render('Detail Member',$this->layout.'detail',$options,false);
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
				$this->session->set_flashdata('success', $total.' Member has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Member are not selected !!');
			}
		}else{
			$action = $this->model_crud->Delete($this->table,$id);
			if($action){
				$this->session->set_flashdata('success', 'Member has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Member are not deleted !!'); 		
			}
		}
		redirect('member');
	}

	public function submit(){
		if($_POST){
			$post = $this->app->get_post($_POST);
			if(!$this->input->post('id')){
				$post["is_member"] = "1";
				$post["expired"] = date("Y-m-d", strtotime("+365 day"));
			}
			$submit = $this->model_crud->Submit($this->table,$post,$this->input->post('id'));
			if($submit){
				if($this->input->post('id')){
					$this->session->set_flashdata('success', 'Member has been udpated !!'); 
				}else{
					$this->session->set_flashdata('success', 'Member has been saved !!'); 
				}
			}else{
				$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
			}
			redirect('member/detail/'.$submit);
		}
		redirect('member');
	}

}