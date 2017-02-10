<?php
namespace LivrariaAdmin\Form;

use Zend\InputFilter\InputFilter;

class CategoriaFilter extends InputFilter
{
	public function __construct()
	{
		$this->add([
			'name' => 'nome',
			'required' => true,
			'filters' => [
				['name' => 'StripTgs'],
				['name' => 'StrigTrim'],
			],
			'validators' => [
				[
				  'name' => 'NotEmpty',
				  'options' => [
				  	'messages' => ['O nome não pode estar em branco!'],
				  ],

				],
			],
		]);
	}
}