<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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
		$this->layout = 'backoffice/report/sales/';
	}

	public function period(){
		$this->app->setActive('backoffice/report/sales/period');
		$this->app->render('Sales By Period',$this->layout.'period',null);
	}

	public function menu(){
		$this->app->setActive('backoffice/report/sales/menu');
		$this->app->render('Sales By Menu',$this->layout.'menu',null);
	}

	public function casheir(){
		$this->app->setActive('backoffice/report/sales/casheir');
		$this->app->render('Sales By Casheir',$this->layout.'casheir',null);
	}

	public function payment(){
		$this->app->setActive('backoffice/report/sales/payment');
		$this->app->render('Sales By Payment',$this->layout.'payment',null);
	}

	public function branch(){
		$this->app->setActive('backoffice/report/sales/branch');
		$this->app->render('Sales By Branch',$this->layout.'branch',null);
	}

}
