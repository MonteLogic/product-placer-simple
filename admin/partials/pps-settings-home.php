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


function echo_some_value(){

    echo 'value9499';
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