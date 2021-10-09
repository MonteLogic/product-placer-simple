<?php


class Read_Table_Data{


    	// Returns a string.

	function display_table_pps_values(){

		global $wpdb;
		
		$result = $wpdb->get_row( "SELECT * FROM `wp_ppsimple` ORDER BY `name` LIMIT 50 " );

		$valueForView = $result->name;

		if (!empty($valueForView)){

		echo $result->name;

	}

		return $valueForView;
		
		}





}