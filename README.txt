I need to figure out how to add a table on to the admin side and have it be organized. 

I'll send you to organize the do_settings to have it be linked to a valid call back.

The file product-placer-simple/admin/partials/ppssettingscallbacks.php shouldn't be called exactly that 
even though it is used as a callback. 

 

   <label
        for="<?php echo esc_attr( $this->get_field_id( 'linkText' ) ); ?>"><?php echo esc_html__( 'Automatically Import Images (Supports Amazon, eBay and jvZoo): ', 'text_domain' ); ?></label>

<p>Here should be a checkbox to automatically import. If checked, there should be a green or red sign saying is working.
    However, this is probably for pps </p>
</p>
