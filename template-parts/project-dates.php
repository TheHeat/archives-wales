<?php



$start_date = get_field('start_date');
$end_date = get_field('end_date');
$dates_string = null;


if (!empty($start_date) || !empty($end_date)):
	$start_year = !empty($start_date) ? date('Y', strtotime($start_date)) : '';
	$end_year = !empty($end_date) ? date('Y', strtotime($end_date)) : '';
	if ($start_year == $end_year) {
		$dates_string = esc_html($start_year);
	} elseif ($start_year && $end_year) {
		// If the first two digits match, show only last two digits for end year
		if (substr($start_year, 0, 2) === substr($end_year, 0, 2)) {
			$end_short = substr($end_year, 2, 2);
			$dates_string = esc_html($start_year . '–' . $end_short);
		} else {
			$dates_string = esc_html($start_year . '–' . $end_year);
		}
	} elseif ($start_year) {
		$dates_string = esc_html($start_year) . '–';
	} elseif ($end_year) {
		$dates_string = esc_html($end_year);
	}

	echo sprintf( '<span class="meta project-dates">%s</span>', $dates_string );

endif;

?>

