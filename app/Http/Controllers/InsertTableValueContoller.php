<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class InsertTableValueContoller extends Controller
{
 public function __construct()
    {
		
    }
	
	public function index(){
		$fronts =array("12-24","25-49","50-99","100-149","150-249","24-59","60-250");
		$product = array("10","9","8","7","6","9","10");
		foreach( $fronts as $index => $front ) {

			DB::insert('insert into commission_rates (shirts, rate) values (:shirts, :rate)',['shirts' => $front , 'rate' => $product[$index]]);
		}
	}
}
