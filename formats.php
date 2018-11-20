<?php
if(preg_match('/Dressage/',$className) || preg_match('/Western Dressage/',$className)){
 $part = explode(':', $results[$i]);
$entry = $part[1]. ' - ' .$part[0].'%';
}elseif(preg_match('/Eventing/',$className)){
	 $part = explode(':', $results[$i]);
	 $entry = $part[4]. ' - DR: ' .$part[1].' / XC: '.$part[2]. ' / JP: ' .$part[3]. ' [Total: ' .$part[0]. ']';
	
	
}else{
$entry = $classEntries[$i];
}
?>