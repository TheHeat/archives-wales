<?php

$link = get_post_type_archive_link('organisation');

?>

<div class="membersLink-wrapper">
<a href="<?php echo $link?>">
	<img src="https://placehold.co/800x600" alt="PLACEHOLDER"/>
	</a>
	<a class="membersLink" href="<?php echo $link?>">
		<h2>
			<?php _e('Our member repositories');?>
		</h2>
</a>
</div>