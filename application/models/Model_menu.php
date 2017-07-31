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

class Model_menu extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		$this->load->database();
	}

	public function GetMenu($val=null,$cat=null){
		if($cat){
			if($val){
				$this->db->where('en_menu.category_id',$cat);
				$this->db->like('en_menu.menu_name',$val);
			}else{
				$this->db->where('en_menu.category_id',$cat);
			}
		}else{
			if($val){
				$this->db->like('en_menu.menu_name',$val);
				$this->db->or_like('en_categories.category_name',$val);
			}
		}
		$this->db->select('en_menu.*,en_categories.category_name');
		$this->db->order_by('en_categories.category_name');
		$this->db->order_by('en_menu.menu_name');
		$this->db->join('en_categories','en_categories.id = en_menu.category_id');
		return $this->db->get('en_menu')->result();
	}

	

}