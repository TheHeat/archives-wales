<?php

$project = get_field('related_projects');





if ($project) {

	get_template_part('template-parts/project-funders', null, array('project' => $project[0]));

}

	?>
	