<?php

function tors_logo()
{
  ob_start();
  get_template_part('template-parts/shortcodes/tors_logo');
  return ob_get_clean();
}

add_shortcode('tors_logo', 'tors_logo');

function get_a_quote_form()
{
  ob_start();
  get_template_part('template-parts/shortcodes/get_a_quote_form');
  return ob_get_clean();
}

add_shortcode('get_a_quote_form', 'get_a_quote_form');


function our_artists() {
  ob_start();
  get_template_part('template-parts/shortcodes/our_artists');
  return ob_get_clean();
}


add_shortcode( 'our_artists', 'our_artists' );


function post_content() {
	return wpautop(get_the_content());
}

add_shortcode( 'post_content', 'post_content' );