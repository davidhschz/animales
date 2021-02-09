<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $registroAnimal = [
		'nombre'=>'required',
		'edad'=>'required',
		'tipo'=>'required',
		'descripcion'=>'required',
		'comida'=>'required'
	];

	public $registroAnimalPUT = [
		'nombre'=>'required',
		'edad'=>'required',
		'descripcion'=>'required',
		'comida'=>'required'
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}