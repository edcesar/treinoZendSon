<?php
namespace Livraria\Service;

use Doctrine\ORM\EntityManager;
use Livraria\Entity\Configurator;

class Livro extends AbstractService
{
	public function __construct(EntityManager $em)
	{
		parent::__construct($m);

		$this->entity = 'Livra\Entity\Livro';
	}

	public function insert(array $data)
	{
		$entity = new $this->entity($data);

		$categoria = $this->em->getReference('Livraria\Entity\Categoria', $data['categoria_id']);

		$entity->setCategoria($categoria);

		$this->em->persist($entity);

		$this->em->flush();

		return $entity;
	}

	public function update(array $data)
	{
		$entity = $this->em->getReference($this->entity, $data['id']);
		$entity = Configurator::configure($entity, $data);

		$categoria = $this->em->getReference('Livraria\Entity\Categoria', $data['categoria_id']);
		$entity->setCategoria($categoria);

		$this->em->persist($entity);
		$this->em->flush();

		return $entity;
	}
}