<?
class Search
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
	private $book;

	public function __construct($db)
	{
		$this->db=$db;
	}

	public function getId()
	{
		return $this->$db;
	}

	public function getName()
	{
		return $this->$db;
	}

	public function getAuthor()
	{
		return $this->$db;
	}

	public function getCountry()
	{
		return $this->$db;
	}

	public function getGender()
	{
		return $this->$db;
	}

	public function getYear()
	{
		return $this->$db;
	}

	public function getEditorial()
	{
		return $this->$db;
	}

	public function getIsbn()
	{
		return $this->$db;
	}

	public function getPrice()
	{
		return $this->$db;
	}
}
?>