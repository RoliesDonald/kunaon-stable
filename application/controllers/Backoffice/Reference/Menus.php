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
		$this->app->auth();
		$this->app->setActive('backoffice/reference/menus');
		$this->layout = 'backoffice/reference/menus/';
		$this->table = 'en_menu';
	}

	public function index(){
		$this->app->render('List Menu',$this->layout.'index',null);
	}

	public function add(){
		$this->app->render('Create Menu',$this->layout.'add',null);
	}

	public function edit($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
		);
		$this->app->render('Edit Menu',$this->layout.'edit',$options);
	}

	public function detail($id){
		$options = array(
			'data'=>$this->model_crud->GetById($this->table,$id),
		);
		$this->app->render('Detail Menu',$this->layout.'detail',$options);
	}

	public function delete($id=null){
		if($_POST){
			if($this->input->post('dataDeleted')){
				$total = 0;
				$data = explode(',',  $this->input->post('dataDeleted'));
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
				$this->session->set_flashdata('success', $total.' Menu has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Menu are not selected !!');
			}
		}else{
			$temp = $this->model_crud->GetById($this->table,$id);
			if(file_exists($temp->photo)){
				unlink($temp->photo);
			}
			$action = $this->model_crud->Delete($this->table,$id);
			if($action){
				$this->session->set_flashdata('success', 'Menu has been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Menu are not deleted !!'); 		
			}
		}
		redirect('backoffice/reference/menus');
	}

	public function submit(){
		if($_POST){
			if($this->input->post('id')){
				$menu_photo = null;
				$cropped = $this->input->post('cropped');
				if($cropped){
					$temp = $this->model_crud->GetById($this->table,$this->input->post('id'));
					if(file_exists($temp->photo)){
						unlink($temp->photo);
					}
					$arr_photo = explode('/', $cropped);
					$photo = 'upload/menus/'.end($arr_photo);
					$copy = copy($cropped, $photo);
					if($copy){
						$menu_photo = $photo;
					}
				}else{
					$temp = $this->model_crud->GetById($this->table,$this->input->post('id'));
					if(file_exists($temp->photo)){
						$menu_photo = $temp->photo;
					}
				}
				$post = $this->app->get_post($_POST);
				$post['photo'] = $menu_photo;
				$post['price'] = tofloat($this->input->post('price'));
				unset($post['price_view']);
				unset($post['cropped']);
				unset($post['cropped_original']);
				$submit = $this->model_crud->Submit($this->table,$post,$this->input->post('id'));
				if($submit){
					$this->session->set_flashdata('success', 'Menu has been updated !!'); 
				}else{
					$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
				}
				unlink($this->input->post('cropped'));
				unlink($this->input->post('cropped_original'));
				$this->session->set_userdata('IMG_ORIGINAL', null);
				$this->session->set_userdata('IMG_RESULT', null);
				redirect('backoffice/reference/menus/detail/'.$submit);
			}else{
				$menu_photo = null;
				$cropped = $this->input->post('cropped');
				if($cropped){
					$arr_photo = explode('/', $cropped);
					$photo = 'upload/menus/'.end($arr_photo);
					$copy = copy($cropped, $photo);
					if($copy){
						$menu_photo = $photo;
					}
				}
				$post = $this->app->get_post($_POST);
				$post['photo'] = $menu_photo;
				$post['price'] = tofloat($this->input->post('price'));
				unset($post['cropped']);
				unset($post['cropped_original']);
				$submit = $this->model_crud->Submit($this->table,$post,null);
				if($submit){
					$this->session->set_flashdata('success', 'Menu has been inserted !!'); 
				}else{
					$this->session->set_flashdata('danger', 'Sorry, There are error in system !!'); 
				}
				unlink($this->input->post('cropped'));
				unlink($this->input->post('cropped_original'));
				$this->session->set_userdata('IMG_ORIGINAL', null);
				$this->session->set_userdata('IMG_RESULT', null);
				redirect('backoffice/reference/menus/detail/'.$submit);
			}

		}
		redirect('backoffice/reference/menus/add');
	}

}