<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
		$this->load->model('Model_report','report');
	}

	public function index(){
		$response  = array();
		$token = setting('app_token');
		$input_token = $this->input->post_get('token');
		$input_first_date = $this->input->post_get('first_date');
		$input_last_date = $this->input->post_get('last_date');
		if($this->input->post_get('token')){
			if(trim($this->input->post_get('token'))==trim($token)){
				$response = array('messages'=>'ok','data'=>array(
					'qty'=>$this->report->GetSalesByPeriod($input_first_date,$input_last_date,'qty'),
					'subtotal'=>$this->report->GetSalesByPeriod($input_first_date,$input_last_date,'subtotal'),
					'tax'=>$this->report->GetSalesByPeriod($input_first_date,$input_last_date,'tax'),
					'discount'=>$this->report->GetSalesByPeriod($input_first_date,$input_last_date,'discount'),
					'grandtotal'=>$this->report->GetSalesByPeriod($input_first_date,$input_last_date,'grandtotal'),
				));
			}else{
				$response = array('messages'=>'Wrong Token','data'=>null);
			}
		}else{
			$response = array('messages'=>'Invalid Token','data'=>null);
		}
		header("Content-Type: application/json", true);
		echo json_encode($response);
	}

	
}