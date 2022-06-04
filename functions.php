<?php

function testtheme_setup(){
}

function my_customize_register($wp_customize){
    $wp_customize->add_section("header_image", array(
	"title" => "Header Image",
	"priority" => 10,
    ));

    $wp_customize->add_setting("header_image", array(
	"default" => "",
	"transport" => "refresh",
    ));

    $wp_customize->add_control( new WP_Customize_Color_Control(
	$wp_customize, 'header_image', array(
	    'label'        => 'Header Image',
	    'section'    => 'header_image',
	    'settings'   => 'header_image',
	)));    
}

function cd_customizer(){
    wp_enqueue_script(
	"cd_customizer",
	get_template_directory_uri() . "/customizer.js",
	array("jquery", "customize-preview"),
	"",
	true
    );
}

add_action("customize_preview_init", "cd_customizer");
add_action("after_setup_theme", "testtheme_setup");
add_action("customize_register", "my_customize_register");
add_action("wp_head", "cd_customizer_css");

?>
