<?php

function members_query($query) {

	if (! is_admin() && $query->is_main_query() && isset($query->query['post_type']) && $query->query['post_type']=='organisation') {

		$query->set( 'orderby', 'name' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', -1 );
		$query->set( 'meta_query', array(
			array(
				'key' => 'member',
				'value' => true,
				'compare' => '='
			)
		) );

	}
}

add_action( 'pre_get_posts', 'members_query' );



// Add Quick Edit checkbox for 'member' meta field on 'organisation' post type
add_action('quick_edit_custom_box', function($column_name, $post_type) {
	if ($post_type !== 'organisation' || $column_name !== 'member') return;
	?>
	<fieldset class="inline-edit-col-right">
		<div class="inline-edit-col">
			<label class="alignleft">
				<input type="checkbox" name="member" value="1">
				<span class="checkbox-title"><?php _e('Member', 'acaw'); ?></span>
			</label>
		</div>
	</fieldset>
	<?php
}, 10, 2);

// Add custom column for 'member' in admin list
add_filter('manage_organisation_posts_columns', function($columns) {
	$columns['member'] = __('Member', 'acaw');
	return $columns;
});

// Show checkbox in custom column
add_action('manage_organisation_posts_custom_column', function($column, $post_id) {
	if ($column === 'member') {
		$is_member = get_post_meta($post_id, 'member', true);
		echo $is_member ? '✔️' : '';
	}
}, 10, 2);

// Save Quick Edit value
add_action('save_post_organisation', function($post_id) {
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (isset($_POST['member'])) {
		update_post_meta($post_id, 'member', 1);
	} else {
		delete_post_meta($post_id, 'member');
	}
});

// Fill Quick Edit with current value
add_action('admin_footer', function() {
	global $post_type;
	if ($post_type !== 'organisation') return;
	?>
	<script>
	jQuery(function($){
		$('a.editinline').on('click', function(){
			var postId = $(this).closest('tr').attr('id').replace('post-', '');
			var isMember = $(this).closest('tr').find('td.column-member').text().trim() === '✔️';
			$('input[name="member"]', '.inline-edit-row').prop('checked', isMember);
		});
	});
	</script>
	<?php
});
