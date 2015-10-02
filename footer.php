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

global $decatur_2015_themekit;

		?></div><!-- .wrap --><?php

		do_action( 'tha_content_bottom' );

	?></div><!-- #content --><?php

	do_action( 'tha_content_after' );

	do_action( 'after_content' );

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

						$addy1 = get_theme_mod( 'address_1' );

						if ( ! empty( $addy1 ) ) {

							?><li class="address1"><?php echo esc_html( $addy1, 'decatur-2015' ); ?></li><?php

						}

						$addy2 = get_theme_mod( 'address_2' );

						if ( ! empty( $addy2 ) ) {

							?><li class="address2"><?php echo esc_html( $addy2, 'decatur-2015' ); ?></li><?php

						}

						$city 	= get_theme_mod( 'city' );
						$state 	= get_theme_mod( 'us_state' );
						$zip 	= get_theme_mod( 'zip_code' );

						if ( ! empty( $city ) && ! empty( $state ) && ! empty( $zip ) ) {

							?><li>
								<span class="city"><?php echo esc_html( $city, 'decatur-2015' ) . ', '; ?></span>
								<span class="state"><?php echo esc_html( $state, 'decatur-2015' ) . ' '; ?></span>
								<span class="zip"><?php echo esc_html( $zip, 'decatur-2015' ); ?></span>
							</li><?php

						}

						$phone = get_theme_mod( 'phone_number' );

						if ( ! empty( $phone ) ) {

							?><li class="phone-number"><?php

								esc_html_e( 'Phone: ', 'decatur-2015' );
								echo $decatur_2015_themekit->make_phone_link( $phone );;

							?></li><?php

						}

					?></ul>
				</div>
				<div class="credits"><?php printf( esc_html__( 'Site design and developed by %1$s', 'decatur-2015' ), '<a href="https://dccmarketing.com/" target="_blank">DCC Marketing</a>' ); ?></div>
			</div><!-- .site-info -->
		</div><!-- .wrap-footer --><?php

		do_action( 'tha_footer_bottom' );

	?></footer><!-- #colophon --><?php

	do_action( 'tha_footer_after' );

?></div><!-- #page --><?php

wp_footer();

do_action( 'tha_body_bottom' );

?></body>
</html>