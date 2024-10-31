<?php
/**
 * Template part for displaying posts.
 *
 * To override this template, place a template of the same name in
 * your active theme's ./template-parts/blocks/ directory.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    site-functionality
 */
?>

<ul class="alignfull feature wp-block-post-template">
	<li <?php post_class(); ?>>

		<div class="wp-block-cover aligncenter is-light alignfull">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<?php 
			if( has_post_thumbnail() ) :
				the_post_thumbnail( 'full', array( 'class' => 'wp-block-cover__image-background wp-post-image' ) );
			endif;
			?>
			<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow">
				<div class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
					<article class="wp-block-group post-content is-layout-flow wp-block-group-is-layout-flow">
						<?php
						$taxonomy = 'research_type';
						if( has_term( '', $taxonomy ) ) :
							?>
							<div class="wp-block-group post-tags is-nowrap is-layout-flex wp-container-core-group-layout-1 wp-block-group-is-layout-flex">
								<div class="taxonomy-<?php echo $taxonomy; ?> wp-block-post-terms">
									<?php echo get_the_term_list( get_the_ID(), $taxonomy, null, ', ', null ); ?>
								</div>
							</div>

							<?php
						endif;
						?>

						<div class="wp-block-group post-body has-gray-color has-text-color is-layout-flow wp-block-group-is-layout-flow">
							<?php
							the_title(
								sprintf( '<h2 class="wp-block-post-title post-title"><a href="%s" title="%s" rel="bookmark">', esc_attr( esc_url( get_permalink() ) ), esc_attr( get_the_title() ) ),
							'</a></h2>'
							);
							?>

							<div class="wp-block-post-excerpt">
								<?php the_excerpt(); ?>
							</div>

							<footer class="wp-block-group post-footer is-layout-flow wp-block-group-is-layout-flow">

								<div class="post-author has-avatar wp-block-post-author">
									<div class="wp-block-post-author__authors">
										<?php
										if( function_exists( 'coauthors_posts_links' ) ) :
											coauthors_posts_links();
										else :
											the_author_posts_link();
										endif;
										?>
									</div><!-- .wp-block-post-author__authors -->
								</div><!-- .wp-block-post-author -->

								<div class="wp-block-post-date">
									<?php the_date( '', sprintf( '<time datetime=%s>', get_the_date( 'c' ) ), '</time>' ); ?>
								</div>

							</footer><!-- .post-footer -->

						</div>
					</article>
				</div>
			</div>
		</div>

	</li>
	<!-- #post-## -->
</ul>