<?php

function testtheme_setup(){
}

function my_customize_register($wp_customize){
    $wp_customize->add_section("header_image", array(
	"title" => "image",
	"priority" => 10,
    ));

    
}

add_action("after_setup_theme", "testtheme_setup");
add_action("customize_register", "my_customize_register");
