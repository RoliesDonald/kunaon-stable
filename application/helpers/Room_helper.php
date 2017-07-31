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

if (!function_exists('table_status')) {
    function table_status($id,$name) {
        $CI = get_instance();
        $CI->load->model('Model_room','room');
        $data = $CI->room->TableStatusByRoom($id);
        return $data[$name];
    }
}

if (!function_exists('get_table')) {
    function get_table($id) {
        $CI = get_instance();
        $CI->load->model('Model_room','room');
        $data = $CI->room->TableByRoom($id);
        return $data;
    }
}


