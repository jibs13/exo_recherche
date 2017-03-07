<?php
$manager = new BookManager($db);
$list = $manager->findAll();
require('views/search.phtml');
?>