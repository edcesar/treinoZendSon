<?php
namespace LivrariaAdmin\Form;

use Zend\Form\Form;

class Categoria extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('Categoria');

		$this->setAttribute('method', 'post');
		$this->setInputFilter(new CategoriaFilter);

		$this->add([
			'name' => 'id',
			'attributes' => [
				'type' => 'hidden',
			],

		]);

		$this->add([
			'name' => 'nome',
			'options' => [
				'type' => 'text',
				'label' => 'Nome',
			],	
			'attributes' => [
				'id' => 'nome',
				'placeholder' => 'Digite o seu nome',
			],
		]);

		$this->add([
			'name' => 'submit',
			'type' => 'Zend\Form\Element\Submit',
			'attributes' => [
				'value' => 'Salvar',
				'class' => 'btn btn-success'
			],
		]);
	}
}