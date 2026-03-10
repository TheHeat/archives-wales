<?php

$project = get_field('related_projects')[0];





if ($project) {

	get_template_part('template-parts/project-funders', null, array('project' => $project));

}

	?>
	