<?php
/*
Plugin Name: Ultimate Photonizer
Description: Apply Photon to all the output
Author: Marco Canestrari
Version: 1.0
Author URI: http://www.marcocanestrari.it/
*/
function uf_photonize_output($output) {

    if ( class_exists( 'Jetpack_Photon' ) ) {
            $output = Jetpack_Photon::filter_the_content( $output );
    }

    return $output;

}

function uf_buffer_start() { ob_start("uf_photonize_output"); }
function uf_buffer_end() { ob_end_flush(); }

function uf_admin_notice() {
    ?>
    <div class="updated">
        <div style="float:right;">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="395B2H3W4U98Q">
                        <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal Ð The safer, easier way to pay online.">
                        <img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
                </form>
        </div>
        <p><?php _e( '<b>Ultimate Photonizer</b> is active!<br>Please <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=395B2H3W4U98Q" target="_blank">Donate</a> if you like that :)' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'uf_admin_notice' );
add_action('after_setup_theme', 'uf_buffer_start');
add_action('shutdown', 'uf_buffer_end');

?>