<?php

function eventFormat($event) {
	$datetime_begin = new DateTime($event->datetime_begin);
	$datetime_end = new DateTime($event->datetime_end);
	$event->date = $datetime_begin->format('j F Y');
	$interval = date_diff($datetime_begin, $datetime_end);
	$seconds = date_create('@0')->add($interval)->getTimestamp();
	if ($seconds < 86400) { // interval is less than 1 day long
		if ($interval->i !== 0) {
			$event->duration = $interval->format('%h hr %i min');
		} else {
			$event->duration = $interval->format('%h hr');
		}
		$event->time_begin = $datetime_begin->format('g:i a');
		$event->time_end = $datetime_end->format('g:i a');
	}
	return $event;
}

?>