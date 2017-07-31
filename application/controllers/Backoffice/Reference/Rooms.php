<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rooms extends CI_Controller {

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
		$this->app->setActive('backoffice/reference/rooms');
		$this->load->model('Model_room','room');
		$this->layout = 'backoffice/reference/rooms/';
		$this->table = 'en_rooms';
	}

	public function index(){
		$this->app->render('List Room',$this->layout.'index',null);
	}

	public function add(){
		$this->app->render('Create Room',$this->layout.'add',null);
	}

	public function edit($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
			'table'=>$this->room->TableByRoom($id)
		);
		$this->app->render('Edit Room',$this->layout.'edit',$options);
	}

	public function detail($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
			'table'=>$this->room->TableByRoom($id)
		);
		$this->app->render('Detail Room',$this->layout.'detail',$options);
	}

	public function delete($id=null){
		if($_POST){
			if($this->input->post('dataDeleted')){
				$data = explode(',',  $this->input->post('dataDeleted'));
				$total = 0;
				foreach($data as $row){
					if($row!='on'){
						$temp = $this->model_crud->GetById($this->table,$row);
						if(file_exists($temp->photo)){
							unlink($temp->photo);
						}
						$this->model_crud->Delete($this->table,$row);
						$total++;
					}
				}
				$this->session->set_flashdata('success', $total.' Room has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Room are not selected !!');
			}
		}else{
			$action = $this->model_crud->Delete($this->table,$id);
			if($action){
				$this->session->set_flashdata('success', 'Room has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Room are not deleted !!'); 		
			}
		}
		redirect('backoffice/reference/rooms');
	}

	public function submit(){

		if($_POST){

			$name = $this->input->post('room_name');
			$table = $this->input->post('table');

			if(!$name || $name==''){
				$this->session->set_flashdata('warning', 'Room name is empty !!'); 	
				redirect('backoffice/reference/rooms/add');	
			}else if(!$this->room->CheckTable($table)){
				$this->session->set_flashdata('warning', 'Table of room are not selected !!'); 
				redirect('backoffice/reference/rooms/add');	
			}else{

				if($this->input->post('id')){
					$my_photo = null;
					$cropped = $this->input->post('cropped');
					if($cropped){
						$temp = $this->model_crud->GetById($this->table,$this->input->post('id'));
						if(file_exists($temp->photo)){
							unlink($temp->photo);
						}
						$arr_photo = explode('/', $cropped);
						$photo = 'upload/rooms/'.end($arr_photo);
						$copy = copy($cropped, $photo);
						if($copy){
							$my_photo = $photo;
						}
					}else{
						$temp = $this->model_crud->GetById($this->table,$this->input->post('id'));
						if(file_exists($temp->photo)){
							$my_photo = $temp->photo;
						}
					}
					$submit = $this->room->UpdateRoom($my_photo,$name,$table,$this->input->post('id'));
					if($submit){
						$this->session->set_flashdata('success', 'Room has been updated !!'); 
					}else{
						$this->session->set_flashdata('danger', 'Sorry, There are error in system !!');
					}
					unlink($this->input->post('cropped'));
					unlink($this->input->post('cropped_original'));
					$this->session->set_userdata('IMG_ORIGINAL', null);
					$this->session->set_userdata('IMG_RESULT', null);
					redirect('backoffice/reference/rooms/detail/'.$submit);
				}else{
					
					$my_photo = null;
					$cropped = $this->input->post('cropped');
					if($cropped){
						$arr_photo = explode('/', $cropped);
						$photo = 'upload/rooms/'.end($arr_photo);
						$copy = copy($cropped, $photo);
						if($copy){
							$my_photo = $photo;
						}
					}
					$submit = $this->room->SaveRoom($my_photo,$name,$table);
					if($submit){
						$this->session->set_flashdata('success', 'Room has been inserted !!'); 
					}else{
						$this->session->set_flashdata('danger', 'Sorry, There are error in system !!');
					}
					unlink($this->input->post('cropped'));
					unlink($this->input->post('cropped_original'));
					$this->session->set_userdata('IMG_ORIGINAL', null);
					$this->session->set_userdata('IMG_RESULT', null);
					redirect('backoffice/reference/rooms/detail/'.$submit);
				}
			}

		}
		redirect('backoffice/reference/rooms');
	}

}