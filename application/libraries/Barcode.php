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

class Barcode{

	public function __Construct(){
		$this->CI  = get_instance();
		require_once APPPATH.'third_party/barcode/BarcodeGenerator.php';
	}

	public function generateHTML($value){
		require_once APPPATH.'third_party/barcode/BarcodeGeneratorHTML.php';
		$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
		return  $generator->getBarcode($value, $generator::TYPE_STANDARD_2_5);
	}
	
	public function generateImage($value){
		require_once APPPATH.'third_party/barcode/BarcodeGeneratorJPG.php';
		$generator = new Picqer\Barcode\BarcodeGeneratorJPG();
		$app_barcode = strtoupper(setting('app_barcode'));
		if($app_barcode=='TYPE_UPC_A'){
			return  '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value, $generator::TYPE_UPC_A)) . '">';
		}else if($app_barcode=='TYPE_UPC_E'){
			return  '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value, $generator::TYPE_UPC_E)) . '">';
		}else{
			return  '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value, $generator::TYPE_EAN_13)) . '">';
		}
		
	}
}