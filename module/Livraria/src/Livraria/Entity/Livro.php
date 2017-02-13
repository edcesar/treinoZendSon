<?php
namespace Livraria\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="livros")
 * @ORM\Entity(repositoryClass="Livraria\Entity\LivroRepository")
 */ 
class Livro
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var int
	 */ 
	protected $id;

	/**
	 * @ORM\Column(type="text")
	 * @var string
	 */ 
	protected $nome;

	/**
	 * @ORM\Column(type="")
	 * @ORM\ManyToOne(targetEntity="Livraria\Entity\Categoria"), inversedBy="livro"
	 * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
	 */ 
	protected $categoria;
	protected $autor;
	protected $isbn;
	protected $valor;
}