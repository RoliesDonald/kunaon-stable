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

class Model_dashboard extends CI_Model{

	public function __Construct(){
		parent::__Construct();
		$this->load->database();
		$this->load->model('Model_report','report');
		date_default_timezone_set(setting('app_timezone'));
	}

	private function GetCurentSalesItem(){
		$this->db->where('transaction_date >= CURDATE()');
		$this->db->where('transaction_type !=','-1');
		$sales = $this->db->get('tr_sales')->result();
		return $sales;
	}

	private function GetSalesMenu(){
		$sales = $this->GetCurentSalesItem();
		$menu = Array();
		foreach($sales as $row){
			$items = json_decode($row->items);
			foreach($items as $item){
				$menu[] = $item->menu;
			}
		}
		return array_unique(array_slice($menu, 0,4));
	}

	private function GetTotalItemsToday(){
		$sales = $this->GetCurentSalesItem();
		$menu = Array();
		foreach($sales as $row){
			$items = json_decode($row->items);
			foreach($items as $item){
				$menu[] = $item->qty;
			}
		}
		return array_sum(array_slice($menu, 0,4));
	}

	private function cmp($a,$b){
		$a = $a['value'];
		$b = $b['value'];
		if($a==$b)
			return 0;
		return ($a > $b) ? -1 : 1;
	}

	private function FindPaymentYear($type){
		return array(
			$this->report->GetTotalBy($type,'grandtotal','01/01/'.date('Y').'-31/01/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/02/'.date('Y').'-28/02/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/03/'.date('Y').'-31/03/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/04/'.date('Y').'-30/04/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/05/'.date('Y').'-31/05/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/06/'.date('Y').'-30/06/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/07/'.date('Y').'-31/07/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/08/'.date('Y').'-31/08/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/09/'.date('Y').'-30/09/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/10/'.date('Y').'-31/10/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/11/'.date('Y').'-30/11/'.date('Y')),
			$this->report->GetTotalBy($type,'grandtotal','01/12/'.date('Y').'-31/12/'.date('Y'))
		);
	}

	public function GetPieChart(){
		$total_today = $this->GetTotalItemsToday();
		$data = $this->GetCurentSalesItem();
		$menus = $this->GetSalesMenu();
		$count = Array();
		$result = Array();
		foreach ($menus as $m) {
			$count[] = 0;
		}
		foreach($data as $row){
			$items = json_decode($row->items);
			foreach($items as $item){
				$i = 0;
				foreach($menus as $m){
					if($m==$item->menu){
						$count[$i]+=$item->qty;
					}
					$i++;
				}
			}
		}
		$sum = array_sum($count);
		$perc = array();
		foreach($count as $c){
			$perc[] = floor((float)($c*100)/$sum);
		}

		$j = 0;
		foreach($menus as $m){
			$color = sprintf('#%06X',mt_rand(0,0xFFFFFF));
			$result[] = array(
				'label'=>$m,
				'value'=>$perc[$j],
				'color'=>$color,
				'highlight'=>$color
			);
			$j++;
		}
		usort($result, array($this,"cmp"));
		return $result;
	}

	public function FrontOffice(){

		$this->db->where('created >= CURDATE()');
		$this->db->where('transaction_type','-1');
		$today_order = $this->db->get('tr_sales')->num_rows();

		$this->db->where('transaction_date >= CURDATE()');
		$this->db->where('transaction_type !=','-1');
		$today_sales = $this->db->get('tr_sales')->num_rows();

		$this->db->where('is_member','1');
		$current_member = $this->db->get('app_users')->num_rows();

		$this->db->where('is_empty','0');
		$empty = $this->db->get('en_tables')->num_rows();

		$count_table = $this->db->get('en_tables')->num_rows();

		$table_usage = $count_table == 0 ? 0 : (float)($empty/$count_table)*100;

		$menu = $this->model_crud->GetAll('en_menu',4,0,null,false,null);

		return array(
			'today_order'=>$today_order,
			'today_sales'=>$today_sales,
			'current_member'=>$current_member,
			'table_usage'=>$table_usage,
			'menu'=>$menu,
			'pie_chart'=>json_encode($this->GetPieChart())
		);
	}

	
	public function Backoffice(){

		$start_date = date('Y').'-01-01';			
		$last_date = date('Y').'-12-31';

		// Transaction 
		$this->db->where('tr_sales.transaction_type !=','-1');
		$this->db->where('tr_sales.transaction_date >=',$start_date);
		$this->db->where('tr_sales.transaction_date <=',$last_date);
		$sales = $this->db->get('tr_sales')->result();
		$transaction = count($sales);

		// Branch
		$branch = $this->db->get('en_branch')->num_rows();

		// Net Sales
		$this->db->select_sum('tr_sales.grandtotal');
		$this->db->where('tr_sales.transaction_type !=','-1');
		$this->db->where('tr_sales.transaction_date >=',$start_date);
		$this->db->where('tr_sales.transaction_date <=',$last_date);
		$net_sales = $this->db->get('tr_sales')->row()->grandtotal;

		// Items
		$count_item = 0;
		foreach($sales as $s){
			$items = json_decode($s->items);
			$count_item+=count($items);
		}

		// Payment Method
		$cash_total = $this->report->GetTotalBy('0','grandtotal',null);
		$credit_total = $this->report->GetTotalBy('1','grandtotal',null);
		$cheque_total = $this->report->GetTotalBy('2','grandtotal',null);
		$total_payment = $cash_total + $credit_total + $cheque_total;

		$payment = array();
		$payment[] = array(
			'label'=>'Cash',
			'value'=>$cash_total <=0 ? 0 : floor((float)($cash_total*100)/$total_payment),
			'color'=>sprintf('#%06X',mt_rand(0,0xFFFFFF)),
			'highlight'=>sprintf('#%06X',mt_rand(0,0xFFFFFF))
		);
		$payment[] = array(
			'label'=>'Credit',
			'value'=>$cash_total <=0 ? 0 : floor((float)($credit_total*100)/$total_payment),
			'color'=>sprintf('#%06X',mt_rand(0,0xFFFFFF)),
			'highlight'=>sprintf('#%06X',mt_rand(0,0xFFFFFF))
		);
		$payment[] = array(
			'label'=>'Cheque',
			'value'=>$cash_total <=0 ? 0 : floor((float)($cheque_total*100)/$total_payment),
			'color'=>sprintf('#%06X',mt_rand(0,0xFFFFFF)),
			'highlight'=>sprintf('#%06X',mt_rand(0,0xFFFFFF))
		);

		$barchart = array(
			'cash'=>$this->FindPaymentYear('0'),
			'credit'=>$this->FindPaymentYear('1'),
			'cheque'=>$this->FindPaymentYear('2'),
		);

	
		return array(
			'pin_transaction'=>$transaction,
			'pin_branch'=>$branch,
			'pin_net_sales'=>$net_sales,
			'pin_menu'=>$count_item,
			'pie_payment'=>json_encode($payment),
			'transaction'=>$this->report->GetPeriod(7,0,null,false,null),
			'barchart'=>json_encode($barchart)
		);

	}

}