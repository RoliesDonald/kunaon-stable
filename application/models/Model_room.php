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

class Model_room extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		$this->load->database();
	}

	public function TableStatusByRoom($id){

		$this->db->where('room_id',$id);
		$total = $this->db->get('en_tables')->num_rows();

		$this->db->where('room_id',$id);
		$this->db->where('is_empty','1');
		$empty = $this->db->get('en_tables')->num_rows();

		$data = array(
			'total'=>$total,
			'empty'=>$empty,
			'reserved'=>($total-$empty)
		);

		return $data;
	}

	public function TableByRoom($id){
		$this->db->where('room_id',$id);
		return $this->db->get('en_tables')->result();
	}

	public function CheckTable($table){
		$empty = 0;
		foreach($table as $t){
			if($t==''){
				$empty++;
			}
		}
		if($empty>0){
			return false;
		}
		return true;
	}

	public function SaveRoom($photo = null,$name,$table){
		$this->db->insert('en_rooms',array('room_name'=>$name,'photo'=>$photo));
		$room_id =  $this->db->insert_id();
		if($room_id && $table){
			foreach($table as $row){
				$this->db->insert('en_tables',array('room_id'=>$room_id,'code'=>$row,'is_empty'=>'1'));
			}
			return $room_id;
		}
		return false;
	}

	public function UpdateRoom($photo = null,$name,$table,$id){

		$this->db->where('room_id',$id);
		$this->db->where('is_empty','1');
		$deleted = $this->db->delete('en_tables');

		if($deleted){

			$this->db->where('id',$id);
			$updated = $this->db->update('en_rooms',array('room_name'=>$name,'photo'=>$photo));

			if($updated){
				foreach($table as $row){
					$this->db->insert('en_tables',array('room_id'=>$id,'code'=>$row,'is_empty'=>'1'));
				}
			}

			return $id;

		}

		return false;
	}

}