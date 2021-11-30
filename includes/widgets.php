<?php
 

 // The pps plugin will be split into two parts the widget side and the admin side. 

 // The two groups will be pps-widget and pps-admin. 
 // The ca theme will come already loaded with the group pps-widget.

 // If class my_widget exists 

include_once plugin_dir_path( dirname( __FILE__ ) ) .  'admin\database\read-table-data.php';


class PPS_Widget_Plugin extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'my-text',  // Base ID
            'Plugin Logic'   // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'PPS_Widget_Plugin' );
        });
 
    }
 
    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );


    // front-end display of widget
 
    
     public function widget( $args, $instance ) {

     //   $productTitle = Read_Table_Data::display_table_pps_values()->name;
        $productNameCA = Read_Table_Data::display_table_pps_values()->name;
        $productNameOp = esc_attr( get_option( 'product_name' ) );
 


        $imgURLValueFromDB = Read_Table_Data::display_table_pps_values()->product_picture_var;
        $linkURLForProduct = Read_Table_Data::display_table_pps_values()->link_url;
        $descriptionValueFromDB = Read_Table_Data::display_table_pps_values()->description;
        $linkButtonTextFromDB = Read_Table_Data::display_table_pps_values()->link_text;
        $description = Read_Table_Data::display_table_pps_values()->text;
        $starRating = Read_Table_Data::display_table_pps_values()->star_rating;
/*
    $descriptionValueFromCA = Read_Table_Data::display_table_pps_values()->description;
    $descriptionWpo = esc_attr( get_option( 'product_description' ) );

    $linkProductUrlFromCA = Read_Table_Data::display_table_pps_values()->link_url;
    $ProductPageLinkOp= esc_attr( get_option( 'product_page_link' ) );

    $imgURLValueCA = Read_Table_Data::display_table_pps_values()->product_picture_var;
    $imgURLValueOp = esc_attr( get_option( 'profile_picture' ) );


    $linkButtonTextFromDB = Read_Table_Data::display_table_pps_values()->link_text;
    $linkButtonTextOp = esc_attr( get_option( 'button_text' ) );

    $nameValueFromCA = Read_Table_Data::display_table_pps_values()->name;
    $productNameOp = esc_attr( get_option( 'product_name' ) );

    $starRatingCA = Read_Table_Data::display_table_pps_values()->star_rating;
    $starRatingOp = esc_attr( get_option( 'star_rating' ) );
    
    $productNameCA = Read_Table_Data::display_table_pps_values()->name;
    $productNameOp = esc_attr( get_option( 'product_name' ) );

    echo (!$productNameOp) ? $productNameCA : $productNameOp 

*/
        echo $args['before_widget'];
        // This is the start of the div. 
        echo '<div class ="wrapping-class-ca" style="padding: 11px;">';


        echo (!$productNameOp) ? $productNameCA : $productNameOp;





        // This checks if the image url has been inputted.
        if ( ! empty( $linkURLForProduct ) ){
            // This displays the image by putting it in the source tag.
        ?>

        <a href="<?php echo $linkURLForProduct; ?>">
            <img src="<?php echo esc_url(   $imgURLValueFromDB ); ?>" alt="" width="500" height="600">
        </a>

        <?php

        }


 
        echo '<div class="textwidget">';
 
        echo Read_Table_Data::display_table_pps_values()->text;

        echo esc_html__( $instance['text'], 'text_domain' );
        echo '<div class="star-rating-wrap" style="padding-top: 12px; padding-bottom: 5px;">';
        
        if ( ! empty( $starRating ) ) {


                $args = array(
                    'rating' => $starRating,
                    'type' => 'rating',
                    'number' => '',
                 );
                 wp_star_rating( $args ); 
 
        }

        echo '</div>';

        // This beings the widget button logic.

        if( !empty($linkURLForProduct ) ): ?>

            <div class="text-center">
                <a href="<?php echo $linkURLForProduct; ?>" style="color: #fff" id="widget-button-ca"
                    class="btn btn-primary float-right"><?php echo $linkButtonTextFromDB; ?> </a>
            </div>

            <?php 
            endif; 

        echo '</div>';
 
        echo $args['after_widget'];

        echo '</div>';
    }
 
    public function form( $instance ) {
 
		echo '<p><strong>No options for this Widget!</strong><br/>You can control the fields of this Widget from <a href="./admin.php?page=ParentPagePPS">This Page</a></p>';

    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
 
        return $instance;
    }

}



$my_widget = new PPS_Widget_Plugin();


?>