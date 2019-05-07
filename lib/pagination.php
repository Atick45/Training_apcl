<?php


function print_pagination($pid,$page,$totalPages){
	
$next=($page+1)<$totalPages?($page+1):$totalPages;
$pre=($page-1)>0?($page-1):1;
 
    $links = "<a href='?page=$pid&pg=1'>First</a> ";
	$links .= "<a href='?page=$pid&pg=$pre'>Previous</a> ";
	for ($i = $page-5;$i<=$page+5;$i++) {
		
	 if($i>0 && $i<=$totalPages){
	  $links .= ($i != $page ) ? "<a href='?page=$pid&pg=$i'> $i</a> " : "$page ";
     }		 
	  
	}
	$links.= "<a href='?page=$pid&pg=$next'>Next</a> ";
    $links.= "<a href='?page=$pid&pg=$totalPages'>Last</a> ";
		
	$links.="<form  method='get'>";
	$links.= "<input type='hidden' size='1' name='page' value='$pid' />";
    $links.= "<input type='text' size='1' name='pg' />";
    $links.="<input type='submit' value='go' />";
    $links.= "</form>";
	return $links;
}


?>