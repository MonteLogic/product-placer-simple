<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/dchavours/
 * @since      1.0.0
 *
 * @package    Product_Placer_Simple
 * @subpackage Product_Placer_Simple/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->



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
    
    settings_fields( 'ppsGeneralSettings');

    
    ?>

    <input type="text" name="number" value="<?php echo get_option( 'number' ) ?>" placeholder="Product Name" />

    <input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
    <input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />

    <input type="text" name="product_name" value="'.$productName.'" placeholder="Product Name" /> 


    <input type="text" name="user_description" value="'.$description.'" placeholder="Description" />
    <p class="description">Write short product description</p>



    <input type="text" name="link_external_handler" value="<?php  $externalLink  ?>" placeholder="" />




    <?php submit_button(); ?>


</form>