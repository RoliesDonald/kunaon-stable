<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

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
    $this->app->auth(true);
    $this->table = 'en_banks';
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

      $ColumnSort = array('en_banks.id','en_banks.id','en_banks.bank_name','app_countries.name','en_banks.id');
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
             $row->bank_name,
             $row->name,
             crud_action('backoffice/reference/banks/',$row->id_main),
           );
      	}
      }
      echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);

	}

  

}