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

class Myinput{

	public function __Construct(){
		$this->CI  = get_instance();
		require_once APPPATH.'third_party/html_purifier/HTMLPurifier.auto.php';
	}

	public function Clean($dirty_html){

		$config = HTMLPurifier_Config::createDefault();
		$config->set('Attr.AllowedClasses',array('header'));
		$config->set('AutoFormat.AutoParagraph',true);
		$config->set('AutoFormat.RemoveEmpty',true);
		$config->set('HTML.Doctype','HTML 4.01 Strict');


		$purifier = new HTMLPurifier($config);
		$clean_html = $purifier->purify($dirty_html);
		return strip_tags($clean_html);
	}

}