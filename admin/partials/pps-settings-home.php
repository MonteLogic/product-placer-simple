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


include_once plugin_dir_path( dirname( __FILE__ ) ) .  'database\read-table-data.php';

$valueFromDB = Read_Table_Data::display_table_pps_values();

function echo_some_value(){

    echo 'value9499';
}



function pps_sidebar_options() {
	echo 'Customize your Sidebar Options';

}



function pps_sidebar_description() {


    $descriptionValueFromCA = Read_Table_Data::display_table_pps_values()->description;

    $descriptionWpo = esc_attr( get_option( 'product_description' ) );
	
    if(empty($descriptionValueFromCA)){
 
            ?>
            <textarea name="product_description" class="widefat" cols="50" rows="5" placeholder="Description" ><?php echo $descriptionWpo?></textarea>
            <p class="description">Write product name</p>
            <?php


        }

    if(!empty($descriptionValueFromCA)){

        // So both statements are true $descriptionValueFromCA and Wpo are not empty. I want to spit out $descriptionWpo.

        if(empty($descriptionWpo)){
        // Stuff that's in here is stuff that was already in Commerce Abbreviated because the user was using said theme.
        ?>
        <textarea name="product_description" class="widefat" cols="50" rows="5" placeholder="Description" ><?php echo $descriptionValueFromCA?></textarea>
        <p class="description">Write description of product.</p>
        
        <?php
        return 0;
        }

        if(!empty($descriptionWpo)){
        // Stuff that's in here is stuff that was already in Commerce Abbreviated because the user was using said theme.
        ?>
        <textarea name="product_description" class="widefat" cols="50" rows="5" placeholder="Description" ><?php echo $descriptionWpo?></textarea>
        <p class="description">Write description of product.</p>
        
        <?php
        }
        
    }

}


function pps_product_url(){

    // The variable below this, could have naming conflicts.
    $linkProductUrlFromCA = Read_Table_Data::display_table_pps_values()->link_url;

    // This field isn't automatically created in the database unless the save changes
    // button is interacted with.

    $ProductPageLinkWpo = esc_attr( get_option( 'product_page_link' ) );

    if(empty($linkProductUrlFromCA )){

        ?>
        <input type="text" name="product_page_link"  value ="<?php echo $linkProductUrlFromCA ?> " placeholder="Enter link to your product here." />
        <p class="description">Include link to your product.</p>
        <?php

        }
    
    
    
    if(!empty($linkProductUrlFromCA )){


            if(empty($ProductPageLinkWpo)){

                ?>
                <input type="text" name="product_page_link" value ="<?php echo $linkProductUrlFromCA ?> " placeholder="Enter link to your product here." />         
                <p class="description">Include link to your product.</p>
               
                <?php
                return 0;
            }
    
            if(!empty($ProductPageLinkWpo)){


                ?>
                <input type="text" name="product_page_link" value ="<?php echo $ProductPageLinkWpo ?> " placeholder="Enter link to your product here." />         
                <p class="description">Include link to your product.</p>
                <?php


            }
    

            // echo '<input type="text"  value ="'.$linkProductUrlFromCA.'" placeholder="Description" />
            
            // <p class="description">Include link to your product.</p>';
    
        }
    
    
    


}





function pps_sidebar_profile() {
    // I would like to change product_picture_var to product_picture_url
    $imgURLValueFromDB = Read_Table_Data::display_table_pps_values()->product_picture_var;




    if(empty($imgURLValueFromDB)){

        // Keep this line because it has good button showing logic.
    echo '<button type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
 
    }








    if(!empty($imgURLValueFromDB)){

        echo '<button type="button" class="button button-secondary" value="Replace Product Picture" id="upload-button"><span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Replace Product Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><span class="sunset-icon-button dashicons-before dashicons-no"></span> Remove</button>';

                        
    }
            

}

function pps_star_rating() {

    $starRating = Read_Table_Data::display_table_pps_values()->star_rating;

	if(empty($starRating)){

	echo 'You have not added this value to the database.';

    }

    if(!empty($starRating)){
            echo '<input type="text"  value ="'.$starRating.'" placeholder="Description" />
    
                        <p class="description">Write product name</p>';
                    
    }




}



function product_sidebar_name() {
	// '.Read_Table_Data::display_table_pps_values().'

    $nameValueFromDB = Read_Table_Data::display_table_pps_values()->name;


	if(empty($nameValueFromDB)){

	echo 'You have not added this value to the database.';

    }

    if(!empty($nameValueFromDB)){
            echo '<input type="text"  value ="'.$nameValueFromDB.'" placeholder="Description" />
    
                        <p class="description">Write product name</p>';

    }
    

}



function link_button_text() {
	// '.Read_Table_Data::display_table_pps_values().'

    // I want these reading of database values to be together line upon line.
    $linkButtonTextFromDB = Read_Table_Data::display_table_pps_values()->link_text;

// ToDo: Make logic for if the value isn't there.

    if(!empty($linkButtonTextFromDB)){
            echo '<input type="text" value ="'.$linkButtonTextFromDB.'" placeholder="" />
    
                        <p class="description">Write the text that will appear on button.</p>';
                    
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
	$descriptionWpo = Read_Table_Data::display_table_pps_values()->text;

?>

<div class="pps-sidebar-preview">
    <div class="pps-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture"
                style="background-image: url(<?php print $picture; ?>);"></div>
        </div>
        <h1 class="pps-username"><?php print $productName; ?></h1>
        <h2 class="pps-description"><?php print $descriptionWpo; ?></h2>
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