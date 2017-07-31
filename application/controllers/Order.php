<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
		$this->load->library('Pdf');
		$this->load->model('Model_order','order');
		$this->load->model('Model_crud','crud');
		$this->layout = 'frontoffice/order/';
		date_default_timezone_set(setting('app_timezone'));
	}

	public function index(){
		$this->app->render('List Order',$this->layout.'index',array('data'=>$this->order->GetCurrentOrder()),false);
	}

	public function add(){
		$options = array(
			'table'=>$this->order->GetTableOrder(true),
			'category'=>$this->model_crud->GetAll('en_categories',null,null,null,false,array('category_name','asc'))
		);
		$this->app->render('Create Order',$this->layout.'add',$options,false);
	}

	public function save(){
		if($_POST){

			$InputBill = $this->input->post('InputBill');
			$InputTable = $this->input->post('InputTable');
			$InputSubTotal = $this->input->post('InputSubTotal');
			$InputTax = $this->input->post('InputTax');
			$InputDiscount = $this->input->post('InputDiscount');
			$InputGrandTotal = $this->input->post('InputGrandTotal');

			if(!$InputTable){
				$this->session->set_flashdata('warning', 'Sorry, Table are not selected !!'); 
			}else{
				if(!$InputBill){
					$this->session->set_flashdata('warning', 'Sorry, Menu are not selected !!'); 
				}else{
					$post = $this->app->get_post($_POST);
					$submit = $this->order->Submit($post);
					if($submit){
						$this->session->set_flashdata('success', 'Order have been inserted !!'); 
						redirect('order/detail/'.$submit);
					}else{
						$this->session->set_flashdata('danger', 'Sorry, There are error in system !!');
					}
				}
			}
			redirect('order/add');
		}
		
	}

	public function edit($id){
		$options = array(
			'detail'=>$this->order->GetOrder($id),
			'table'=>$this->order->GetTableOrder(false),
			'category'=>$this->model_crud->GetAll('en_categories',null,null,null,false,array('category_name','asc'))
		);
		$this->app->render('Edit Order',$this->layout.'edit',$options,false);
	}

	public function delete($id=null){
		if($_POST){
			if($this->input->post('dataDeleted')){
				$data = explode(',',  $this->input->post('dataDeleted'));
				foreach($data as $row){
					if($row!='on'){
						$this->order->DeleteOrder($row);
					}
				}
				$this->session->set_flashdata('success', 'Order have been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Order are not selected !!');
			}
		}else{
			$action = $this->order->DeleteOrder($id);
			if($action){
				$this->session->set_flashdata('success', 'Order have been deleted !!'); 
			}else{
				$this->session->set_flashdata('warning', 'Order are not deleted !!'); 		
			}
		}
		redirect('order');
	}

	public function detail($id){
		$detail = $this->order->GetOrder($id);
		$this->app->render('Detail Order',$this->layout.'detail',$detail,false);
	}

	public function update(){
		if($_POST){

			$id = $this->input->post('id');
			$InputBill = $this->input->post('InputBill');
			$InputTable = $this->input->post('InputTable');
			$InputSubTotal = $this->input->post('InputSubTotal');
			$InputTax = $this->input->post('InputTax');
			$InputDiscount = $this->input->post('InputDiscount');
			$InputGrandTotal = $this->input->post('InputGrandTotal');

			if(!$InputTable){
				$this->session->set_flashdata('warning', 'Sorry, Table are not selected !!'); 
			}else{
				if(!$InputBill){
					$this->session->set_flashdata('warning', 'Sorry, Menu are not selected !!'); 
				}else{
					$post = $this->app->get_post($_POST);
					$submit = $this->order->Submit($post,$id);
					if($submit){
						$this->session->set_flashdata('success', 'Order have been updated !!'); 
						redirect('order/detail/'.$submit);
					}else{
						$this->session->set_flashdata('danger', 'Sorry, There are error in system !!');
					}
				}
			}
			redirect('order/detail/'.$id);
		}
		
	}

	public function payment(){
		if($_POST){

			$id = $this->input->post('id');
			$transaction_type = $this->input->post('transaction_type');
			$submit = null;

			if($transaction_type=="0"){
				$submit = array(
					'sales_id'=>$id,
					'cash'=>tofloat($this->input->post('cash_view')),
					'change'=>tofloat($this->input->post('change_view')),
				);
			}

			if($transaction_type=="1"){
				$submit = array(
					'sales_id'=>$id,
					'bank_id'=>$this->input->post('bank_id'),
					'creditcard_id'=>$this->input->post('creditcard_id'),
					'credit_number'=>$this->input->post('credit_number'),
					'holder_number'=>$this->input->post('holder_number')
				);
			}

			if($transaction_type=="2"){
				$submit = array(
					'sales_id'=>$id,
					'bank_id'=>$this->input->post('bank_id'),
					'cheque_number'=>$this->input->post('cheque_number'),
				);
			}

			$saved = $this->order->Payment($id,$transaction_type,$submit);
			if($saved){
				$this->session->set_flashdata('success', 'Transaction have been saved !!'); 
			}else{
				$this->session->set_flashdata('danger', 'Sorry, There are error in system !!');
			}

			redirect('order/detail/'.$id);
		}
	}

	public function bill($number){
		$html = $this->load->view('public/frontoffice/order/bill',$this->order->GetOrder($number),true);
		$this->pdf->Print('Bill Transaction','Struck Order',$html);
	}

}

