<?php
$manager = new BookManager($db);
$genders= $manager->findGenders();
require('views/search.phtml');
?>