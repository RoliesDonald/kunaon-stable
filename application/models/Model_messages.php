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

class Model_messages extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		$this->load->database();
		$this->id_user = $this->session->userdata('ID_USER');
		date_default_timezone_set(setting('app_timezone'));
	}

	public function Send($data){
		if($data){
			$target_id  = $data['target_by'];
			foreach($target_id as $row){
				$this->db->insert('app_messages',array(
					'subject'=>$data['subject'],
					'content'=>$data['content'],
					'is_read'=>'0',
					'is_draft'=>$data['is_draft'],
					'is_deleted'=>'0',
					'from_by'=>$this->id_user,
					'target_by'=>$row,
					'created'=>date("Y-m-d H:i:s"),
					'created_by'=>$this->id_user
				));
			}
			return true;
		}
		return false;
	}

	public function Detail($id){
		$this->db->where('app_messages.id',$id);
		$this->db->select('app_messages.*,app_messages.id as id_message,app_users.*');
		$this->db->join('app_users','app_users.id = app_messages.target_by');
		return $this->db->get('app_messages')->row();
	}

	public function Update($id,$data){
		
	}

	public function Read($id){
		$this->db->where('id',$id);
		$this->db->update('app_messages',array('is_read'=>'1'));
	}

	public function Trash($id){
		$this->db->where('id',$id);
		$deleted = $this->db->update('app_messages',array('is_deleted'=>'1'));
		if($deleted){
			return true;
		}
		return false;
	}

	public function GetStatus(){

		$data = array();
		$id_user = $this->session->userdata('ID_USER');

	    $this->db->where('target_by',$id_user);
		$this->db->where('is_read','0');
		$this->db->where('is_deleted','0');
		$this->db->where('is_draft','0');
		$data['inbox'] = $this->db->get('app_messages')->num_rows();

		$this->db->where('created_by',$id_user);
		$data['sent'] = $this->db->get('app_messages')->num_rows();

		$this->db->where('created_by',$id_user);
		$this->db->where('is_draft','1');
		$this->db->where('is_deleted','0');
		$this->db->or_where('target_by',$id_user);
		$data['draft'] = $this->db->get('app_messages')->num_rows();

		$this->db->where('is_deleted','1');
		$this->db->where('created_by',$id_user);
		$this->db->or_where('target_by',$id_user);
		$data['trash'] =  $this->db->get('app_messages')->num_rows();


		return $data;
	}

	public function UnReadByUser($id){
		$this->db->select('app_messages.*,app_messages.id as id_message,app_users.*');
		$this->db->where('target_by',$id);
		$this->db->where('is_read','0');
		$this->db->where('is_draft','0');
		$this->db->where('is_deleted','0');
		$this->db->join('app_users','app_users.id = app_messages.from_by');
		$this->db->limit(10);
		return $this->db->get('app_messages')->result();
	}

	public function GetData($limit = null,$start = null,$search = null,$count = false,$sort = null,$type = null){
		$id_user = $this->session->userdata('ID_USER');
		if($count){
			if($type){
				if($type=='read'){
				    $this->db->where('app_messages.target_by',$id_user);
					$this->db->where('app_messages.is_read','0');
					$this->db->where('app_messages.is_deleted','0');
					$this->db->where('app_messages.is_draft','0');
				}else if($type=='sent'){
				    $this->db->where('created_by',$id_user);
				}else{
					$this->db->where($type,'1');
					$this->db->where('app_messages.created_by',$id_user);
					$this->db->or_where('app_messages.target_by',$id_user);
				}
			}else{
				$this->db->where('app_messages.is_draft','0');
				$this->db->where('app_messages.is_deleted','0');
				$this->db->where('app_messages.created_by',$id_user);
				$this->db->or_where('app_messages.target_by',$id_user);
			}
			return $this->db->get('app_messages')->num_rows();
		}else{
			$this->db->select('app_messages.*,app_messages.id as id_message,app_users.*');
			if($type){
				if($type=='read'){
				    $this->db->where('app_messages.target_by',$id_user);
					$this->db->where('app_messages.is_read','0');
					$this->db->where('app_messages.is_deleted','0');
					$this->db->where('app_messages.is_draft','0');
				}else if($type=='sent'){
				    $this->db->where('app_messages.created_by',$id_user);
				}else{
					$this->db->where($type,'1');
					$this->db->where('app_messages.created_by',$id_user);
					$this->db->or_where('app_messages.target_by',$id_user);
				}
			}else{
				$this->db->where('app_messages.is_draft','0');
				$this->db->where('app_messages.is_deleted','0');
				$this->db->where('app_messages.created_by',$id_user);
				$this->db->or_where('app_messages.target_by',$id_user);
			}
			if(isset($limit) && isset($start)){
				$this->db->limit($limit,$start);
			}
			if($search){
				$this->db->like('app_messages.content',$search);
				$this->db->or_like('app_messages.created',$search);
				$this->db->or_like('app_users.email',$search);
				$this->db->or_like('app_users.fullname',$search);
			}
			if($sort){
				$this->db->order_by($sort[0], $sort[1]);
			}else{
				$this->db->order_by('app_messages.id', 'desc');
			}
			$this->db->join('app_users','app_users.id = app_messages.target_by');
			return $this->db->get('app_messages')->result();
		}
	}

}