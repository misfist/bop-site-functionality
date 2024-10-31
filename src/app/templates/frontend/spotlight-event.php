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
use function Quincy_Institute\print_post_author;

if ( ! class_exists( '\EM_Event' ) ) {
	return;
}
global $EM_Event, $post;

$post_id  = get_the_id();
$EM_Event = em_get_event( $post_id, 'post_id' );

$hide_featured_image = get_post_meta( $post_id, 'hide_featured_image', true );
$image_class         = ! $hide_featured_image ? ' has-no-post-thumbnail' : '';
?>

<article <?php post_class( 'post-container teaser group' . $image_class ); ?>>

	<?php
	$size = 'medium';
	if ( has_post_thumbnail( $post_id ) && ! $hide_featured_image ) :
		?>
		<figure class="post-image">
			<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail( $size ); ?>
			</a>
		</figure>
		<?php
	endif;
	?>
	
	<div class="post-tags">
		<?php echo $EM_Event->output( '#_EVENTCATEGORIES' ); ?> 
		
		<div class="wp-block-post-date wp-block-event-date">
			<time datetime="<?php echo $EM_Event->output( '#_{Y-m-d H:i:s}' ); ?>"><?php echo $EM_Event->output( '#_EVENTSTARTDATE ' ); ?> <?php echo $EM_Event->output( '#_{g:i a}' ); ?></time>
		</div>
	</div>

	<div class="post-body">

		<header class="post-header <?php echo get_post_type() . '-header'; ?>">

			<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . esc_attr( get_the_title() ) . '">', '</a></h2>' ); ?>

			<div class="post-content">
				<?php the_excerpt(); ?>
			</div><!-- .post-content -->
			
		</header><!-- .post-header -->


		<?php //print_post_author( array( 'author_text' => '' ) ); ?><!-- .post-author -->

		<footer class="post-footer">
		</footer><!-- .post-footer -->

	</div><!-- .post-body -->

</article><!-- #post-## -->
