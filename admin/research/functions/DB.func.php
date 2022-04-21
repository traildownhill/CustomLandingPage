 <?php
// ==========================================ACCOUNT SECTION FUNCTION===============================================//

function get_users($connect){
	$sql = "SELECT * FROM tblaccount ORDER BY id ASC";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	}
}

function get_user_data($connect,$id){
	$sql = "SELECT * FROM tblaccount WHERE id=$id";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	}
}

// ============================================RESEARCH SECTION FUNCTION============================================//

function get_research($connect){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM tblresearch";
	$result = $connect->query($sql);
		return $result;
}

function get_research_id($connect, $id){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM tblresearch WHERE id= '$id'";
	$result = $connect->query($sql);
		return $result;
}

function get_researchaction($connect,$id){
	$sql = "SELECT * FROM tblresearch WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

function get_researchrelated($connect, $fstudy, $tags){
	$sql = "SELECT * FROM tblresearch WHERE field_of_study LIKE '%" . $fstudy . "%' OR tagging LIKE '%" . $tags . "%'";
	$result1 = $connect->query($sql);
		return $result1;
}

function create_researchaction($connect,$title, $abstract, $main_author,$c_author, $dpub, $fstudy, $pdf_file,$tags){
	$sql = "INSERT INTO tblresearch VALUES ('','$title','$abstract','$main_author','$c_author','$dpub','$fstudy','$pdf_file','$tags','0','0')";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return $sql;
	}
}
function create_authoraction($connect,$name, $email,$profession,$created){
	$sql = "INSERT INTO tblauthor VALUES ('','$name','$email','$profession','','','$created')";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return $sql;
	}
}

function update_researchaction($connect,$title, $abstract, $fstudy, $pdf_file,$tagging,$id){
	$sql = "UPDATE tblresearch SET title='$title',abstract='$abstract', field_of_study='$fstudy',pdf_file='$pdf_file',tagging ='$tagging' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function delete_researchaction($connect,$id){
	$sql = "DELETE FROM tblresearch WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return "1";
	} else {
		return "0";
	}
}

function get_research_by_title($connect,$title){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		$sql_string = "SELECT * FROM tblresearch WHERE abstract LIKE '%" . $word . "%' OR title LIKE '%" . $word ."%' OR";
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}

function get_journal_by_title($connect,$title){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		$sql_string = "SELECT * FROM tbljournal WHERE description LIKE '%" . $word . "%' OR title LIKE '%" . $word ."%' OR";
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}

function get_article_by_title($connect,$title){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		$sql_string = "SELECT * FROM tblarticle WHERE a_description LIKE '%" . $word . "%' OR a_title LIKE '%" . $word ."%' OR";
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}

function get_news_by_title($connect,$title){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		$sql_string = "SELECT * FROM tblnews WHERE name LIKE '%" . $word . "%' OR mobile LIKE '%" . $word ."%' OR";
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}
// =====================================================================
function get_author($connect){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM tblauthor";
	$result = $connect->query($sql);
		return $result;
}

function get_author_inside_research($connect,$author){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM tblresearch WHERE main_author LIKE '%".$author."%' OR co_authors LIKE '%".$author."%' ";
	$result = $connect->query($sql);
		return $result;
}


// ================================================
// Journal
function get_journalaction($connect,$id){
	$sql = "SELECT * FROM tbljournal WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

function get_journalrelated($connect, $fstudy, $tags){
	$sql = "SELECT * FROM tbljournal WHERE fstudy ='$fstudy' OR tagging = '$tags'";
	$result1 = $connect->query($sql);
		return $result1;
}

// Article
function get_articleaction($connect,$id){
	$sql = "SELECT * FROM tblarticle WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

function get_articlerelated($connect,$tags){
	$sql = "SELECT * FROM tblarticle WHERE a_tagging = '$tags'";
	$result1 = $connect->query($sql);
		return $result1;
}

// News
function get_newsaction($connect,$id){
	$sql = "SELECT * FROM tblnews WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}

function get_newsrelated($connect,$tags){
	$sql = "SELECT * FROM tblnews WHERE tags = '$tags'";
	$result1 = $connect->query($sql);
		return $result1;
}

// ======================================================================
function get_researchfilter($connect,$title,$req){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		if($req == "v"){
			$sql_string = "SELECT * FROM tblresearch WHERE abstract LIKE '%" . $word . "%' OR title LIKE '%" . $word ."%' ORDER BY views DESC OR ";
		}
		else if($req == "c"){
			$sql_string = "SELECT * FROM tblresearch WHERE abstract LIKE '%" . $word . "%' OR title LIKE '%" . $word ."%' ORDER BY cites DESC OR ";
		}
	}
 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}

function get_journalfilter($connect,$title, $req){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		if($req == "v"){
			$sql_string = "SELECT * FROM tbljournal WHERE description LIKE '%" . $word . "%' OR title LIKE '%" . $word ."%'  ORDER BY views DESC OR";
		}
		else if($req == "c"){
			$sql_string = "SELECT * FROM tbljournal WHERE description LIKE '%" . $word . "%' OR title LIKE '%" . $word ."%'  ORDER BY cites DESC OR";
		}
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}

function get_articlefilter($connect,$title, $req){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		if($req == "v"){
			$sql_string = "SELECT * FROM tblarticle WHERE a_description LIKE '%" . $word . "%' OR a_title LIKE '%" . $word ."%' ORDER BY a_views DESC OR";
		}
		else if($req == "c"){
			$sql_string = "SELECT * FROM tblarticle WHERE a_description LIKE '%" . $word . "%' OR a_title LIKE '%" . $word ."%' ORDER BY a_cites DESC OR";
		}
		
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}

function get_newsfilter($connect,$title, $req){
	//value from db
	$bsearch = $title;
	//save the keyword from the url
	$trim_search = trim($bsearch);

	$display_words = "";
	// seperate each of the keywords
	$keywords = explode(' ', $trim_search); 
	//loop to search 
	foreach($keywords as $word)
	{
		if($req == "v"){
			$sql_string = "SELECT * FROM tblnews WHERE name LIKE '%" . $word . "%' OR mobile LIKE '%" . $word ."%' ORDER BY views DESC OR";
		}
		else if($req == "c"){
			$sql_string = "SELECT * FROM tblnews WHERE name LIKE '%" . $word . "%' OR mobile LIKE '%" . $word ."%' ORDER BY cites DESC OR";
		}
	}

 	$sql_string = substr($sql_string, 0, strlen($sql_string) - 3);
	$result = $connect->query($sql_string);
		return $result;
}
?>


