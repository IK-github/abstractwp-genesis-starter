<?php
/**
 * Abstract appearance settings.
 *
 * @package Abstract
 * @author  Abstract WP
 * @license GPL-2.0-or-later
 * @link    https://www.abstractwp.com
 */

$abstract_default_colors = [
	'link'   => '#0073e5',
	'accent' => '#0073e5',
];

$abstract_link_color = get_theme_mod(
	'abstract_link_color',
	$abstract_default_colors['link']
);

$abstract_accent_color = get_theme_mod(
	'abstract_accent_color',
	$abstract_default_colors['accent']
);

$abstract_link_color_contrast   = abstract_color_contrast( $abstract_link_color );
$abstract_link_color_brightness = abstract_color_brightness( $abstract_link_color, 35 );

return [
	'fonts-url'            => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700&display=swap',
	'content-width'        => 1062,
	'button-bg'            => $abstract_link_color,
	'button-color'         => $abstract_link_color_contrast,
	'button-outline-hover' => $abstract_link_color_brightness,
	'link-color'           => $abstract_link_color,
	'default-colors'       => $abstract_default_colors,
	'editor-color-palette' => [
		[
			'name'  => __( 'Custom color', 'abstract' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => $abstract_link_color,
		],
		[
			'name'  => __( 'Accent color', 'abstract' ),
			'slug'  => 'theme-secondary',
			'color' => $abstract_accent_color,
		],
	],
	'editor-font-sizes'    => [
		[
			'name' => __( 'Small', 'abstract' ),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __( 'Normal', 'abstract' ),
			'size' => 18,
			'slug' => 'normal',
		],
		[
			'name' => __( 'Large', 'abstract' ),
			'size' => 20,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'abstract' ),
			'size' => 24,
			'slug' => 'larger',
		],
	],
];
