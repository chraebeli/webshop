<?php
//Definition der Klasse Navigation
class Navigation {
	//Definition der Eigenschaften
	public $categories;
	
	//Definition der Methode addHeadCategorie
	function addHeadCategorie($HeadCategorie) {
		$this->categories[] = array("head" => $HeadCategorie);
	}
	
	function showCategories(){
		echo "<ul>";
		foreach ($this->categories as $head) {
			echo "<li>";
				//echo "<a href='.?",$head['head'],"'>",$head['head'],"</a>";
				echo "<a href='",$_SERVER['PHP_SELF'],"?",urlencode($head['head']),"'>",$head['head'],"</a>";
			echo "</li>";
			if(isset($_GET[$head['head']])) {
				$this->showChildCategories($head['head']);
			}	
		}
		echo "</ul>";
	}
	
	function addChildCategorie($HeadCategorie, $ChildCategorie){
		foreach ($this->categories as &$categorie){
			if(strcmp($categorie['head'], $HeadCategorie)==0){
				$categorie[] = $ChildCategorie;
			}
		}
		unset($categorie);
	}
	
	function showAllCategories(){
		foreach ($this->categories as $elements){
			echo "<li>",$elements['head'];
			unset($elements['head']);
			foreach($elements as $element) {
				echo "<ul>",$element,"</ul>";
			}
			echo "</li>";
		}
	}
	
	function showChildCategories($HeadCategorie){
		foreach ($this->categories as $elements){
			if($elements['head']==$HeadCategorie){
				unset($elements['head']);
				foreach($elements as $element) {
					echo "<ul><li>";
						echo "<a href='",$_SERVER['PHP_SELF'],"?",$element,"'>",$element,"</a>";
					echo "</li></ul>";
				}
			}
		}
	}
}

class Headmenu {
	//Definition der Eigenschaften
	public $titles;
	
	//Definition der Methode addHeadCategorie
	function addTitle($Title) {
		$this->titles[] = array("title" => $Title);
	}
	
	function showTitles(){
		echo "<ul>";
		foreach ($this->titles as $title) {
			echo "<li>";
				echo "<a href='",$_SERVER['PHP_SELF'],"?",urlencode($title['title']),"'>",$title['title'],"</a>";
			echo "</li>";	
		}
		echo "</ul>";
	}
	
	function addSubTitle($Title, $SubTitle){
		foreach ($this->titles as &$title){
			if(strcmp($title['title'], $Title)==0){
				$title[] = $SubTitle;
			}
		}
		unset($title);
	}
	
	function showAllTitles(){
		foreach ($this->titles as $elements){
			echo "<li>",$elements['title'];
			unset($elements['title']);
			foreach($elements as $element) {
				echo "<ul>",$element,"</ul>";
			}
			echo "</li>";
		}
	}
}	
/*	function showSubTitles($Title){
		foreach ($this->titles as $elements){
			if($elements['title']==$Title){
				unset($elements['head']);
				foreach($elements as $element) {
					echo "<ul><li>";
						echo "<a href='",$_SERVER['PHP_SELF'],"?",$element,"'>",$element,"</a>";
					echo "</li></ul>";
				}
			}
		}	
	}
}*/