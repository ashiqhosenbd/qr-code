<?php 

/* 
Plugin Name: Dev QR code
Plugin URI: https://hello.com
Description: This is a normal plugin
Author: DevsOffice
Author URI: https://devsoffice.com
Version: 1.0.0
*/

class Basic_qr_code{
    public function __construct(){
        add_action("init", array( $this,"initialize") );
    }
    function initialize(){
        add_filter("the_content", array( $this,"qr_code") );
    }

    function qr_code($post_content){
        $post_url = get_permalink();
        $qr_code_img = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example'. $post_url;
        $display_qr_code =$post_content . '<p><img src="'.$qr_code_img.'"/></p>';
        return $display_qr_code;
    }
}
new Basic_qr_code();