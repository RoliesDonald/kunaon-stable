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

	public function __Construct()
	{
		parent::__Construct();
		$this->app->auth();
		$this->app->setActive('backoffice/setting/user');
		$this->load->model('Model_account','account');
		$this->layout = 'frontoffice/user/';

	}

	
	public function profile(){
		if($_POST){
			$submit = $this->input->post('submit');
			if($submit=='account'){
				$email = $this->account->email_check($this->input->post('id'),$this->input->post('email'));
				if($email){
					$this->session->set_flashdata('warning', '<strong>'.$this->input->post('email').' email was exists !! </strong>');
				}else{
					$submit = $this->app->get_post($_POST);
					$submit['password'] = md5($this->input->post('password'));
					unset($submit['repassword']);
					unset($submit['submit']);
					$update = $this->model_crud->Submit('app_users',$submit,$this->input->post('id'));
					if($update){
						$this->session->set_flashdata('success', 'Account has been updated !!'); 
					}else{
						$this->session->set_flashdata('danger', 'System Error !!'); 
					}
				}
			}else{
				$submit = $this->app->get_post($_POST);
				unset($submit['submit']);
				$update = $this->model_crud->Submit('app_users',$submit,$this->input->post('id'));
				if($update){
					$this->session->set_flashdata('success', 'Personal profile has been updated !!'); 
				}else{
					$this->session->set_flashdata('danger', 'System Error !!'); 
				}
			}
			redirect('user/profile');
		}
		$id = $this->session->userdata('ID_USER');
		$data = $this->account->Profile($id);
		$this->app->render('Personal Info',$this->layout.'profile',array('data'=>$data),false);
	}
}
