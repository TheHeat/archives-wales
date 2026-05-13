<?php

$project =  function_exists('get_field') ? get_field('related_projects') : null;





if ($project) {

	get_template_part('template-parts/project-funders', null, array('project' => $project[0]));

}

	?>
	