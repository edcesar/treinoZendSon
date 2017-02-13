<?php
namespace LivrariaAdmin\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;

class Livro extends Form
{
	protected $m;

	public function __construct($name = null, EntityManager $em)
	{
		parent::__construct('Livro');
		
		$this->em = $em;

		$this->setAttribute('method', 'post');
	#	$this->setInputFilter(new CategoriaFilter);

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
			'name' => 'valor',
			'options' => [
				'type' => 'text',
				'label' => 'Valor',
			],	
			'attributes' => [
				'id' => 'valor',
				'placeholder' => 'Digite o valor',
			],
		]);

		$this->add([
			'name' => 'isbn',
			'options' => [
				'type' => 'text',
				'label' => 'ISBN',
			],	
			'attributes' => [
				'id' => 'isbn',
				'placeholder' => 'Digite o ISBN',
			],
		]);

		$this->add([
			'name' => 'autor',
			'options' => [
				'type' => 'text',
				'label' => 'Autor',
			],	
			'attributes' => [
				'id' => 'autor',
				'placeholder' => 'Digite o nome do autor',
			],
		]);




		$repository = $this->em->getRepository('Livraria\Entity\Categoria');
		$categorias = $repository->fetchPairs();

		$categoria = new Select();
		$categoria->setLabel('Categoria')
			->setName('categoria')
			->setOptions([
				'value_options' => $categorias
			]);

		$this->add($categoria);

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