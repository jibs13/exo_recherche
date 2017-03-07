<?php
$count=0;
while ($count<count($list))
{
	$book = $list[$count];
	require('views/search_elem.phtml');
	$count++;
	
}
?>