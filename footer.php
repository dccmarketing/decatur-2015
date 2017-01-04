<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Decatur_2015
 */

$mods = get_theme_mods();

global $decatur_2015_themekit;

		do_action( 'tha_content_bottom' );

		?></div><!-- .wrap -->
	</div><!-- #content --><?php

	do_action( 'tha_content_after' );

	do_action( 'tha_footer_before' );

	?><footer id="colophon" class="site-footer" role="contentinfo"><?php

		do_action( 'tha_footer_top' );

		?><div class="wrap wrap-footer">
			<div class="site-info">
				<div class="copyright">
					<ul class="contact-info">
						<li>&copy <?php echo date( 'Y' );
							?> <a href="<?php echo esc_url( get_admin_url(), 'decatur-2015' ); ?>"><?php
								echo get_bloginfo( 'name' );
							?></a>
						</li><?php

						if ( ! empty( $mods['address_1'] ) ) {

							?><li class="address1"><?php echo esc_html( $mods['address_1'] ); ?></li><?php

						}

						if ( ! empty( $mods['address_2'] ) ) {

							?><li class="address2"><?php echo esc_html( $mods['address_2'] ); ?></li><?php

						}

						if ( ! empty( $mods['city'] ) && ! empty( $mods['us_state'] ) && ! empty( $mods['zip_code'] ) ) {

							?><li>
								<span class="city"><?php echo esc_html( $mods['city'] ) . ', '; ?></span>
								<span class="state"><?php echo esc_html( $mods['us_state'] ) . ' '; ?></span>
								<span class="zip"><?php echo esc_html( $mods['zip_code'] ); ?></span>
							</li><?php

						}

						if ( ! empty( $mods['phone_number'] ) ) {

							?><li class="phone-number"><?php

								esc_html_e( 'Phone: ', 'decatur-2015' );
								echo $decatur_2015_themekit->make_phone_link( $mods['phone_number'] );

							?></li><?php

						}

					?></ul>
				</div>
				<div class="credits"><?php printf( esc_html__( 'Site design and developed by %1$s', 'decatur-2015' ), '<a href="https://dccmarketing.com/" target="_blank">DCC Marketing</a>' ); ?></div>
				<div class="link-ada">
					<a href="<?php echo esc_url( $mods['ada_link_url'] ); ?>" id="ada-link-text"><?php echo esc_html( $mods['ada_link_text'] ); ?></a>
				</div>
			</div><!-- .site-info -->
		</div><!-- .wrap-footer --><?php

		do_action( 'tha_footer_bottom' );

	?></footer><!-- #colophon --><?php

	do_action( 'tha_footer_after' );

?></div><!-- #page --><?php

wp_referer_field();

wp_footer();

do_action( 'tha_body_bottom' );

?></body>
</html>
