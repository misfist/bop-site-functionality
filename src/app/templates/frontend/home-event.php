<?php
/**
 * Template part for displaying event posts.
 *
 * To override this template, place a template of the same name in
 * your active theme's ./template-parts/blocks/ directory.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package    site-functionality
 */

if ( ! class_exists( '\EM_Event' ) ) {
	return;
}
global $EM_Event;

$post_id  = get_the_id();
$EM_Event = em_get_event( $post_id, 'post_id' );
?>

<ul class="alignfull feature wp-block-post-template">
	<li <?php post_class(); ?>>

		<div class="wp-block-cover aligncenter is-light alignfull">
			<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'full-width', array( 'class' => 'wp-block-cover__image-background wp-post-image' ) );
			endif;
			?>
			<div class="wp-block-cover__inner-container is-layout-flow wp-block-cover-is-layout-flow">
				<div class="wp-block-group has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
					<article class="wp-block-group post-content is-layout-flow wp-block-group-is-layout-flow">
						<div class="wp-block-group post-tags is-nowrap is-layout-flex wp-container-core-group-layout-1 wp-block-group-is-layout-flex">
							<div class="taxonomy-event-categories wp-block-post-terms">
								<time datetime="<?php echo $EM_Event->output( '#_{Y-m-d H:i:s}' ); ?>"><?php echo $EM_Event->output( '#_EVENTSTARTDATE ' ); ?> <?php echo $EM_Event->output( '#_{g:i a}' ); ?></time>
								<?php echo $EM_Event->output( '#_EVENTCATEGORIES' ); ?> 
							</div>
						</div>

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
										if ( function_exists( 'coauthors_posts_links' ) ) :
											coauthors_posts_links();
										else :
											the_author_posts_link();
										endif;
										?>
									</div><!-- .wp-block-post-author__authors -->
								</div><!-- .wp-block-post-author -->
								
							</footer><!-- .post-footer -->

						</div>
					</article>
				</div>
			</div>
		</div>

	</li>
	<!-- #post-## -->
</ul>
