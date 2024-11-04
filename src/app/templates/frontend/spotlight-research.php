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

use function Site_Functionality\print_post_date;
use function Site_Functionality\print_primary_term;
use function Site_Functionality\print_post_author;

$post_id = get_the_ID();
$hide_featured_image = get_post_meta( $post_id, 'hide_featured_image', true );
?>
<article <?php post_class( 'post-container teaser group' ); ?>>

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

	<?php
	if ( has_term( '', 'research_type', get_the_ID() ) ) :
		?>
		<div class="post-tags post-types">
			<?php print_primary_term( 'research_type' ); ?>
		</div>
		<?php
	endif;
	?>
	
	<div class="post-body">

		<header class="post-header <?php echo get_post_type() . '-header'; ?>">

			<?php do_action( 'post_title_before' ); ?>

			<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . esc_attr( get_the_title() ) . '">', '</a></h2>' ); ?>
		</header><!-- .post-header -->


		<footer class="post-footer">
			
			<?php print_post_author(); ?>

			<?php print_post_date(); ?>

		</footer><!-- .post-footer -->

	</div><!-- .post-body -->

</article><!-- #post-## -->