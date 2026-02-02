<?php

/**
 *
 * Template Name: Contact Form
 *
 * @package WordPress
 
 */
get_header();

$contact_form_config = array(
	'subject'    => __( 'Website Contact', 'acaw' ),
	'submit'     => __( 'Send', 'acaw' ),
	'formError'  => __( 'There a problem with your form', 'acaw' ),
	'fieldError' => __( 'You will need to complete this field', 'acaw' ),
	'sending'    => __( 'Sending...', 'acaw' ),
	'success'    => __( 'Your message has been sent.', 'acaw' ),

	'fieldsets'  => array(
		array(
			'fields' => array(
				array(

					'name'     => 'name',
					'type'     => 'text',
					'label'    => __( 'Your Name', 'acaw' ),
					'required' => true,
				),
				array(
					'type'     => 'email',
					'name'     => 'email',
					'label'    => __( 'Your Email Address', 'acaw' ),
					'required' => true,
				),
				array(
					'type'     => 'textarea',
					'name'     => 'message',
					'label'    => __( 'Your Message', 'acaw' ),
					'required' => true,
				),
			),
		),

	),
);

wp_localize_script( 'acaw-theme', 'contactFormConfig', $contact_form_config );



?>

<div  >

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>

	<main <?php post_class(); ?> id="page-<?php the_ID(); ?>">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php the_content(); ?>
		<div class="contactForm"></div>
			<?php
			wp_link_pages(
				array(
					'before'         => __( 'Pages: ', 'acaw' ),
					'next_or_number' => 'number',
				)
			);
			?>
					<?php edit_post_link( __( 'Edit this entry', 'acaw' ), '<p>', '</p>' ); ?>
	</main>

			<?php
	endwhile;
endif;
	?>

</div>

<?php get_footer(); ?>
