<?php
/**
 * @package WordPress
 
 */
get_header();

$results = $wp_query->found_posts;
$search_term = htmlspecialchars($_GET["s"]);


$title_format = __('We found %1$s search results for  &ldquo;%2$s&rdquo;', 'proper');
$title = sprintf($title_format, $results, $search_term);

?>

<div class="archive-header-wrapper">
	<div class="archive-header">
		<h1><?php echo $title; ?></h1>
</div>
</div>
<?php get_template_part( 'template-parts/searchbar' ); ?>

<div class="archive-content">

	<?php if ( have_posts() ) : ?>

		<ol class="archiveList">
		<?php
		while ( have_posts() ) :
			the_post();
			?>


		<li>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2>
				<a href="<?php the_permalink();?>">
					<?php echo sprintf('%s : %s', get_post_type_object(get_post_type())->labels->singular_name, get_the_title()) ?>
				</a>
			</h2>
	
		</article>
	</li>		
			
			<?php endwhile; ?>
		</ol>
			<?php the_posts_pagination(); ?>



	<?php endif; ?>

</div>

<?php get_footer(); ?>
