<?php defined('BASEPATH') OR exit('No direct script access allowed');

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

class Model_order extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		date_default_timezone_set(setting('app_timezone'));
		$this->load->database();
		$this->load->model('Model_crud','crud');
	}

	public function ListOrder($limit = null,$start = null,$search = null,$count = false,$sort = null){
		if($count){
			$this->db->where('tr_sales.transaction_type !=','-1');
			return $this->db->get('tr_sales')->num_rows();
		}else{
			$this->db->where('tr_sales.transaction_type !=','-1');
			if(isset($limit) && isset($start)){
				$this->db->limit($limit,$start);
			}
			if($search){
				$this->db->like('tr_sales.transaction_number',$search);
				$this->db->or_like('tr_sales.created',$search);
			}
			if($sort){
				$this->db->order_by($sort[0], $sort[1]);
			}else{
				$this->db->order_by('tr_sales.transaction_number', 'desc');
			}
			return $this->db->get('tr_sales')->result();
		}
	}

	
	public function ListTable($id){
		$html = null;
		$this->db->where('sales_id',$id);
		$this->db->join('en_tables','en_tables.id = tr_reservation.table_id');
		$data =  $this->db->get('tr_reservation')->result();
		foreach($data as $row){
			if(count($data)>1){
				$html.=  $row->code.', ';
			}else{
				$html.=  $row->code;
			}
		}
		return $data == null ? "<small><strong>No Table Selected</strong></small>" : $html;
	}


	public function Submit($data,$id = null){

		$_table = $data['InputTable'];
		$table = explode(',', $_table);
		$insert_id = gen_uuid();
		$user_id = account_name(true);
		
		if($table){

			$number = $this->crud->TransactionNumber('transaction_number','tr_sales');
			$sales = array(
			  'id'=>$insert_id,
			  'transaction_number'=>$number,
			  'items'=>$data['InputBill'],
			  'subtotal'=>tofloat($data['InputSubTotal']),
			  'tax'=>tofloat($data['InputTax']),
			  'discount'=>tofloat($data['InputDiscount']),
			  'grandtotal'=>tofloat($data['InputGrandTotal']),
			  'member_id'=>$data['member_id'] == null ? null : $data['member_id'],
			  'transaction_type'=>'-1'
			);

			if($id){
				$sales['updated'] = date("Y-m-d H:i:s");
				$sales['updated_by'] = $user_id;
			}else{
				$sales['created'] = date("Y-m-d H:i:s");
				$sales['created_by'] = $user_id;
			}

			if($id){
				unset($sales['id']);
				unset($sales['transaction_number']);
				unset($sales['transaction_type']);
				unset($sales['created']);
				$this->db->where('id',$id);
				$this->db->update('tr_sales',$sales);
			}else{
				$this->db->insert('tr_sales',$sales);
			}

			$sales_id = ($id == null) ? $insert_id : $id;

			$this->db->where('sales_id',$sales_id);
			$this->db->delete('tr_reservation');

			foreach($table as $t){

				$this->db->where('id',$t);
				$this->db->update('en_tables',array('is_empty'=>'0'));

				$reserved = array(
					'sales_id'=>$sales_id,
					'table_id'=>$t,
				);
				$this->db->insert('tr_reservation',$reserved);

			}

			return $sales_id;

		}
		return false;
	}

	public function GetOrder($id){

		$arr_table = array();
		$arr_table_id = array();
		
		$this->db->where('sales_id',$id);
		$reserved = $this->db->get('tr_reservation')->result();
		foreach($reserved as $row){
			$this->db->select('en_rooms.*,en_tables.*,en_tables.id as id_main');
			$this->db->where('en_tables.id',$row->table_id);
			$this->db->join('en_rooms','en_rooms.id = en_tables.room_id');
			$tab = $this->db->get('en_tables')->row();
			$arr_table[] = $tab->code;
			$arr_table_id[] = $tab->id_main;
		}

		$this->db->where('tr_sales.id',$id);
		$this->db->select('tr_sales.*,app_users.*,tr_sales.id as sales_id');
		$this->db->join('app_users','app_users.id = tr_sales.created_by');
		$payment = $this->db->get('tr_sales')->row();

		$this->db->where('id',$payment->member_id);
		$member = $this->db->get('app_users')->row();
		$guest_name = isset($member) ? $member->fullname : null;
		$date_reserved = $payment->created;

		$paid = null;

		if($payment->transaction_type=='0'){
			$this->db->where('sales_id',$id);
			$paid = $this->db->get('tr_paid_cash')->row();

		}else if($payment->transaction_type=='1'){

			$this->db->where('sales_id',$id);
			$this->db->join('en_banks','en_banks.id = tr_paid_credit.bank_id');
	     	$this->db->join('en_creditcard','en_creditcard.id = tr_paid_credit.creditcard_id');
			$paid = $this->db->get('tr_paid_credit')->row();

		}else if($payment->transaction_type=='2'){

			$this->db->where('sales_id',$id);
			$this->db->join('en_banks','en_banks.id = tr_paid_cheque.bank_id');
			$paid = $this->db->get('tr_paid_cheque')->row();

		}

		return array(
			'member_id'=>$payment->member_id,
			'guest_name'=>$guest_name,
			'date_reserved'=>$date_reserved,
			'table'=>implode(',', $arr_table),
			'table_id'=>implode(',', $arr_table_id),
			'payment'=>$payment,
			'paid'=>$paid,
		);

	}

	public function DeleteOrder($id){

		$this->db->where('sales_id',$id);
		$table = $this->db->get('tr_reservation')->result();

		foreach($table as $t){
			$this->db->where('id',$t->table_id);
			$this->db->update('en_tables',array('is_empty'=>'1'));
		}

		$this->db->where('id',$id);
		$delete = $this->db->delete('tr_sales');
		if($delete){
			return true;
		}

		return false;
	}
	
	public function GetTableOrder($val = false){
		$this->db->select('en_tables.*,en_rooms.*,en_tables.id as id_main');
		if($val==true){
			$this->db->where('is_empty','1');
		}
		$this->db->join('en_rooms','en_rooms.id = en_tables.room_id');
		$this->db->order_by('en_rooms.room_name');
		return $this->db->get('en_tables')->result();
	}

	public function RemoveTable($transaction_number,$table_id){
		$this->db->where('transaction_number',$transaction_number);
		$this->db->where('table_id',$table_id);
		$delete = $this->db->delete('tr_reservation');
		if($delete){
			$this->db->where('id',$table_id);
			$update = $this->db->update('en_tables',array('is_empty'=>'1'));
			if($update){
				return array('response'=>true);
			}
		}
		return array('response'=>false);

	}

	public function Payment($id,$transaction_type,$data){

		$saved = false;

		if($transaction_type=="0"){
			// Delete In Credit & Cheque
			$this->db->where('sales_id',$id);
			$this->db->delete('tr_paid_credit');

			$this->db->where('sales_id',$id);
			$this->db->delete('tr_paid_cheque');
		
			// Insert Into Cash
			$insert = $this->db->insert('tr_paid_cash',$data);
			if($insert){
				$saved = true;
			}

			
		}

		if($transaction_type=="1"){
			// Delete In Cash & Cheque
			$this->db->where('sales_id',$id);
			$this->db->delete('tr_paid_cash');

			$this->db->where('sales_id',$id);
			$this->db->delete('tr_paid_cheque');

			// Insert Into Credit
			$insert = $this->db->insert('tr_paid_credit',$data);
			if($insert){
				$saved = true;
			}
			
		}

		if($transaction_type=="2"){
			// Delete In Cash & Credit
			$this->db->where('sales_id',$id);
			$this->db->delete('tr_paid_cash');

			$this->db->where('sales_id',$id);
			$this->db->delete('tr_paid_credit');

			// Insert Into Cheque
			$insert = $this->db->insert('tr_paid_cheque',$data);
			if($insert){
				$saved = true;
			}

			
		}

		if($saved){

			// Update Transaction
			$updated_by = account_name(true);

			$this->db->where('id',$id);
			$updated = $this->db->update('tr_sales',array(
				'updated' => date("Y-m-d H:i:s"),
				'updated_by' =>$updated_by,
				'transaction_date' => date("Y-m-d"),
				'transaction_type'=>$transaction_type
			));

			
			// Update Table Set Empty
			$this->db->where('sales_id',$id);
			$table = $this->db->get('tr_reservation')->result();

			if($table){
				foreach($table as $t){
					$this->db->where('id',$t->table_id);
					$this->db->update('en_tables',array('is_empty'=>'1'));
				}
			}

			if($updated){
				return true;
			}
		}

		return false;
	}

	public function GetDetailTransaction($transaction_number){

		$this->db->where('transaction_number',$transaction_number);
		$cash = $this->db->get('tr_paid_cash')->row();

		$this->db->where('transaction_number',$transaction_number);
		$this->db->join('en_banks','en_banks.id = tr_paid_credit.bank_id');
		$this->db->join('en_creditcard','en_creditcard.id = tr_paid_credit.creditcard_id');
		$credit = $this->db->get('tr_paid_credit')->row();

		$this->db->where('transaction_number',$transaction_number);
		$cheque = $this->db->get('tr_paid_cheque')->row();

		return array(
			'cash'=>$cash,
			'credit'=>$credit,
			'cheque'=>$cheque
		);

	}

	public function GetCurrentOrder(){
		$user_id = account_name(true);
		$this->db->where('tr_sales.transaction_type','-1');
		$this->db->where('tr_sales.created_by',$user_id);
		$this->db->order_by('tr_sales.transaction_number', 'desc');
		return $this->db->get('tr_sales')->result();
	}
}