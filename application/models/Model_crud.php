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

class Model_crud extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		date_default_timezone_set(setting('app_timezone'));
		$this->load->database();
	}

	public function ForeignKey($table){
		$sql = "
		    SELECT DISTINCT i.TABLE_SCHEMA, i.TABLE_NAME,  k.REFERENCED_TABLE_NAME, k.REFERENCED_COLUMN_NAME,k.COLUMN_NAME
			FROM information_schema.TABLE_CONSTRAINTS i 
			INNER JOIN information_schema.KEY_COLUMN_USAGE k ON i.CONSTRAINT_NAME = k.CONSTRAINT_NAME 
			WHERE i.CONSTRAINT_TYPE = 'FOREIGN KEY' 
			AND i.TABLE_SCHEMA = '".$this->db->database."'
			AND i.TABLE_NAME = '".$table."'
			AND k.REFERENCED_TABLE_NAME !='app_users'
		";
		return $this->db->query($sql)->result_array();
	}


	public function SearchKey($table){
		$result = array();
		$sql = "DESC ".$table;
		$entity = $this->db->query($sql)->result_array();
		$i = 0;
		foreach($entity as $e){
			if($e["Field"]!="id"){
				$result[$i] = $e["Field"];
				$i++;
			}
		}
		return $result;
	}

	
	public function GetAll($table,$limit = null,$start = null,$search = null,$count = false,$sort = null){
		
		$ref = $this->ForeignKey($table);
		$this->db->distinct();
		$this->db->select($table.'.id as id_main, '.$table.'.*');

		if($search){
			$sc = $this->SearchKey($table);
			if($sc){
				$i = 0;
				foreach($sc as $s){
					if($i==0){
						$this->db->like($table.'.'.$s, $search);
					}else{
						$this->db->or_like($table.'.'.$s, $search);
					}
					$i++;
				}
			}
		}

		if($ref){
			foreach($ref as $r){
				if($this->db->table_exists($r["REFERENCED_TABLE_NAME"])){
					$this->db->select($r["REFERENCED_TABLE_NAME"].'.*');
					$this->db->join($r["REFERENCED_TABLE_NAME"],$r["REFERENCED_TABLE_NAME"].'.id = '.$r["TABLE_NAME"].'.'.$r["COLUMN_NAME"]);
				}
			}
		}

		if($count){
			return $this->db->get($table)->num_rows();
		}else{
			if(isset($limit) && isset($start)){
				$this->db->limit($limit,$start);
			}
			if($sort){
				$this->db->order_by($sort[0], $sort[1]);
			}else{
				$this->db->order_by($table.'.id', 'desc');
			}

			return $this->db->get($table)->result();
		}
		
		
	}

	public function GetById($table,$id){
		$ref = $this->ForeignKey($table);
		$this->db->select($table.'.id as id_main, '.$table.'.*');
		if($ref){
			foreach($ref as $r){
				$this->db->select($r["REFERENCED_TABLE_NAME"].'.*');
				$this->db->join($r["REFERENCED_TABLE_NAME"],$r["REFERENCED_TABLE_NAME"].'.id = '.$r["TABLE_NAME"].'.'.$r["COLUMN_NAME"]);
			}
		}
		$this->db->limit(1);
		$this->db->where($table.'.id',$id);
		return $this->db->get($table)->row();
	}

	public function Delete($table,$id){
		$sql = "SHOW KEYS FROM ".$table." WHERE Key_name = 'PRIMARY'";
		$data = $this->db->query($sql)->result_array();
		$PK =  $data[0]['Column_name'];
		$this->db->where($PK,$id);
		return $this->db->delete($table);
	}
	
	public function Submit($table,$data,$id = null){
		$user_id = account_name(true);
		if($id){
			$sql = "SHOW KEYS FROM ".$table." WHERE Key_name = 'PRIMARY'";
			$query = $this->db->query($sql)->result_array();
			$PK =  $query[0]['Column_name'];
			$data['updated'] = date("Y-m-d H:i:s");
			$data['updated_by'] = $user_id;
			$this->db->where($PK,$id);
			$this->db->update($table,$data);
			return $id;
		}else{
			$data['created'] = date("Y-m-d H:i:s");
			$data['created_by'] = $user_id;
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}
	}

	public function UpdateSetting($name,$value){
		$this->db->where('name',$name);
		$this->db->limit(1);
		$check = $this->db->get('app_setting')->row();
		if($check){
			$this->db->where('name',$name);
			$this->db->limit(1);
			$this->db->update('app_setting',array('value'=>$value));
		}
		return false;
		
	}

	public function TransactionNumber($id,$table){
		$this->db->where('transaction_date >= CURDATE()');
		$this->db->select_max($id);
		$current = $this->db->get($table)->row();
		if($current->$id){
			$index = (int)substr($current->$id, 8);
			$digit = 4;
			$number = $index+1;
	        $i_number = strlen($number);
	        for ($i = $digit; $i > $i_number; $i--) {
	            $number = "0" . $number;
	        }
	        $temp = date("Ymd");
			return $temp.''.$number;
		}else{
			$temp = date("Ymd");
			return $temp.'0001';
		}

	}

}