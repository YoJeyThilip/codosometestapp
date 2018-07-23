<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UserMetaController;

use Auth;

use DB;

class tablesController extends Controller
{ 
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	 
    public function __construct()
    {
		$this->middleware('auth');
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {		
	
	
		$style_form_type = $_POST[ 'type' ];
		global $wpdb;
		
		if( isset( $style_form_type )){
		
			$style_id = $_POST[ 'id' ] ;
			$style_name = $_POST[ 'name' ] ;
			$style_type = $_POST[ 'style' ] ;
			$style_product_images = $_POST[ 'product_images' ] ;
			$style_price = $_POST[ 'price' ] ;
			global $wpdb;
		
			if( $style_form_type == "delete" ){
				
				$result = $wpdb->query( "DELETE FROM style WHERE id =".$style_id );
			}
			
			if( $style_form_type == "update" ){
				
				$result = $wpdb->query( "UPDATE style SET name='". $style_name ."' , style='". $style_type ."' , product_images='". $style_product_images ."' , price='". $style_price ."'  WHERE id=" . $style_id );
				
			}
			
			if( $style_form_type == "new" ){
				
				$result = $wpdb->query( "INSERT INTO style (name, style, product_images, price) VALUES ('". $style_name ."','". $style_type ."''". $style_product_images ."','". $style_price ."')" );
				
			}
		
		}
		
		$result = $wpdb->get_results( "SELECT * FROM style" );
		
		
		
		return view( 'Order.Single' , $OrdersVariables );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
