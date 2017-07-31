<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$this->app->setActive('backoffice/setting/user');
		$this->load->model('Model_account','account');
		$this->layout = 'backoffice/setting/user/';
	}

	public function index(){
		$this->app->render('List User',$this->layout.'index',null);
	}

	public function add(){
		$roles = $this->model_crud->GetAll('app_roles',null,null,null,false);
		$this->app->render('Create User',$this->layout.'add',array('roles'=>$roles));
	}

	public function edit($id){
		$options = array(
			'data'=>$this->model_crud->GetById('app_users',$id),
			'menu'=>json_encode($this->account->user_menu($id)),
			'roles'=>$this->model_crud->GetAll('app_roles',null,null,null,false),
			'rolesSelected'=>json_encode($this->account->Roles($id,true))
		);
		$this->app->render('Edit User',$this->layout.'edit',$options);
	}

	public function submit(){
		if($_POST){
			$email_check = $this->account->email_check($this->input->post('id'),$this->input->post('email'));
			$menu = $this->input->post('menu');
			if($email_check){
				$this->session->set_flashdata('warning', ''.$this->input->post('email').' is exists !! ');
				if($this->input->post('id')){
					redirect('backoffice/setting/user/edit/'.$this->input->post('id'));
				}else{
					redirect('backoffice/setting/user/add');
				}
			}else if(count($menu)<=0){
				$this->session->set_flashdata('warning', 'Sorry, Application menu not selected !!');
				if($this->input->post('id')){
					redirect('backoffice/setting/user/edit/'.$this->input->post('id'));
				}else{
					redirect('backoffice/setting/user/add');
				}
			}else{
				$action = $this->account->CreateAccount($_POST,$this->input->post('id'));
				if($action){
					if($this->input->post('id')){
						$this->session->set_flashdata('success', 'User '.$this->input->post('email').' has been updated !!');
					}else{
						$this->session->set_flashdata('success', 'User '.$this->input->post('email').' has been inserted !!'); 
					}
				}else{
					$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
				}
				redirect('backoffice/setting/user/detail/'.$action);
			}
			
		}
		redirect('backoffice/setting/user');
	}

	public function detail($id){
		$options = array(
			'data'=>$this->model_crud->GetById('app_users',$id),
			'menu'=>$this->account->user_menu($id)
		);
		$this->app->render('Detail User',$this->layout.'detail',$options);
	}

	public function delete($id=null){
		if($_POST){
			if($this->input->post('dataDeleted')){
				$data = explode(',',  $this->input->post('dataDeleted'));
				$total = 0;
				foreach($data as $row){
					if($row!='on'){
						$this->model_crud->Delete('app_users',$row);
						$total++;
					}
				}
				$this->session->set_flashdata('success', $total.' User has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'User are not selected !!');
			}
		}else{
			$action = $this->model_crud->Delete('app_users',$id);
			if($action){
				$this->session->set_flashdata('success', 'User has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'User are not deleted !!'); 		
			}
		}
		redirect('backoffice/setting/user');
	}

	
	public function profile(){
		if($_POST){
			$submit = $this->input->post('submit');
			if($submit=='account'){
				$email = $this->account->email_check($this->input->post('id'),$this->input->post('email'));
				if($email){
					$this->session->set_flashdata('warning', ''.$this->input->post('email').' is exists !! ');
				}else{
					$submit = $this->app->get_post($_POST);
					$submit['password'] = md5($this->input->post('password'));
					unset($submit['repassword']);
					unset($submit['submit']);
					$update = $this->model_crud->Submit('app_users',$submit,$this->input->post('id'));
					if($update){
						$this->session->set_flashdata('success', 'Account has been updated !!'); 
					}else{
						$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
					}
				}
			}else{
				$submit = $this->app->get_post($_POST);
				unset($submit['submit']);
				$update = $this->model_crud->Submit('app_users',$submit,$this->input->post('id'));
				if($update){
					$this->session->set_flashdata('success', 'Personal Info has been updated !!'); 
				}else{
					$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
				}
			}
			redirect('backoffice/setting/user/profile');
		}
		$this->app->setActive('backoffice/setting/user/profile');
		$id = $this->session->userdata('ID_USER');
		$data = $this->account->Profile($id);
		$this->app->render('Personal Info',$this->layout.'profile',array('data'=>$data));
	}
}
