<?php
 

 // The pps plugin will be split into two parts the widget side and the admin side. 

 // The two groups will be pps-widget and pps-admin. 
 // The ca theme will come already loaded with the group pps-widget.

 // If class my_widget exists 


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


    // frontend display of widget
 
    
     public function widget( $args, $instance ) {

        $productNameCA = get_option( 'widget_ca_theme' )[2]['title'];
        $productNameOp = esc_attr( get_option( 'product_name' ) );

        $linkProductCA = get_option( 'widget_ca_theme' )[2]['linkUrl'];
        $linkProductOp = esc_attr( get_option( 'product_page_link' ) );

        $imgURLValueCA = get_option( 'widget_ca_theme' )[2]['productPictureUrl'];
        $imgURLValueOp = esc_attr( get_option( 'profile_picture' ) );

        $descriptionCA = get_option( 'widget_ca_theme' )[2]['productText'];
        $descriptionOp = esc_attr( get_option( 'product_description' ) );

        $linkButtonTextCA = get_option( 'widget_ca_theme' )[2]['linkText'];
        $linkButtonTextOp = esc_attr( get_option( 'button_text' ) );
    

        $starRatingCA = get_option( 'widget_ca_theme' )[2]['starRating']; 
        $starRatingOp = esc_attr( get_option( 'star_rating' ) );


        echo $args['before_widget'];
        // This is the start of the div. 
        echo '<div class ="wrapping-class-ca" style="padding: 11px;">';


        echo (!$productNameOp) ? $productNameCA : $productNameOp;
        
 
        if( empty($linkProductCA ) ): ?>
        
        <a href="<?php echo (!$linkProductOp) ? $linkProductCA : $linkProductOp ?>">
            <img src="<?php echo (!$imgURLValueOp) ? esc_url( $imgURLValueCA ) : esc_url( $imgURLValueOp )  ?>" alt="" width="500" height="600">
        </a>
            <?php
        echo '556'; 
        endif;

        echo '<div class="textwidget">';
 
        echo (!$descriptionOp) ? $descriptionCA : $descriptionOp;

        echo esc_html__( $instance['text'], 'text_domain' );
        echo '<div class="star-rating-wrap" style="padding-top: 12px; padding-bottom: 5px;">';
        
        if ( ! empty( $starRatingCA ) ) {


            
            
            
                $args = array(
                    'rating' => (!$starRatingOp) ? $starRatingCA : $starRatingOp,
                    'type' => 'rating',
                    'number' => '',
                 );
                 wp_star_rating( $args ); 
 
        }

        echo '</div>';

        // This beings the widget button logic.

        if( empty($linkProductCA ) ): ?>

            <div class="text-center">
                <a href="<?php echo (!$linkProductOp) ? $linkProductCA : $linkProductOp ?>" style="color: #fff" id="widget-button-ca"
                    class="btn btn-primary float-right"><?php echo(!$linkButtonTextOp) ? $linkButtonTextCA : $linkButtonTextOp ?> </a>
            </div>

            <?php 
            endif; 

        echo '</div>';

        if (!empty($args['after_widget'])) {
            echo $args['after_widget'];
        }




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