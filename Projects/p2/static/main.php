<?php

//If no articles are given, say nothing found.
//Otherwise, find $articles in data.txt
//and display them with their respective content.
function printArticles($articles) {
	if (count($articles) == 0) {
		echo '<div class="notice">Nothing to see here. <a class="link green" href="write.php">Write An Article</a></div>';
	}
	else {
		for ($i=0; $i < count($articles) ; $i++) {
			echo '
			<div class="article">
				<div class="left">
					<div class="title"><a class="link" href="view.php?article=' . preg_replace("/ /","+", $articles[$i][0]) .'&amp;submit=Submit">' . $articles[$i][0] . '</a></div>
					<div class="content">' . $articles[$i][3] .'</div>
					<div class="info">
						In
						<div class="category"><a class="green link" href="search.php?search=&amp;title=&amp;author=&amp;category=' . preg_replace("/ /","+", $articles[$i][2]) .'&amp;content=&amp;date=&amp;submit=Submit">' . $articles[$i][2] . '</a></div>
						by
						<div class="author"><a class="green link" href="search.php?search=&amp;title=&amp;author=' . preg_replace("/ /","+", $articles[$i][1]) .'&amp;category=&amp;content=&amp;date=&amp;submit=Submit">' . $articles[$i][1] . '</a></div>
						on
						<div class="date">' . $articles[$i][5] . '</div>
					</div>
					<div class="info">
						<div class="rec">' . $articles[$i][6] . ' Recommended this</div>
					</div>
				</div>
				<div class="right">
					<div class="image">
						<a class="" href="view.php?article=' . preg_replace("/ /","+", $articles[$i][0]) .'&amp;submit=Submit">
							<img alt="" src="' . $articles[$i][4] . '">
						</a>
					</div>
				</div>
			</div>
			';
		}
	}
}

//Retrieve queried $articles from data.txt and display their respective content.
function view($articles) {
	for ($i=0; $i < count($articles) ; $i++) {
		echo '
		<div class="view">
			<div class="title">' . $articles[$i][0] . '</div>
			<div class="info">
				In
				<div class="category"><a class="green link" href="search.php?search=&amp;title=&amp;author=&amp;category=' . preg_replace("/ /","+", $articles[$i][2]) .'&amp;content=&amp;date=&amp;submit=Submit">' . $articles[$i][2] . '</a></div>
				by
				<div class="author"><a class="green link" href="search.php?search=&amp;title=&amp;author=' . preg_replace("/ /","+", $articles[$i][1]) .'&amp;category=&amp;content=&amp;date=&amp;submit=Submit">' . $articles[$i][1] . '</a></div>
				on
				<div class="date">' . $articles[$i][5] . '</div>
			</div>
			<div class="info">
				<div class="rec">' . $articles[$i][6] . ' Recommended this</div>
			</div>
			<div class="image"><img alt="" src="' . $articles[$i][4] . '"></div>
			<div class="content">' . $articles[$i][3] . '</div>
		</div>';
	}
}

//If $query is found in any of the fields for a given article in $array,
//add that article to $toprint. Using elseif statement prevents duplicates here.
function search($query, $array) {
	$toprint = array();
	for ($i1 = 0; $i1 < count($array); $i1++) {
		if(stripos($array[$i1][0], $query) !== false) {
			$toprint[] = $array[$i1];
		}					
		elseif(stripos($array[$i1][1], $query) !== false) {
			$toprint[] = $array[$i1];
		}
		elseif(stripos($array[$i1][2], $query) !== false) {
			$toprint[] = $array[$i1];
		}
		elseif(stripos($array[$i1][3], $query) !== false) {
			$toprint[] = $array[$i1];
		}	
		elseif(stripos($array[$i1][4], $query) !== false) {
			$toprint[] = $array[$i1];
		}
		elseif(stripos($array[$i1][5], $query) !== false) {
			$toprint[] = $array[$i1];
		}
	}
	return $toprint;
}

//Keep track of separate arrays for input $title, $author, $category, $content,
//$date. If any of these are found for an article in $array, add that article to
//the respective helper array. Then get the intersection of all the helper arrays
//that are not empty.
function advancedSearch($title, $author, $category, $content, $date, $array) {

	//helper arrays
	$titlematches = array();
	$authormatches = array();
	$categorymatches = array();
	$contentmatches = array();
	$datematches = array();

	for ($i1 = 0; $i1 < count($array); $i1++) {
		// Title field
		if((! empty($title)) && (stripos($array[$i1][0], $title) !== false)) {
			$titlematches[] = $array[$i1];
		}
		//Author field
		if((! empty($author)) && (stripos($array[$i1][1], $author) !== false)) {
			$authormatches[] = $array[$i1];
		}
		//Category field
		if((! empty($category)) && (stripos($array[$i1][2], $category) !== false)) {
			$categorymatches[] = $array[$i1];
		}
		//Content field
		if((! empty($content)) && (stripos($array[$i1][3], $content) !== false)) {
			$contentmatches[] = $array[$i1];
		}
		//Date field
		if((! empty($date)) && (stripos($array[$i1][5], $date) !== false)) {
			$datematches[] = $array[$i1];
		}
	}

	//If a helper array is not empty, add it for use in intersection
	$args = array();
	if ( !empty($titlematches) ) $args[] = $titlematches;
	if ( !empty($authormatches) ) $args[] = $authormatches;
	if ( !empty($categorymatches) ) $args[] = $categorymatches;
	if ( !empty($contentmatches) ) $args[] = $contentmatches;
	if ( !empty($datematches) ) $args[] = $datematches;

	//setup blank array
	$toprint = array();

	//add intersection of all non-blank helper arrays to $toprint
	if ( count($args) == 0 ) {
		$toprint = array();
	}
	elseif ( count($args) == 1 ) {
		$toprint = $args[0];
	}
	else {
		$toprint = call_user_func_array('array_intersect', $args);
	}

	return $toprint;
}

//Checks if $input is not empty, less than 80 characters, and contains
//only alphanumeric characters, whitespace, hyphens, and underscores.
function isValid($input) {
	if(empty($input)){
		return "empty";
	}
	if(strlen($input) > 80) {
		return "length";
	}
	if(! preg_match("/^[\w\s-]+$/", $input)) {
		return "invalid";
	}
	return true;
}	

//Validate URL of $pic and check that it ends in one of the extensions
//(.jpg | .jpeg | .png | .gif)
function isPic($pic) {
	if(!empty($pic)){
		if (!filter_var($pic, FILTER_VALIDATE_URL)) {
			return false;
		}
		if(! preg_match("/((.jpg)|(.jpeg)|(.png)|(.gif))$/", $pic)) {
			return false;
		}
	}
	return true;
}

//Validate $title is not contained in $array.
function isDupe($title, $array) {
	for ($i1 = 0; $i1 < count($array); $i1++) {
		// Title field
		if(! empty($title)) {

			//convert queries to lowercase and remove whitespace
			$new = strtolower(preg_replace('/\W+/', '', $title));
			$existing = strtolower(preg_replace('/\W+/', '', ($array[$i1][0])));

			if ($new == $existing) {
				return true;
			}

		}
	}

	return false;
	
}

?>