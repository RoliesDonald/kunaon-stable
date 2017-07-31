<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
    $this->table = 'en_menu';
	}

	public function index(){

		$iDisplayLength = $this->input->get_post('iDisplayLength');
    $iDisplayStart = $this->input->get_post('iDisplayStart');
    $search = $this->input->get_post('sSearch');
    $aaData = array();
    $i = 0;
    if (!empty($iDisplayStart)) {
        $i = $iDisplayStart;
    }

    $ColumnSort = array(
      'en_menu.id',
      'en_menu.id',
      'en_menu.menu_name',
      'en_categories.category_name',
      'en_menu.price',
      'en_menu.description',
      'en_menu.id'
    );

    $sort_key = $this->input->get_post('iSortCol_0');
    $sort_type = $this->input->get_post('sSortDir_0');
    $sort = null;
    if($sort_key && $sort_type){
      $sort = array($ColumnSort[$sort_key],$sort_type);
    }

    $total = $this->model_crud->GetAll($this->table,null,null,$search,true);
    $data =  $this->model_crud->GetAll($this->table,$iDisplayLength,$iDisplayStart,$search,false,$sort);

    if($data){
    	foreach($data as $row){
    		$i++;
    		$aaData[] = array(
           '<input type="checkbox" value="'.$row->id_main.'"/>',
           $i,
           $row->menu_name,
           $row->category_name,
           price($row->price),
           $row->description,
           crud_action('backoffice/reference/menus/',$row->id_main),
        );
    	}
    }
    echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);

	}

  public function category(){

      $iDisplayLength = $this->input->get_post('iDisplayLength');
      $iDisplayStart = $this->input->get_post('iDisplayStart');
      $search = $this->input->get_post('sSearch');
      $aaData = array();
      $i = 0;
      if (!empty($iDisplayStart)) {
          $i = $iDisplayStart;
      }

      $ColumnSort = array('id','id','category_name','id');
      $sort_key = $this->input->get_post('iSortCol_0');
      $sort_type = $this->input->get_post('sSortDir_0');
      $sort = null;
      if($sort_key && $sort_type){
        $sort = array($ColumnSort[$sort_key],$sort_type);
      }

      $total = $this->model_crud->GetAll('en_menu_categories',null,null,$search,true);
      $data =  $this->model_crud->GetAll('en_menu_categories',$iDisplayLength,$iDisplayStart,$search,false,$sort);

      if($data){
        foreach($data as $row){
          $i++;
          $aaData[] = array(
                 '<input type="checkbox" value="'.$row->id_main.'"/>',
                 $i,
                 $row->category_name,
                 crud_action('backoffice/category/menus/',$row->id_main),
               );
        }
      }
      echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);
  }

}