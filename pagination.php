<?php
function print_pagination($page,$totalPages,$page_id){
	
$next=($page+1)<$totalPages?($page+1):$totalPages;
$pre=($page-1)>0?($page-1):1;
 
    $links = "<a href='home.php?page=$page_id&pagination=1'>First</a> ";
	$links .= "<a href='home.php?page=$page_id&pagination=$pre'>Previous</a> ";
	for ($i = $page-5;$i<=$page+5;$i++) {
		
	 if($i>0 && $i<=$totalPages){
	  $links .= ($i != $page ) ? "<a href='home.php?page=$page_id&pagination=$i'> $i</a> " : "$page ";
     }		 
	  
	}
	$links.= "<a href='home.php?page=$page_id&pagination=$next'>Next</a> ";
    $links.= "<a href='home.php?page=$page_id&pagination=$totalPages'>Last</a> ";
		
	$links.="<form  method='get'>";
    $links.= "<input type='text' size='1' name='page' />";
    $links.="<input type='submit' value='go' />";
    $links.= "</form>";
	return $links;
}
?>