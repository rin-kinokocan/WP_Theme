<?php

function testtheme_setup(){
}

function my_customize_register($wp_customize){
    $wp_customize->add_section("header_image", array(
	"title" => "Header Image",
	"priority" => 10,
    ));

    $wp_customize->add_setting("header_image", array(
	'default' => get_theme_file_uri('assets/image/header.png'), 
	'sanitize_callback' => 'esc_url_raw',
	"transport" => "refresh",
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control(
	$wp_customize, 'header_image', array(
	    'label'        => 'Header Image',
	    'section'    => 'header_image',
	    'settings'   => 'header_image',
	)));    

	$wp_customize->get_setting("blogname")->transport = "postMessage";
	$wp_customize->get_setting("blogdescription")->tranport = "postMessage";
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

function cd_customizer_css(){
	?>
	<style type="text/css">
		header{ background-image: url(<?php echo get_theme_mod("header_image"); ?>);}
	</style>
	<?php
}

function rin_enqueue_style(){
	wp_enqueue_style("rin-style", get_template_directory_uri()."/rin-style.css", false);
}

function rin_enqueue_script(){

}

add_action("wp_head", "cd_customizer_css");
add_action("customize_register", "my_customize_register");
add_action("customize_preview_init", "cd_customizer");
add_action("after_setup_theme", "testtheme_setup");
add_action("wp_enqueue_scripts","rin_enqueue_style");
add_action("wp_enqueue_scripts","rin_enqueue_script");

?>
