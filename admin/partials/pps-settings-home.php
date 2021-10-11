<?php

/**
 * Provide a admin area view for the plugin
 *
 * This should technically be where the first page of the plugin logic is, so I should move hunderds of 
 * lines of code from 'admin\class-product-placer-simple-admin.php' to here. 
 *
 * @link       https://github.com/dchavours/
 * @since      1.0.0
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->



<?php


include plugin_dir_path( dirname( __FILE__ ) ) .  'database\read-table-data.php';

function echo_some_value(){

    echo 'value9499';
}



function pps_sidebar_options() {
	echo 'Customize your Sidebar Options';

}



function pps_sidebar_description() {


    $descriptionValueFromDB = Read_Table_Data::display_table_pps_values()->description;
	
    if(empty($descriptionValueFromDB)){

	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" />
			<p class="description">Write short product description</p>';
 
        }


    if(!empty($descriptionValueFromDB)){

        echo '<input type="text" name="product_sidebar_name" value ="'.$descriptionValueFromDB.'" placeholder="Description" />
    
        <p class="description">Write product name</p>';

    }





}

function pps_sidebar_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	echo '<input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
			<input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />';

}




function product_sidebar_name() {
	// '.Read_Table_Data::display_table_pps_values().'

    $nameValueFromDB = Read_Table_Data::display_table_pps_values()->name;


	if(empty($nameValueFromDB)){

	$picture = esc_attr( get_option( 'profile_picture' ) );
	echo '<input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
			<input type="hidden" id="profile-picture" name="profile_picture" value="'.$nameValueFromDB.'" />';
		}

    if(!empty($nameValueFromDB)){
            echo '<input type="text" name="product_sidebar_name" value ="'.$nameValueFromDB.'" placeholder="Description" />
    
                        <p class="description">Write product name</p>';
                    
        }
    

}






/**
 * I feel like the majority of html code from class-product-placer-simple-admin should go into here.
 * I just go to figure out how to make it happen.
 * 
 * 
 */



?>

<h1>PPS Options</h1>
<?php settings_errors(); ?>

<?php 
	
	$picture = esc_attr( get_option( 'profile_picture' ) );
	$productName = esc_attr( get_option( 'product_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	$fullName = $productName;
	$description = esc_attr( get_option( 'user_description' ) );
	
?>

<div class="pps-sidebar-preview">
    <div class="pps-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture"
                style="background-image: url(<?php print $picture; ?>);"></div>
        </div>
        <h1 class="pps-username"><?php print $fullName; ?></h1>
        <h2 class="pps-description"><?php print $description; ?></h2>
        <div class="icons-wrapper">

        </div>
    </div>
</div>

<form method="post" action="options.php" class="pps-general-form">

    <?php 


    settings_fields( 'pps-settings-group');
    // settings_fields( $option_group:string )
    do_settings_sections( 'ParentPagePPS' );
    // do_settings_sections( $page:string )



    ?>

    <?php submit_button(); ?>


</form>