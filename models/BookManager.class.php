<?php

class BookManager
{
	private $db;
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function findAll()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT * FROM books ORDER BY id LIMIT 15");
		while ($books = mysqli_fetch_object($res, "Book", [$this->db])) // $article = new article();
		{
			$list[] = $books;
		}
		return $list;
	}
	

	public function search($name, $author, $country, $gender, $yearmin, $yearmax, $editorial, $isbn, $pricemin, $pricemax)
	{
		$request = "SELECT * FROM books WHERE 1 ";
		if($name != "")
		{
			$name = mysqli_real_escape_string($this->db, $name);
			$request .= " AND name LIKE '%".$name."%' "; // $request = $request . " name LIKE '%".$name."%'";
		}
		if($author != "")
		{
			$author = mysqli_real_escape_string($this->db, $author);
			$request .= " AND author LIKE '%".$author."%' ";
		}
		if($country != "")
		{
			$country = mysqli_real_escape_string($this->db, $country);
			$request .= " AND country LIKE '%".$country."%' ";
		}
		if($gender != "")
		{
			$gender = mysqli_real_escape_string($this->db, $gender);
			$request .= " AND gender LIKE '%".$gender."%' ";
		}
		if($yearmin != "")
		{
			$yearmin = intval($yearmin);
			$request .= " AND YEAR(year) >= ' ".$yearmin."' ";
		}

		if($yearmax != "")
		{
			$yearmax = intval($yearmax);
			$request .= " AND YEAR(year) <= '".$yearmax."' ";
		}

		if($editorial != "")
		{
			$editorial = mysqli_real_escape_string($this->db, $editorial);
			$request .= " AND editorial LIKE '%".$editorial."%' ";
		}
		if($isbn != "")
		{
			$isbn = mysqli_real_escape_string($this->db, $isbn);
			$request .= " AND isbn LIKE '%".$isbn."%' ";
		}
		if($pricemin != "")
		{
			$pricemin = floatval($pricemin);
			$request .= " AND price >= '".$pricemin."' ";
		}
			if($pricemax != "")
		{
			$pricemax = floatval($pricemax);
			$request .= " AND price <= '".$pricemax."' ";
		}


		$request .= "  ORDER BY name DESC";
		$list = [];
		$res = mysqli_query($this->db, $request);
		while ($books = mysqli_fetch_object($res, "Book", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
	
	public function findGenders()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT gender FROM books GROUP BY gender ORDER BY gender");
		while ($gender = mysqli_fetch_assoc($res))
		{
			$list[] = $gender['gender'];
		}
		return $list;
	}
	
}
?>