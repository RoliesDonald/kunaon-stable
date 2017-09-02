<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
     $this->load->model('Model_report','report');
     $this->load->model('Model_order','order');
	}

	public function period(){
      $iDisplayLength = $this->input->get_post('iDisplayLength');
      $iDisplayStart = $this->input->get_post('iDisplayStart');
      $search = $this->input->get_post('sSearch');
      $aaData = array();
      $i = 0;
      if (!empty($iDisplayStart)){
        $i = $iDisplayStart;
      }
      $ColumnSort = array(
        'tr_sales.transaction_number',
        'tr_sales.transaction_number',
        'tr_sales.updated',
        'app_users.fullname',
        'tr_sales.transaction_number',
        'tr_sales.transaction_type',
        'tr_sales.transaction_number',
        'tr_sales.subtotal',
        'tr_sales.tax',
        'tr_sales.discount',
        'tr_sales.grandtotal'
      );
      $sort_key = $this->input->get_post('iSortCol_0');
      $sort_type = $this->input->get_post('sSortDir_0');
      $sort = null;
      if($sort_key && $sort_type){
        $sort = array($ColumnSort[$sort_key],$sort_type);
      }
      $total = $this->report->GetPeriod(null,null,null,true);
      $data =  $this->report->GetPeriod($iDisplayLength,$iDisplayStart,$search,false,$sort);
      if($data){
        foreach($data as $row){
          $i++;
          $aaData[] = array(
             $i,
             'TRN'.$row->transaction_number,
             my_date($row->transaction_date),
             $row->fullname,
             $this->order->ListTable($row->id),
             transaction($row->transaction_type),
             count(json_decode($row->items)),
             price($row->subtotal),
             price($row->tax),
             price($row->discount),
             price($row->grandtotal),
           );
        }
      }
      echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);
	}

  public function menu(){

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
      'en_categories.category_name',
      'en_menu.menu_name',
      'en_menu.id',
      'en_menu.id',
    );

    $sort_key = $this->input->get_post('iSortCol_0');
    $sort_type = $this->input->get_post('sSortDir_0');
    $sort = null;
    if($sort_key && $sort_type){
      $sort = array($ColumnSort[$sort_key],$sort_type);
    }

    $total = $this->model_crud->GetAll('en_menu',null,null,null,true);
    $data =  $this->model_crud->GetAll('en_menu',$iDisplayLength,$iDisplayStart,null,false,$sort);

    if($data){
      foreach($data as $row){
        $i++;
        $aaData[] = array(
           $i,
           $row->category_name,
           $row->menu_name,
           price($this->report->GetMenuItems($row->id_main,$search)),
           price($this->report->GetMenuSales($row->id_main,$search)),
        );
      }
    }
    echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);
  }

  public function casheir(){
    $iDisplayLength = $this->input->get_post('iDisplayLength');
    $iDisplayStart = $this->input->get_post('iDisplayStart');
    $search = $this->input->get_post('sSearch');
    $aaData = array();
    $i = 0;
    if (!empty($iDisplayStart)) {
        $i = $iDisplayStart;
    }

    $ColumnSort = array(
      'tr_sales.updated',
      'tr_sales.updated_by',
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated',
    );

    $sort_key = $this->input->get_post('iSortCol_0');
    $sort_type = $this->input->get_post('sSortDir_0');
    $sort = null;
    if($sort_key && $sort_type){
      $sort = array($ColumnSort[$sort_key],$sort_type);
    }

    $total = $this->report->GetPeriod(null,null,null,true,null,array('tr_sales.updated_by','asc'));
    $data =  $this->report->GetPeriod($iDisplayLength,$iDisplayStart,$search,false,$sort,array('tr_sales.updated_by','asc'));

    if($data){
      foreach($data as $row){
        $i++;
        $cash = $this->report->GetTotalTransaction($row->updated_by,'0',$search);
        $credit = $this->report->GetTotalTransaction($row->updated_by,'1',$search);
        $cheque = $this->report->GetTotalTransaction($row->updated_by,'2',$search);
        $aaData[] = array(
           $i,
           $row->fullname,
           price($cash),
           price($credit),
           price($cheque),
           price($cash+$credit+$cheque),
        );
      }
    }
    echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);
  }

  public function payment(){

    $iDisplayLength = $this->input->get_post('iDisplayLength');
    $iDisplayStart = $this->input->get_post('iDisplayStart');
    $search = $this->input->get_post('sSearch');
    $aaData = array();
    $i = 0;
    if (!empty($iDisplayStart)) {
        $i = $iDisplayStart;
    }

    $ColumnSort = array(
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated',
      'tr_sales.updated'
    );

    $sort_key = $this->input->get_post('iSortCol_0');
    $sort_type = $this->input->get_post('sSortDir_0');
    $sort = null;
    if($sort_key && $sort_type){
      $sort = array($ColumnSort[$sort_key],$sort_type);
    }

    $total = $this->report->GetPeriod(null,null,null,true,null,array('tr_sales.transaction_type','asc'));
    $data =  $this->report->GetPeriod($iDisplayLength,$iDisplayStart,$search,false,$sort,array('tr_sales.transaction_type','asc'));

    if($data){
      foreach($data as $row){
        $i++;
        $aaData[] = array(
           $i,
           transaction($row->transaction_type),
           price($this->report->GetTotalBy($row->transaction_type,'items',$search)),
           price($this->report->GetTotalBy($row->transaction_type,'subtotal',$search)),
           price($this->report->GetTotalBy($row->transaction_type,'tax',$search)),
           price($this->report->GetTotalBy($row->transaction_type,'discount',$search)),
           price($this->report->GetTotalBy($row->transaction_type,'grandtotal',$search)),
        );
      }
    }
    echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);
  }

  public function branch(){
    
    $iDisplayLength = $this->input->get_post('iDisplayLength');
    $iDisplayStart = $this->input->get_post('iDisplayStart');
    $search = $this->input->get_post('sSearch');
    $aaData = array();
    $i = 0;
    if (!empty($iDisplayStart)) {
        $i = $iDisplayStart;
    }

    $ColumnSort = array(
      'en_branch.id',
      'app_countries.name',
      'en_branch.address',
      'en_branch.id', 
      'en_branch.id',
      'en_branch.id', 
      'en_branch.id',
      'en_branch.id'
    );
    $sort_key = $this->input->get_post('iSortCol_0');
    $sort_type = $this->input->get_post('sSortDir_0');
    $sort = null;
    if($sort_key && $sort_type){
      $sort = array($ColumnSort[$sort_key],$sort_type);
    }

    $total = $this->model_crud->GetAll('en_branch',null,null,$search,true);
    $data =  $this->model_crud->GetAll('en_branch',$iDisplayLength,$iDisplayStart,null,false,$sort);

    if($data){
      foreach($data as $row){
        $i++;
        $json = $this->GetApiReport($row->token,$row->vpn,$search);
        $aaData[] = array(
         $i,
         $row->name,
         $row->address,
         $json["data"]["qty"],
         $json["data"]["subtotal"],
         $json["data"]["tax"],
         $json["data"]["discount"],
         $json["data"]["grandtotal"],
       );
      }
    }
    echo json_datatables($this->input->get_post('sEcho'),$aaData,$total);
  }

  private function GetApiReport($token,$url,$search = null){
      $start_date = date('Y').'-01-01';      
      $last_date = date('Y').'-12-31';
      if($search){
        $date = explode('-', $search);
        $start_date = date_db($date[0]);        
        $last_date = date_db($date[1]);
      }
      $api_report = '/api/report';
      $post = array();
      $post['token'] = $token;
      $post['first_date'] = $start_date;
      $post['last_date'] = $last_date;
      $json = $this->curl->simple_post($url.''.$api_report, $post);
      return $result = json_decode($json, true);
  }
  
}