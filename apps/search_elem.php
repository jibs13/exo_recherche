<?php
$manager = new BookManager($db);

if (isset($_GET['name'], $_GET['author'], $_GET['country'], $_GET['gender'], $_GET['yearmin'],$_GET['yearmax'], $_GET['editorial'], $_GET['isbn'], $_GET['pricemin'], $_GET['pricemax']))
{
	$list = $manager->search($_GET['name'], $_GET['author'], $_GET['country'], $_GET['gender'], $_GET['yearmin'],$_GET['yearmax'], $_GET['editorial'], $_GET['isbn'], $_GET['pricemin'], $_GET['pricemax']);

	var_dump($_GET, $list);
	foreach ($list AS $books) 
	{
		require('views/search_elem.phtml');
	}
}

?>