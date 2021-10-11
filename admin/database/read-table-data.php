<?php


class Read_Table_Data{


    	// Returns a string.
        // Read_Table_Data::display_table_pps_values();

	public static function display_table_pps_values(){

		global $wpdb;
		
		$result = $wpdb->get_row( "SELECT * FROM `wp_ppsimple` ORDER BY `name` LIMIT 50 " );

//		$valueForView = $result->name;
		

		// I would like to return all of this as an array and then iterate  over it. 

		return $result;
		
		}





}