<?php
session_save_path("/content/HostingPlus/p/e/peterheylin.com/subdomains/demo/_SESSIONS");
session_start();

// global $start_number = 0;
// global $items_per_page = 3;

function create_navbar($start_number, $items_per_page, $count){
	// creates a navigation bar
	$current_page = $_SERVER["PHP_SLEF"];
	
	if (($start_number < 0) || (! is_numeric($start_number))){
		$start_number = 0;
	}
	
	$navbar = "";
	$prev_navbar = "";
	$next_navbar = "";
	
	if ($count > $items_per_page){
		$nav_count = 0;
		$page_count = 1;
		$nav_passed = false;
		
		while ($nav_count < $count){
			// are we at the current page position
			if (($start_number <= $nav_count) && ($nav_passed != true)){
				$navbar .= "<b><a href=\"$current_page?start=$nav_count\"> [$page_count] </a></b>";
				$nav_passed = true;
				// do we need a "prev" button? 
				if ($start_number != 0){
					$prevnumber = $nav_count - $items_per_page;
					if ($prevnumber < 1){
						$prevnumber = 0;
					}
					$prev_navbar = "<a href=\"$current_page?start=$prevnumber\"> &lt&lt;Prev - </a>";
					}
					
					$nextnumber = $items_per_page + $nav_count;
					
					// do we need a "next" button?
					if ($nextnumber < $count){
						$next_navbar = "<a href=\"$current_page?start=$nextnumber\"> - Next &gt;&gt; </a><br />";
					}
			} else{
					// print normally
					$navbar .= "<a href=\"$current_page?start=$nav_count\"> [page_count] </a>";
					}
					
						$nav_count += $items_per_page;
						$page_count++;
		}
					
					$navbar = $prev_navbar . $navbar . $next_navbar;
					return $navbar;
	}
}


?>