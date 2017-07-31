<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {

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
		$this->app->setActive('backoffice/setting/application');
		$this->layout = 'backoffice/setting/application';
		$this->table = 'app_setting';
	}

	public function index(){
		$this->app->render('Setting Application',$this->layout,null);
	}

	public function submit(){
		if($_POST){
			foreach ($_POST as $key => $value) {
				$this->model_crud->UpdateSetting($key,$value);
			}
		}
		$this->session->set_flashdata('success', 'Setting application has been updated !!'); 
		redirect('backoffice/setting/application');
	}

}