<?php
use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;


/*-----------------------------------------------------------------------------------*/
/* Header, Body and Footer Scripts
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
    )
  );