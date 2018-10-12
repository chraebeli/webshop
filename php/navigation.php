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
				echo "<a href='",$_SERVER['PHP_SELF'],"?",$head['head'],"'>",$head['head'],"</a>";
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