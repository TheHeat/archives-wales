<?php if(get_field('downloads')): ?>
	<div class="downloads-wrapper">
		<h2 class="downloads-title"><?php _e('Downloads', 'acaw'); ?></h2>
		<ul class="downloads">
			<?php while (have_rows('downloads')): the_row(); $file = get_sub_field('file');
					
					echo sprintf(
						'<li class="download">%s<a class="download-link" href="%s">%s (%s)</a></li>',
						get_sub_field('name'),
						$file['url'],
						strtoupper($file['subtype']),
						get_proper_filesize($file['filesize'])
					);
					
					endwhile; ?>
		</ul>
	</div>
<?php endif; ?>