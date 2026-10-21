<?php 
// display uploaded files in a clickable list
// NB: the field is called downloads, out of sync with 'resources' to preserve existing data on the live site

if( function_exists('get_field') && get_field('downloads')): ?>
	<div class="resources-wrapper">
		<h2 class="resources-title"><?php _e('Resources', 'acaw'); ?></h2>
		<ul class="resources">
			<?php while (have_rows('downloads')): the_row();

					if (get_sub_field('type') === 'url') {
						$href = get_sub_field('url');
						if (!$href) continue;
						$label = esc_html(preg_replace('/^www\./', '', wp_parse_url($href, PHP_URL_HOST)));
					} else {
						$file = get_sub_field('file');
						if (!$file) continue;
						$href = $file['url'];
						$ext = pathinfo($file['filename'] ?: $file['url'], PATHINFO_EXTENSION) ?: $file['subtype'];
						$label = sprintf('%s (%s)', esc_html(strtoupper($ext)), get_proper_filesize($file['filesize']));
					}

					$description = get_sub_field('description');

					echo sprintf(
						'<li class="resource">%s<a class="resource-link" href="%s">%s</a>%s</li>',
						get_sub_field('name'),
						esc_url($href),
						$label,
						$description ? '<p class="resource-description">' . esc_html($description) . '</p>' : ''
					);

					endwhile; ?>
		</ul>
	</div>
<?php endif; ?>