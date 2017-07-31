<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

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
		$this->app->setActive('frontoffice/messages');
		$this->layout = 'frontoffice/messages/';
		$this->load->model('Model_messages','model');
		$this->table = 'app_messages';
	}

	public function index(){
		$status = $this->model->GetStatus();
		$this->app->render('Messages',$this->layout.'index',array('status'=>$status),false);
	}

	public function add(){
		$status = $this->model->GetStatus();
		$this->app->render('Messages - Create',$this->layout.'add',array('status'=>$status),false);
	}

	public function detail($id){
		redirect('messages/read/'.$id);
	}

	public function edit($id){
		$data = $this->model->Detail($id);
		$status = $this->model->GetStatus();
		$this->app->render('Messages - Edit',$this->layout.'edit',array('data'=>$data,'status'=>$status),false);
	}

	public function read($id){
		$this->model->Read($id);
		$data = $this->model->Detail($id);
		$status = $this->model->GetStatus();
		$this->app->render('Messages - Read',$this->layout.'read',array('data'=>$data,'status'=>$status),false);
	}

	public function forward($id = null){
		if($_POST){
			$post = $this->app->get_post($_POST);
			$send = $this->model->Send($post);
			if($send){
				$this->session->set_flashdata('success',' Messages has been sent !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Messages has not sent!!');
			}
			redirect('messages/read/'.$this->input->post('id'));
		}
		$data = $this->model->Detail($id);
		$this->app->render('Messages - Forward',$this->layout.'forward',array('data'=>$data));
	}

	public function reply($id = null){
		if($_POST){
			$post = $this->app->get_post($_POST);
			$send = $this->model->Send($post);
			if($send){
				$this->session->set_flashdata('success',' Messages has been sent !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Messages has not sent!!');
			}
			redirect('messages/read/'.$this->input->post('id'));
		}
		$data = $this->model->Detail($id);
		$this->app->render('Messages - Reply',$this->layout.'reply',array('data'=>$data),false);
	}

	public function send(){
		if($_POST){
			$send = $this->model->Send($_POST);
			if($send){
				$this->session->set_flashdata('success',' Messages has been sent !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Messages has not  sent!!');
			}
		}
		redirect('messages');
	}

	public function delete($id=null){
		if($_POST){
			if($this->input->post('dataDeleted')){
				$data = explode(',',  $this->input->post('dataDeleted'));
				$total = 0;
				foreach($data as $row){
					if($row!='on'){
						if($this->input->post('deleted')=='true'){
							$this->model_crud->Delete($this->table,$row);
						}else{
							$this->model->Trash($row);
						}
						$total++;
					}
				}
				$this->session->set_flashdata('success', $total.' Messages has been moved to trash !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Messages has not moved to trash !!');
			}
		}else{
			$action = $this->model->Trash($id);
			
			if($action){
				$this->session->set_flashdata('success', 'Messages has been moved to trash !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Messages has not moved to trash !!'); 		
			}
		}
		redirect('messages');
	}
}