<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
		$this->load->model('Model_account','account');
	}


	public function login(){
		if($_POST){
			$user = $this->account->Auth($this->input->post('email'),$this->input->post('password'));
			if($user){
				$allow_backoffice = $this->account->AllowPages($user->id,'0');
				$allow_frontoffice = $this->account->AllowPages($user->id,'1');
				$data = array(
					'USER'=>$user,
					'ID_USER'=>$user->id,
					'EMAIL'=>$user->email,
					'IS_LOGIN'=>true,
					'ALLOW_BACKOFFICE'=>$allow_backoffice,
					'ALLOW_FRONTOFFICE'=>$allow_frontoffice,
					'CONTROLLER'=>$this->account->Controller($user->id),
					'ROLES'=>$this->account->Roles($user->id)
				);
				if($user->actived=='1'){
					$this->session->set_userdata($data);
					$this->model_crud->Submit('app_users',array(
						'login_at'=>date("Y-m-d H:i:s"),
						'logout_at'=>null
					),$this->session->userdata('ID_USER'));
					if($allow_frontoffice==false && $allow_backoffice==true){
						redirect('backoffice/dashboard');
					}else{
						redirect('welcome');
					}
				}else{
					redirect('auth/activation/'.$user->id);
				}
			}else{
				$this->session->set_flashdata('login_failed', 'Invalid login, The email or password is incorrect.'); 
				redirect('account/login');
			}
		}
		$this->load->view('public/account/login');
	}

	public function logout(){
		if($this->session->userdata('ID_USER')){
			$this->model_crud->Submit('app_users',array('logout_at'=>date("Y-m-d H:i:s")),$this->session->userdata('ID_USER'));
		}
		$this->session->sess_destroy();
		$data = array(
			'USER'=>null,
			'ID_USER'=>null,
			'EMAIL'=>null,
			'IS_LOGIN'=>false,
			'ALLOW_BACKOFFICE'=>null,
			'ALLOW_FRONTOFFICE'=>null,
			'CONTROLLER'=>null,
			'ROLES'=>null
		);
		$this->session->set_userdata($data);
		redirect('account/login');
	}

	

	public function forgot()
	{
		if($_POST){
			$user = $this->account->Auth($this->input->post('email'));
			if($user){
				$this->account->SendRequest($this->input->post('email'));
				$this->session->set_flashdata('successed', 'ok'); 
			}else{
				$this->session->set_flashdata('login_failed', 'Invalid Email, The email are not registered in system. Please contact you adminstrator'); 
			}
		}
		$this->load->view('public/account/forgot');
	}

	
	
}
