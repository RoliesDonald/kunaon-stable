<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

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
		$this->load->model('Model_account','account');
		require_once APPPATH.'third_party/crop.php';
	}

	public function cropped(){

		$crop = new CropAvatar(
        	isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null, 
        	isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null, 
        	isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null
		);

		
		$IMG_ORIGINAL = $this->session->userdata('IMG_ORIGINAL');
		$IMG_RESULT = $this->session->userdata('IMG_RESULT');

		if($IMG_ORIGINAL && $IMG_RESULT){
			if(file_exists($IMG_ORIGINAL) && file_exists($IMG_RESULT)){
				unlink($IMG_ORIGINAL);
				unlink($IMG_RESULT);
				$this->session->set_userdata('IMG_ORIGINAL', $crop->getOrginal());
				$this->session->set_userdata('IMG_RESULT', $crop->getResult());
			}else{
				$this->session->set_userdata('IMG_ORIGINAL', $crop->getOrginal());
				$this->session->set_userdata('IMG_RESULT', $crop->getResult());
			}
		}else{
			$this->session->set_userdata('IMG_ORIGINAL', $crop->getOrginal());
			$this->session->set_userdata('IMG_RESULT', $crop->getResult());
		}

		$response = array(
		    'state' => 200,
		    'message' =>$crop->getMsg(),
		    'orginal'=>$crop->getOrginal(),
		    'result' =>$crop->getResult(),
		);

		header("Content-Type: application/json", true);
		echo json_encode($response);

	}

	public function profile(){

		$crop = new CropAvatar(
        	isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null, 
        	isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null, 
        	isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null
		);

		$response = array(
		    'state' => 200,
		    'message' =>$crop->getMsg(),
		    'orginal'=>$crop->getOrginal(),
		    'result' =>$crop->getResult()
		);

		$arr_photo = explode('/', $crop->getResult());
		$photo = 'upload/person/'.end($arr_photo);

		$id_user = $this->session->userdata('ID_USER');
		$person = $this->account->Profile($id_user);
		if($person){
			if($person->photo){
				if(file_exists($person->photo)){
					$copy = copy($crop->getResult(), $photo);
					if($copy){
						$this->model_crud->submit('app_users',array('photo'=>$photo),$person->id);
						unlink($person->photo);
						$response['result'] = $photo;
					}
				}
			}else{
				$copy = copy($crop->getResult(), $photo);
				if($copy){
					$this->model_crud->submit('app_users',array('photo'=>$photo),$person->id);
					$response['result'] = $photo;
				}
			}
			unlink($crop->getResult());
			unlink($crop->getOrginal());
		}

		header("Content-Type: application/json", true);
		echo json_encode($response);
	}

	public function company(){

		$crop = new CropAvatar(
        	isset($_POST['avatar_src']) ? $_POST['avatar_src'] : null, 
        	isset($_POST['avatar_data']) ? $_POST['avatar_data'] : null, 
        	isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : null
		);

		$response = array(
		    'state' => 200,
		    'message' =>$crop->getMsg(),
		    'orginal'=>$crop->getOrginal(),
		    'result' =>$crop->getResult()
		);

		$arr_photo = explode('/', $crop->getResult());
		$photo = 'upload/'.end($arr_photo);

		if(file_exists(setting('com_logo'))){
			unlink(setting('com_logo'));
		}

		$copy = copy($crop->getResult(), $photo);
		if($copy){
			$this->model_crud->UpdateSetting('com_logo',$photo);
			$response['result'] = $photo;
		}
		
		unlink($crop->getResult());
		unlink($crop->getOrginal());
		header("Content-Type: application/json", true);
		echo json_encode($response);

	}



}