<?php

use Carbon\Carbon;

return [
	
	'sueldo_minimo'    => '257500',
	'valor_hora_extra' => '1.5',
	'init_month'       => Carbon::parse('first day of this month 00:00:00'),
	'end_month'        => Carbon::now(),
	'time_limit'       => '09:30:00',
	
	'feriados2017' => [
		0  => Carbon::parse('2017-01-01'),
		1  => Carbon::parse('2017-01-02'),
		2  => Carbon::parse('2017-04-14'),
		3  => Carbon::parse('2017-04-15'),
		4  => Carbon::parse('2017-05-01'),
		5  => Carbon::parse('2017-05-21'),
		6  => Carbon::parse('2017-06-26'),
		7  => Carbon::parse('2017-07-02'),
		8  => Carbon::parse('2017-07-16'),
		9  => Carbon::parse('2017-08-15'),
		10 => Carbon::parse('2017-09-18'),
		11 => Carbon::parse('2017-09-19'),
		12 => Carbon::parse('2017-10-09'),
		13 => Carbon::parse('2017-10-27'),
		14 => Carbon::parse('2017-11-01'),
		15 => Carbon::parse('2017-11-19'),
		16 => Carbon::parse('2017-12-08'),
		17 => Carbon::parse('2017-12-17'),
		18 => Carbon::parse('2017-12-25'),
	],
	
	'familyAllowance' => [
		0 => '10577',
		1 => '6491',
		2 => '2052'
	],
	
	'impuestoSegundaCategoria' => [
		0 => 0,
		1 => 0.04,
		2 => 0.08,
		3 => 0.135,
		4 => 0.23,
		5 => 0.304,
		6 => 0.35
	],
	
	'rebajaImpuesto' => [
		0 => 0,
		1 => 24275,
		2 => 78221,
		3 => 201847,
		4 => 500798,
		5 => 800199,
		6 => 1075323
	],
];