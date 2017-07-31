<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

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
		$this->app->setActive('backoffice/setting/help');
		$this->layout = 'backoffice/setting/help';
	}

	public function index(){
		$this->app->render('Help & Support',$this->layout,null);
	}

	public function submit(){

		if($_POST){
			$check = checkdnsrr('php.net');
			if($check=='1'){

			}else{
				$this->session->set_flashdata('warning', 'Please turn on internet connection !!');
			}
		}
		$this->session->set_flashdata('success', 'Setting application has been send !!'); 
		redirect('backoffice/setting/help');
	}

}