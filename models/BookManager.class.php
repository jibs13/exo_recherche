<?php

class BookManager
{
	private $db;
	public function __construct($db)
	{
		$this->db = $db;
	}
	// public function search($search)
	// {
	// 	$list = [];
	// 	$recherche = mysqli_real_escape_string($this->db, $search);
	// 	$res = mysqli_query($this->db, "SELECT * FROM books WHERE name LIKE '%".$recherche."%' OR author LIKE '%".$recherche."%' OR country LIKE '%".$recherche."%' OR gender LIKE '%".$recherche."%' OR year LIKE '%".$recherche."%' OR editorial LIKE '%".$recherche."%' OR isbn LIKE '%".$recherche."%' OR price LIKE '%".$recherche."%'");
	// 	while($books = mysqli_fetch_object($res, "Book", [$this->db]))
	// 	{
	// 		$list[] = $books;
	// 	}
	// 	return $list;
	// }
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
			$request .= "AND name LIKE '%".$name."%' "; // $request = $request . " name LIKE '%".$name."%'";
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
			$request .= " AND YEAR (year) >= ' ".$yearmin."' ";
		}

		if($yearmax != "")
		{
			$yearmax = intval($yearmax);
			$request .= " AND YEAR (year) <= '".$yearmax."' ";
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
			$request .= " AND price LIKE >= '".$pricemin."' ";
		}
			if($pricemax != "")
		{
			$pricemax = floatval($pricemax);
			$request .= " AND price LIKE <= '".$pricemax."' ";
		}


		$request .= "  ORDER BY name DESC";
		$list = [];
		$res = mysqli_query($this->db, $request);
		var_dump(mysqli_error($this->db), $request);
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
	// SELECT

		
	// on en a besoin pour la partie login du site internet
	
	// UPDATE
	// public function save(Category $category)
	// {
	// 	$id = intval($article->getId());
	// 	$name = mysqli_real_escape_string($this->db, $category->getName());
	// 	$description = mysqli_real_escape_string($this->db, $category->getDescription());
		
	// 	$res = mysqli_query($this->db, "UPDATE categories SET name='".$name."', description='".$description."'WHERE id='".$id."' LIMIT 1");
	// 	if (!$res)
	// 	{
	// 		throw new Exceptions(["Erreur interne"]);
	// 	}
	// 	return $this->findById($id);
	// }
	// DELETE
	// public function remove(Category $category)
	// {
	// 	$id = intval($article->getId());
	// 	$res = mysqli_query($this->db, "DELETE from categories WHERE id='".$id."' LIMIT 1");
	// 	return $category;
	// }
	// // INSERT
	// public function create($name,$description)
	// {
	// 	$errors = [];
	// 	$category = new Category($this->db);
	// 	$error = $category->setName($name);// return
	// 	if ($error)
	// 	{
	// 		$errors[] = $error;
	// 		// Si on est dedans, alors y'a eu une erreur
	// 	}
	// 	$error = $category->setDescription($description);
	// 	if ($error)
	// 	{
	// 		$errors[] = $error;
	// 		// Si on est dedans, alors y'a eu une erreur
	// 	}
		
	// 	if (count($errors) != 0)
	// 	{
	// 		throw new Exceptions($errors);
	// 	}
	// 	$name = mysqli_real_escape_string($this->db, $category->getName());
	// 	$description = mysqli_real_escape_string($this->db, $category->getDescription());
	// 	$res = mysqli_query($this->db, "INSERT INTO categories (name,description) VALUES('".$name."','".$description."')");
	// 	$id = mysqli_insert_id($this->db);// last_insert_id
	// 	if (!$res)
	// 	{
	// 		throw new Exceptions(["Erreur interne"]);
	// 	}
	// 	$id = mysqli_insert_id($this->db);
	// 	return $this->findById($id);
	// }
}
?>