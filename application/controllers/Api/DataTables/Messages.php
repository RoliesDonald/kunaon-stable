<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

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
    $this->load->model('Model_messages','model');
	}

	public function index(){

	    $iDisplayLength = $this->input->get_post('iDisplayLength');
      $iDisplayStart = $this->input->get_post('iDisplayStart');
      $search = $this->input->get_post('sSearch');
      $type = $this->input->get_post('type');

      $aaData = array();
      $i = 0;
      if (!empty($iDisplayStart)) {
          $i = $iDisplayStart;
      }

      $ColumnSort = array(
        'app_messages.id',
        'app_messages.id',
        'app_users.fullname',
        'app_messages.subject',
        'app_messages.content',
        'app_messages.id',
      );

      $sort_key = $this->input->get_post('iSortCol_0');
      $sort_type = $this->input->get_post('sSortDir_0');
      $sort = null;
      if($sort_key && $sort_type){
        $sort = array($ColumnSort[$sort_key],$sort_type);
      }

      $total = $this->model->GetData(null,null,$search,true,null,$type);
      $data =  $this->model->GetData($iDisplayLength,$iDisplayStart,$search,false,$sort,$type);

      if($data){
      	foreach($data as $row){
      		$i++;
      		$aaData[] = array(
             '<input type="checkbox" value="'.$row->id_message.'"/>',
             my_date($row->created),
             $row->fullname,
             $row->subject,
             substr($row->content, 0,50),
             crud_action('backoffice/messages/',$row->id_message),
           );
      	}
      }
      echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);

	}

  

}