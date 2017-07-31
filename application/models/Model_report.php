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

class Model_report extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		$this->load->database();
	}

	public function GetPeriod($limit = null,$start = null,$search = null,$count = false,$sort = null,$group = null){
		$this->db->distinct();
		if($count){
			if($group){
				$this->db->group_by($group[0], $group[1]);
			}
			$this->db->where('tr_sales.transaction_type !=','-1');
			return $this->db->get('tr_sales')->num_rows();
		}else{
			$start_date = date('Y').'-01-01';			
			$last_date = date('Y').'-12-31';
			if(isset($limit) && isset($start)){
				$this->db->limit($limit,$start);
			}
			if($search){
				$date = explode('-', $search);
				$start_date = date_db($date[0]);				
				$last_date = date_db($date[1]);
			}
			$this->db->select('tr_sales.*,app_users.fullname');
			$this->db->where('tr_sales.transaction_type !=','-1');
			$this->db->where('tr_sales.transaction_date >=',$start_date);
			$this->db->where('tr_sales.transaction_date <=',$last_date);
			$this->db->join('app_users','app_users.id = tr_sales.updated_by');
			if($group){
				$this->db->group_by($group[0], $group[1]);
			}
			if($sort){
				$this->db->order_by($sort[0], $sort[1]);
			}else{
				$this->db->order_by('transaction_number', 'desc');
			}
			return $this->db->get('tr_sales')->result();

		}
	}

	public function GetMenuItems($id_menu,$search = null){
		$num = 0;
		$result = $this->GetOrderByDate($search);
		if($result){
			foreach($result as $row){
				$items = json_decode($row->items);
				if($items){
					foreach($items as $i){
						if($i->id==	$id_menu){
							$num++;
						}
					}
				}
			}
		}
		return $num;
	}

	public function GetMenuSales($id_menu,$search = null){
		$num = 0;
		$result = $this->GetOrderByDate($search);
		if($result){
			foreach($result as $row){
				$items = json_decode($row->items);
				if($items){
					foreach($items as $i){
						if($i->id==	$id_menu){
							$num+=$i->price;
						}
					}
				}
			}
		}
		return $num;
	}

	public function GetTotalTransaction($id_user,$type,$search = null){
		$start_date = date('Y').'-01-01';			
		$last_date = date('Y').'-12-31';
		if($search){
			$date = explode('-', $search);
			$start_date = date_db($date[0]);				
			$last_date = date_db($date[1]);
		}
		$this->db->select_sum('tr_sales.grandtotal');
		$this->db->where('tr_sales.updated_by',$id_user);
		$this->db->where('tr_sales.transaction_type',$type);
		$this->db->where('tr_sales.transaction_date >=',$start_date);
		$this->db->where('tr_sales.transaction_date <=',$last_date);
		return $this->db->get('tr_sales')->row()->grandtotal;
	}

	public function GetTotalBy($type,$key,$search = null){
		$start_date = date('Y').'-01-01';			
		$last_date = date('Y').'-12-31';
		if($search){
			$date = explode('-', $search);
			$start_date = date_db($date[0]);				
			$last_date = date_db($date[1]);
		}
		if($key!='items'){
			$this->db->select_sum('tr_sales.'.$key);
		}
		$this->db->where('tr_sales.transaction_type',$type);
		$this->db->where('tr_sales.transaction_date >=',$start_date);
		$this->db->where('tr_sales.transaction_date <=',$last_date);
		if($key!='items'){
			return $this->db->get('tr_sales')->row()->$key;
		}else{
			$num = 0;
			$data = $this->db->get('tr_sales')->result();
			if($data){
				foreach($data as $row){
					$items = json_decode($row->items);
					$num+= count($items);
				}
			}
			return $num;
		}
	}

	private function GetOrderByDate($search = null){
		$start_date = date('Y').'-01-01';			
		$last_date = date('Y').'-12-31';
		if($search){
			$date = explode('-', $search);
			$start_date = date_db($date[0]);				
			$last_date = date_db($date[1]);
		}
		$this->db->select('tr_sales.items');
		$this->db->where('tr_sales.transaction_type !=','-1');
		$this->db->where('tr_sales.transaction_date >=',$start_date);
		$this->db->where('tr_sales.transaction_date <=',$last_date);
		return $this->db->get('tr_sales')->result();
	}

	public function GetSalesByPeriod($start_date,$last_date,$key){
		$result = null;
		if($key!='qty'){
			$this->db->select_sum('tr_sales.'.$key);
		}else{
			$this->db->select('tr_sales.items');
		}
		$this->db->where('tr_sales.transaction_type !=','-1');
		$this->db->where('tr_sales.transaction_date >=',$start_date);
		$this->db->where('tr_sales.transaction_date <=',$last_date);
		if($key!='qty'){
			$result = $this->db->get('tr_sales')->row()->$key;
		}else{
			$total = 0;
			$result = $this->db->get('tr_sales')->result();
			foreach ($result as $r) {
				$total+= count(json_decode($r->items));
			}
			$result = $total;
		}
		if($result){
			return $result;
		}else{
			return 0;
		}
	}

}