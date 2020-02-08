<?php
/**
 * Abstract.
 *
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package Abstract
 * @author  Abstract WP
 * @license GPL-2.0-or-later
 * @link    https://www.abstractwp.com
 */

add_action( 'customize_register', 'abstract_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function abstract_customizer_register( $wp_customize ) {

	$appearance = genesis_get_config( 'appearance' );

	$wp_customize->add_setting(
		'abstract_link_color',
		[
			'default'           => $appearance['default-colors']['link'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'abstract_link_color',
			[
				'description' => __( 'Change the color of post info links and button blocks, the hover color of linked titles and menu items, and more.', 'abstract' ),
				'label'       => __( 'Link Color', 'abstract' ),
				'section'     => 'colors',
				'settings'    => 'abstract_link_color',
			]
		)
	);

	$wp_customize->add_setting(
		'abstract_accent_color',
		[
			'default'           => $appearance['default-colors']['accent'],
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'abstract_accent_color',
			[
				'description' => __( 'Change the default hover color for button links, menu buttons, and submit buttons. The button block uses the Link Color.', 'abstract' ),
				'label'       => __( 'Accent Color', 'abstract' ),
				'section'     => 'colors',
				'settings'    => 'abstract_accent_color',
			]
		)
	);

	$wp_customize->add_setting(
		'abstract_logo_width',
		[
			'default'           => 350,
			'sanitize_callback' => 'absint',
			'validate_callback' => 'abstract_validate_logo_width',
		]
	);

	// Add a control for the logo size.
	$wp_customize->add_control(
		'abstract_logo_width',
		[
			'label'       => __( 'Logo Width', 'abstract' ),
			'description' => __( 'The maximum width of the logo in pixels.', 'abstract' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'abstract_logo_width',
			'type'        => 'number',
			'input_attrs' => [
				'min' => 100,
			],

		]
	);

}

/**
 * Displays a message if the entered width is not numeric or greater than 100.
 *
 * @param object $validity The validity status.
 * @param int    $width The width entered by the user.
 * @return int The new width.
 */
function abstract_validate_logo_width( $validity, $width ) {

	if ( empty( $width ) || ! is_numeric( $width ) ) {
		$validity->add( 'required', __( 'You must supply a valid number.', 'abstract' ) );
	} elseif ( $width < 100 ) {
		$validity->add( 'logo_too_small', __( 'The logo width cannot be less than 100.', 'abstract' ) );
	}

	return $validity;

}
