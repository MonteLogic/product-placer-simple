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



function pps_sidebar_options() {
	echo 'Customize your Sidebar Options';

}



function pps_sidebar_description() {


    $descriptionCA = get_option( 'widget_ca_theme' )[2]['productText'];
    $descriptionOp = esc_attr( get_option( 'product_description' ) );


    ?>
    <textarea name="product_description" class="widefat" cols="50" rows="5" placeholder="Description"><?php 
    echo (!$descriptionOp ) ? $descriptionCA : $descriptionOp ?></textarea>
    <p class="description">Write product name</p>
    <?php


}


function pps_product_url(){

    // The variable below this, could have naming conflicts.
    $linkProductCA = get_option( 'widget_ca_theme' )[2]['linkUrl'];
    $linkProductOp= esc_attr( get_option( 'product_page_link' ) );
    
    ?>
    <input type="text" name="product_page_link"  
    value ="<?php echo (!$linkProductCA ) ? $linkProductCA : $linkProductOp ?> " placeholder="Enter link to your product here." />
    <p class="description">Include link to your product.</p>
    <?php


}



function pps_sidebar_profile() {
    // I would like to change product_picture_var to product_picture_url

    $imgURLValueCA = get_option( 'widget_ca_theme' )[2]['productPictureUrl'];
    $imgURLValueOp = esc_attr( get_option( 'profile_picture' ) );

    //echo '9556';
    //echo $imgURLValueCA;

    // This logic is the button for which to be replaced. 


    //echo (!$imgURLValueOp) ? $imgURLValueCA : $imgURLValueOp;


    if(empty($imgURLValueCA)  || ($imgURLValueOp == "null")){

        // Keep this line because it has good button showing logic.
        ?>

    <button type="button" class="button button-secondary upload_image_button" value="Upload Product Picture" id="upload-button">
    <span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Upload Profile Picture</button>
    <input type="hidden" id="profile-picture" name="profile_picture" value="<?php echo (!$imgURLValueOp) ? $imgURLValueCA : $imgURLValueOp ?>" />

        <?php

    }

    if(!empty($imgURLValueCA) && ($imgURLValueOp != "null") ){

        ?>
    <button type="button" class="button button-secondary upload_image_button" value="Replace Product Picture" id="upload-button">
    <span class="sunset-icon-button dashicons-before dashicons-format-image"></span> Replace Product Picture</button>    
    <input type="hidden" id="profile-picture" name="profile_picture" value="<?php echo (!$imgURLValueOp) ? $imgURLValueCA : $imgURLValueOp ?>" /> 
      
    <button type="button" class="button button-secondary" value="Remove" id="remove-picture">
    <span class="sunset-icon-button dashicons-before dashicons-no"></span> Remove</button>

        <?php

    }

}

function link_button_text() {

    $linkButtonTextCA = get_option( 'widget_ca_theme' )[2]['linkText'];
    $linkButtonTextOp = esc_attr( get_option( 'button_text' ) );

        ?>
    <input type="text" name ="button_text" value ="<?php echo (!$linkButtonTextOp) ? $linkButtonTextCA : $linkButtonTextOp ?>" placeholder="" />
    <p class="description">Write the text that will appear on button.</p>

        <?php

}


function product_sidebar_name() {

    $productNameCA = get_option( 'widget_ca_theme' )[2]['title'];
    $productNameOp = esc_attr( get_option( 'product_name' ) );

    
    ?>

    <input type="text" name="product_name" value ="<?php 
        echo (!$productNameOp) ? $productNameCA : $productNameOp; ?>" placeholder="Description" />
    <p class="description">Write product name</p>
    <?

}

function pps_star_rating() {
    $starRatingCA = get_option( 'widget_ca_theme' )[2]['starRating']; 
    $starRatingOp = esc_attr( get_option( 'star_rating' ) );

?>
    <input type="number"  name="star_rating" min="0" max="5" maxlength="10" value ="<?php echo (!$starRatingOp) ? $starRatingCA : $starRatingOp ?>" placeholder="Star Rating" />    
    <p class="description">Enter rating of product from 1 to 5</p>

<?php

}
?>



<!-- The preview is in the same file! -->

<h1>PPS Options</h1>
<?php settings_errors(); ?>

<?php 

    $imgURLValueCA = get_option( 'widget_ca_theme' )[2]['productPictureUrl'];
    $imgURLValueOp = esc_attr( get_option( 'profile_picture' ) );


    $productNameOp = esc_attr( get_option( 'product_name' ) );
    $productNameCA = get_option( 'widget_ca_theme' )[2]['title'];


    $descriptionOp = esc_attr( get_option( 'product_description' ) );
    $descriptionCA = get_option( 'widget_ca_theme' )[2]['productText'];



?>

<div class="pps-sidebar-preview">
    <div class="pps-sidebar">
        <div class="image-container">
            <div id="profile-picture-preview" class="profile-picture"
                style="background-image: url(<?php echo (!$imgURLValueOp) ? $imgURLValueCA : $imgURLValueOp ?>);"></div>
        </div>
        <h1 class="pps-username"><?php echo (!$productNameOp) ? $productNameCA : $productNameOp; ?></h1>
        <h2 class="pps-description"><?php echo (!$descriptionOp) ? $descriptionCA : $descriptionOp; ?></h2>
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
    <!-- What does the submit_button() look like without the wrapper method? How would I 
            replicate this without Wordpress? 
        -->
    <?php submit_button('Save Changes','primary','btnSubmit'); ?>


</form>