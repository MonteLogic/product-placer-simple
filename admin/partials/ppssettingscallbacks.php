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


<h1>Product Placer Simple</h1>


<input type="button" class="button button-secondary" value="Upload Product Picture" id="upload-button">
					<input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" />


                <input type="text" name="product_name" value="'.$productName.'" placeholder="Product Name" />




                <input type="text" name="user_description" value="'.$description.'" placeholder="Description" />
			<p class="description">Write short product description</p>

            