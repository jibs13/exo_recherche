<?php

$manager = new BookManager($db);
if isset($_GET['name'], $_GET['author'], $_GET['country'], $_GET['gender'], $_GET['year'], $_GET['editorial'], $_GET['isbn'], $_GET['price'])
{
	$list = $manager->search($_GET['name'], $_GET['author'], $_GET['country'], $_GET['gender'], $_GET['year'], $_GET['editorial'], $_GET['isbn'], $_GET['price']);
	foreach ($list AS $books) 
	{
		require('views/search_elem.phtml');
	}
}

?>