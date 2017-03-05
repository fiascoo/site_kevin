<?php
//Cette fonction va nous servir à faire un random sur les couleurs

function set_a_color($niveau){

	$background_color = array(
		'100' => 'progress-bar-success',
		'60' => 'progress-bar-danger',
		'50' => 'progress-bar-info',
		'30' => 'progress-bar-warning'
		);

	if($niveau == 100){

		return $background_color[100];
	}else if($niveau == 60){

		return $background_color[60];

	}else if($niveau == 50){

		return $background_color[50];

	}else if($niveau == 30){

		return $background_color[30];
	}

}
