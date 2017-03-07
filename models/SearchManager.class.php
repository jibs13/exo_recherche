<?php
class SearchManager
{
	private $db;
	public function __construct($db)
	{
		$this->db = $db;
	}
	public function search($search)
	{
		$list = [];
		$recherche = mysqli_real_escape_string($this->db, $search);
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE name LIKE '%".$recherche."%' OR author LIKE '%".$recherche."%' OR country LIKE "'%".$recherche."%' OR gender LIKE '%".$recherche."%' OR year LIKE '%".$recherche."%' OR editorial LIKE '%".$recherche."%' OR isbn LIKE '%".$recherche."%' OR price LIKE '%".$recherche."%');
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
	// SELECT
	public function findAll()
	{
		$list = [];
		$res = mysqli_query($this->db, "SELECT * FROM books ORDER BY id LIMIT 15");
		while ($books = mysqli_fetch_object($res, "Search",[$this->db])) // $article = new article();
		{
			$list[] = $books;
		}
		return $list;
	}
	public function findById($id)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$id = intval($id);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE id='".$id."' LIMIT 1");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}

		public function findByName($name)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$name = mysqli_real_escape_string($this->db, $name);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE name='".$name."' LIMIT 10");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}

		public function findByAuthor($author)
	{
		$list = [];		
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$author= mysqli_real_escape_string($author);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE author='".$author."' LIMIT 20");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
		public function findByCountry($country)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$country = mysqli_real_escape_string($country);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE country='".$country."' LIMIT 50");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
		public function findByGender($gender)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$gender = mysqli_real_escape_string($gender);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE gender='".$gender."' LIMIT 50");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
		public function findByYear($year)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$year = intval($year);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE year='".$year."' LIMIT 50");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
		public function findByEditorial($editorial)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$editorial = mysqli_real_escape_string($editorial);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE editorial='".$editorial."' LIMIT 50");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
		public function findByIsbn($isbn)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$isbn = mysqli_real_escape_string($isbn);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE isbn='".$isbn."' LIMIT 1");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
		public function findByPrice($price)
	{
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$list = [];
		$price = intval($price);
		// /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\ /!\
		$res = mysqli_query($this->db, "SELECT * FROM books WHERE price='".$price."' LIMIT 50");
		$books = mysqli_fetch_object($res, "Books",[$this->db]); // $article = new article();
		while($books = mysqli_fetch_object($res, "Search", [$this->db]))
		{
			$list[] = $books;
		}
		return $list;
	}
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