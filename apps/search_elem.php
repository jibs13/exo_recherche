<?php

$manager = new BookManager($db);
$list = $manager->findAll();
foreach ($list AS $books) 
{
	require('views/search_elem.phtml');
}

?>