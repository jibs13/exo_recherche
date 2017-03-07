<?php

class Book
{
	private $id;
	private $name;
	private $author;
	private $country;
	private $gender;
	private $year;
	private $editorial;
	private $isbn;
	private $price;

	private $db;

	public function __construct($db)
	{
		$this->db=$db;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function getGender()
	{
		return $this->gender;
	}

	public function getYear()
	{
		return $this->year;
	}

	public function getEditorial()
	{
		return $this->editorial;
	}

	public function getIsbn()
	{
		return $this->isbn;
	}

	public function getPrice()
	{
		return $this->price;
	}
}
?>