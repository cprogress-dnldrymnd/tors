<?php 
namespace TorsDevElementor\Helper;

// BDT Position
function element_pack_position() {
    $position_options = [
        ''              => esc_html__('Default', 'torsdev-elementor'),
        'top-left'      => esc_html__('Top Left', 'torsdev-elementor') ,
        'top-center'    => esc_html__('Top Center', 'torsdev-elementor') ,
        'top-right'     => esc_html__('Top Right', 'torsdev-elementor') ,
        'center'        => esc_html__('Center', 'torsdev-elementor') ,
        'center-left'   => esc_html__('Center Left', 'torsdev-elementor') ,
        'center-right'  => esc_html__('Center Right', 'torsdev-elementor') ,
        'bottom-left'   => esc_html__('Bottom Left', 'torsdev-elementor') ,
        'bottom-center' => esc_html__('Bottom Center', 'torsdev-elementor') ,
        'bottom-right'  => esc_html__('Bottom Right', 'torsdev-elementor') ,
    ];

    return $position_options;
}