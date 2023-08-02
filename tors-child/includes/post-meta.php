<?php
use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;


/*-----------------------------------------------------------------------------------*/
/* Get a Quote
/*-----------------------------------------------------------------------------------*/
Container::make('theme_options', __('Get a Quote Form'))
  ->add_fields(
    array(
      Field::make('complex', 'get_a_quote_form', __(''))
        ->add_fields(
          array(
            Field::make('text', 'name', __('Name')),
            Field::make('image', 'image', __('Image')),
          )
        )
        ->set_layout('tabbed-vertical')
        ->set_header_template('<%- name  %>'),

    )
  );

/*-----------------------------------------------------------------------------------*/
/* Recordings
/*-----------------------------------------------------------------------------------*/
Container::make('post_meta', 'Custom Data')
  ->where('post_type', '=', 'page')
  ->add_fields(
    array(
      Field::make('file', 'before_audio', __('Before Audio')),
      Field::make('file', 'after_audio', __('After Audio'))
    )
  );