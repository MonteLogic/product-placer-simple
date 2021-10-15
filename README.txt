I need to figure out how to add a table on to the admin side and have it be organized. 

I'll send you to organize the do_settings to have it be linked to a valid call back.

 

   <label
        for="<?php echo esc_attr( $this->get_field_id( 'linkText' ) ); ?>"><?php echo esc_html__( 'Automatically Import Images (Supports Amazon, eBay and jvZoo): ', 'text_domain' ); ?></label>

<p>Here should be a checkbox to automatically import. If checked, there should be a green or red sign saying is working.
    However, this is probably for pps </p>
</p>



How come when this plugin comes into existence on the Wordpress activation there isn't a supplemental table that pops up
so we can store info in this plugin. 




If a user deletes the plugin and still ops for the theme it will be fine because the values will be stored in the wp_options category. 
But the extra logic is going to be stored in the custom table. 

Made a gist for this. 



I would like to queue the data from the database in a form of an array so that I only have to read it once. This function for queueing would 
be located in admin/database/read-table-data.php


Note, the user cannot update the value by submitting a form as the prior get_option updating value 
is what is currently being used as of writing this. 







Integrate this into the widgets.php

https://gist.github.com/dchavours/99b8999a69fd920a8b38b34da20a5e30


Because I don't quite see a gap in the market, I think I am going to open source this project. 

Current milestone 001d -
I have to make all of the fields be able to be updated and also have to style the widget. 

After that work on payment gate, then work on the fact that users can make more than one product. But focus on one single 
product for now and get that perfect before expanding. 



Right now: 
Making fields changable through the admin side.