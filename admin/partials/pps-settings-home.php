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

$valueFromDB = Read_Table_Data::display_table_pps_values();

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


        ?>
        <textarea name="product_sidebar_name" class="widefat" cols="50" rows="5" placeholder="Description" ><?php echo $descriptionValueFromDB?>
        
        </textarea>
        <p class="description">Write product name</p>
        

<?php

    }





}

function pps_sidebar_profile() {
    // I would like to change product_picture_var to product_picture_url
    $imgURLValueFromDB = Read_Table_Data::display_table_pps_values()->product_picture_var;




    if(empty($imgURLValueFromDB)){
	$picture = esc_attr( get_option( 'profile_picture' ) );

    echo '<button type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
 
    }




    if(!empty($imgURLValueFromDB)){

        echo '<button type="button" class="button button-secondary" value="Replace Product Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Replace Product Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="sunset-icon-button dashicons-before dashicons-no"></span> Remove</button>';

                        
    }
            

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


<!-- 
    The following code is used to display the preview of what is to be show on the widget.


-->


<h1>PPS Options</h1>
<?php settings_errors(); ?>

<?php 
	
	$picture =  Read_Table_Data::display_table_pps_values()->product_picture_var;
	$productName = Read_Table_Data::display_table_pps_values()->name;
	$description = Read_Table_Data::display_table_pps_values()->text;
	
?>

<div class="pps-sidebar-preview">
    <div class="pps-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture"
                style="background-image: url(<?php print $picture; ?>);"></div>
        </div>
        <h1 class="pps-username"><?php print $productName; ?></h1>
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