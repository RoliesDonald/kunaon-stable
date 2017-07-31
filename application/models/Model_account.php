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

class Model_account extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		$this->load->database();
		$this->setApp();
	}

	//==== Authentication ====\\
	public function Auth($email,$password = null){
		$this->db->where('is_member','0');
		$this->db->where('actived','1');
		$this->db->where('email',$email);
		if($password){
			$this->db->where('password',md5($password));
		}
		$this->db->limit(1);
		return $this->db->get('app_users')->row();
	}
	

	//==== Roles and Menus ====\\
	public function Controller($id_user){
		$this->db->distinct();
		$this->db->join('app_menus','app_menus.id = app_user_menus.menu_id');
		$this->db->join('app_users','app_users.id = app_user_menus.user_id');
		$this->db->select('app_menus.controller');
		return $this->db->get('app_user_menus')->result();
	}
	

	//==== Get Priviladges ====\\
	public function Roles($id_user,$array = false){
		$this->db->where('app_user_role.user_id',$id_user);
		$this->db->distinct();
		$this->db->join('app_roles','app_roles.id = app_user_role.role_id');
		$this->db->join('app_users','app_users.id = app_user_role.user_id');
		$this->db->group_by('app_roles.id');
		$data = $this->db->get('app_user_role')->result();
		if(!$array){
			if(count($data)>1){
				$val = array();
				foreach($data as $row){
					$val[] = ucwords($row->role_name);
				}
				return implode(', ', $val);
			}else{
				return ucwords($data[0]->role_name);
			}
		}else if($array){
			$val = array();
			foreach($data as $row){
				$val[] = ucwords($row->role_id);
			}
			return $val;
		}
		return false;
	}
	

	//==== Get User Profile ====\\
	public function Profile($id_user){
		$this->db->where('id',$id_user);
		return $this->db->get('app_users')->row();
	}
	


	//==== Get Menu Users ====\\
	public function user_menu($id = null){
		if(!$id){
			$id = $this->session->userdata('ID_USER');
		}
		$this->db->distinct();
		$this->db->order_by('app_menus.id');
		$this->db->select('app_user_menus.menu_id AS MENU_ID');
		$this->db->where('app_user_menus.user_id',$id);
		$this->db->join('app_menus','app_menus.id = app_user_menus.menu_id');
		$result = $this->db->get('app_user_menus')->result_array();
		return  array_column($result, 'MENU_ID');
	}

	//==== Parent Menu ====\\
	public function get_menu($all = false,$selected = null){
		$menus = $this->user_menu();
		if($selected){
			$menus = $selected;
		}
		$this->db->where('parent_id',null);
		if(!$all){
			$this->db->where('pages','0');
		}
		$this->db->where_in('id',$menus);
		$this->db->order_by('order');
		$data = $this->db->get('app_menus')->result_array();
		foreach($data as $d){
			$this->get_menu_child($d,$menus,$all);
		}
	}

	//==== Child Menu ====\\
	public function get_menu_child($parent,$menus,$type){
		$this->db->where('parent_id',$parent["id"]);
		$this->db->where_in('id',$menus);
		$this->db->order_by('order');
		$result = $this->db->get('app_menus')->result_array();
		$link = base_url().''.$parent['url'];
		$icon = $parent["icon"] ? $parent["icon"] : "fa fa-circle";
		if(count($result)>0){
			if(!$type){
				echo '<li class="treeview">';
					echo '<a href="#">';
						echo '<i class="fa '.$icon.'"></i> <span>'.$parent["menu_name"].'</span>';
					echo '</a>';
					echo '<ul class="treeview-menu">';
					foreach($result as $rs){
						$this->get_menu_child($rs,$menus,$type); 
					}
					echo '</ul>';
				echo '</a>';
			}else{
				echo '<li class="">';
					echo '<input type="checkbox" class="flat-red parent parent_'.$parent["id"].'" value="'.$parent["id"].'" name="menu[]" id="menu" /> '.$parent["menu_name"];
					echo '<ul class="">';
					foreach($result as $rs){
						$this->get_menu_child($rs,$menus,$type); 
					}
					echo '</ul>';
				echo '</a>';
			}
			
		}else{
			if(!$type){
				echo '<li><a href="'.$link.'"><i class="fa '.$icon.'"></i> <span>'.$parent["menu_name"].'</span></a></li>';
			}else{
				echo '<li><input type="checkbox"  id="parent_'.$parent["id"].'_'.$parent["parent_id"].'" class="flat-red child child_'.$parent["parent_id"].'" value="'.$parent["id"].'" name="menu[]" id="menu" /> '.$parent["menu_name"].'</li>';
			}
		}
		echo '</li>';
	}

	//==== Email Check ====\\
	public function email_check($id = null,$email){
		if($id){
			$this->db->where('id !='.$id);
		}
		$this->db->where('is_member','0');
		$this->db->limit(1);
		$this->db->where('email',$email);
		return $this->db->get('app_users')->row();
	}

	//==== All User ====\\
	public function GetAllUsers($limit = null,$start = null,$search = null,$count = false,$sort = null){
		$this->db->select('app_users.id as id_main,app_users.*');
		$this->db->where('app_users.is_root','0');
		$this->db->where('is_member','0');
		if($search){
			$this->db->like('app_users.email',$search);
			$this->db->or_like('app_users.fullname',$search);
			$this->db->or_like('app_users.phone',$search);
			$this->db->or_like('app_users.address',$search);
		}
		if($count){
			return $this->db->get('app_users')->num_rows();
		}else{
			if(isset($limit) && isset($start)){
				$this->db->limit($limit,$start);
			}
			if($sort){
				$this->db->order_by($sort[0], $sort[1]);
			}else{
				$this->db->order_by('app_users.id', 'desc');
			}
			return $this->db->get('app_users')->result();
		}
		
	}

	//=== Send Reset Password===\\

	public function SendRequest($email){
		$this->db->where('email',$email);
		$this->db->limit(1);
		$users = $this->db->get('app_users')->row();

		$this->db->where('menu_id',11);
		$this->db->group_by('user_id');
		$data = $this->db->get('app_user_menus')->result();

		foreach($data as $row){
			$this->db->insert('app_messages',array(
				'subject'=>'Request , reset password',
				'content'=>'Please reset password for user '.$users->fullname,
				'is_read'=>'0',
				'is_draft'=>'0',
				'is_deleted'=>'0',
				'from_by'=>$users->id,
				'target_by'=>$row->user_id,
				'created'=>date("Y-m-d H:i:s"),
				'created_by'=>$users->id
			));
		}

		
	}

	
	//==== Member ====\\

	public function GetMember($limit = null,$start = null,$search = null,$count = false,$sort = null){
		if($search){
			$this->db->like('app_users.email_address',$search);
			$this->db->or_like('app_users.fullname',$search);
			$this->db->or_like('app_users.phone',$search);
			$this->db->or_like('app_users.address',$search);
			$this->db->or_like('app_users.id',$search);
		}
		$this->db->where('is_member','1');
		if($count){
			return $this->db->get('app_users')->num_rows();
		}else{
			if(isset($limit) && isset($start)){
				$this->db->limit($limit,$start);
			}
			if($sort){
				$this->db->order_by($sort[0], $sort[1]);
			}else{
				$this->db->order_by('app_users.id', 'desc');
			}
			return $this->db->get('app_users')->result();
		}
	}

	//==== Allow Pages ====\\
	public function AllowPages($id_user,$pages){
		$this->db->distinct();
		$this->db->order_by('app_menus.id');
		$this->db->where('app_menus.id !=',27);
		$this->db->where('app_user_menus.user_id',$id_user);
		$this->db->where('app_menus.pages',$pages);
		$this->db->join('app_menus','app_menus.id = app_user_menus.menu_id');
		$result = $this->db->get('app_user_menus')->result();
		if($result){
			return true;
		}
		return false;
	}

	//==== Create User ====\\
	public function CreateAccount($data,$id = null){
		$menu = $data['menu'];
		$roles = $data['roles'];
		$parent = array();
		foreach($menu as $m){
			$this->db->where('id',$m);
			$get_menu = $this->db->get('app_menus')->row();
			if($get_menu->parent_id){
				$parent[] = $get_menu->parent_id;
			}
			if($get_menu->pages==0){
				$parent[] = 1;
			}
		}
		$temp = array_merge($parent,$menu);
		sort($temp);
		$user_menu = array_unique($temp);

		if($id){

		
			// UPDATE USER
			$this->db->where('id',$id);
			$this->db->update('app_users',array(
				'email'=>$data['email'],
				'updated'=>date("Y-m-d H:i:s"),
				'updated_by'=>account_name(true),
			));

			// RESET ROLE
			$this->db->where('user_id',$id);
			$this->db->delete('app_user_role');

			foreach($roles as $r){
				$this->db->insert('app_user_role',array(
					'user_id'=>$id,
					'role_id'=>$r
				));
			}

			// RESET MENU
			$this->db->where('user_id',$id);
			$this->db->delete('app_user_menus');
			
			foreach($user_menu as $um){
				$this->db->insert('app_user_menus',array(
					'user_id'=>$id,
					'menu_id'=>$um
				));
			}

			return $id;

		}else{

			// INSERT USER
			$this->db->insert('app_users',array(
				'email'=>$data['email'],
				'fullname'=>$data['email'],
				'password'=>md5(setting('app_userpass')),
				'expired'=>date('Y-m-d', strtotime(' +365 day')),
				'created'=>date("Y-m-d H:i:s"),
				'created_by'=>account_name(true),
				'actived'=>'1',
				'is_member'=>'0',
				'is_root'=>'0'
			));
			
			$id_user = $this->db->insert_id();
			
			// USER ROLE
			foreach($roles as $r){
				$this->db->insert('app_user_role',array(
					'user_id'=>$id_user,
					'role_id'=>$r
				));
			}

			// USER MENU
			foreach($user_menu as $um){
				$this->db->insert('app_user_menus',array(
					'user_id'=>$id_user,
					'menu_id'=>$um
				));
			}

			return $id_user;
		}

	}


	//== Setting Up First Time==||
	private function setApp(){
		$this->db->where('name','app_token');
		$app = $this->db->get('app_setting')->row();
		if(!$app->value){
			$this->model_crud->UpdateSetting('app_token',gen_token());
			$this->model_crud->UpdateSetting('app_published',date("Y-m-d H:i:s"));
			$this->model_crud->UpdateSetting('app_date_installed',date("Y-m-d H:i:s"));
			$this->model_crud->UpdateSetting('app_vpn',base_url());
			$this->model_crud->UpdateSetting('app_installed','true');
		}
	}

}