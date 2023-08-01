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
      Field::make('complex', 'featured_boxes', 'Featured Boxes')
        ->add_fields(
          array(
            Field::make('text', 'prefix', 'Prefix'),
            Field::make('text', 'heading', 'Heading'),
            Field::make('textarea', 'description', 'Description'),
            Field::make('text', 'link', 'Link'),
            Field::make('image', 'image', 'Image'),

          )
        )
    )
  );