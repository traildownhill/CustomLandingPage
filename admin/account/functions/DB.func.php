<?php
// ACCOUNT SECTION FUNCTION
//Insert data into any table
function add_data($query,$connect,$message){
	$result = $connect->query($query);
	if ($result === true) {
		$messagetype = "1";
	} else {
		$messagetype = "0";
	}
	$message1 = $connect->error;
	message($message,$messagetype);
}

//Check if data and return result
function select_data($query,$connect){
	$result = $connect->query($query);
	return $result;
}

//Update data into a table
function update_data($query,$connect,$message){
	$result = $connect->query($query);
	if ($result->num_rows > 0) {
		return $result;
	}
	if ($result === true) {
		$messagetype = "1";
	} else {
		$messagetype = "0";
	}
	$message1 = $connect->error;
	message($message,$message1,$messagetype);
}

//Delete data and return message
function delete_data($query,$connect,$message){
	$result = $connect->query($query);
	if ($result->num_rows > 0) {
		return $result;
	}
	if ($result === true) {
		$messagetype = "1";
	} else {
		$messagetype = "0";
	}
	$message1 = $connect->error;
	message($message,$message1,$messagetype);
}

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


// getting roles of user
function get_roles($connect){
	$sql = "SELECT * FROM roles";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result;
	}
}

function get_role_name($connect,$id){
	$sql = "SELECT * FROM roles WHERE id=$id";
	$rslt = $connect->query($sql);
	$result = $rslt->fetch_assoc();
	if ($rslt->num_rows > 0) {
		return $result['name'];
	} else {
		return "No role found";
	}
}

function create_accountaction($connect,$name,$email,$password,$ucategory,$aumember,$loggedID){

	$options = [
		'cost' => 12,];
	$hash_pass = password_hash("$password", PASSWORD_BCRYPT, $options);
	$sql = "INSERT INTO tblaccount VALUES ('','$name','$email','$hash_pass','Inactive','$ucategory','$aumember','No','0','0')";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function update_account($connect,$name,$email,$pass,$ucategory,$au_member,$id){

	$sql = "UPDATE tblaccount SET name='$name',email='$email',pass='$pass',ucategory='$ucategory',au_member='$au_member' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function delete_accountaction($connect,$id){
	$sql = "DELETE FROM tblaccount WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return "1";
	} else {
		return "0";
	}
}

function activate_action($connect,$id){

	$sql = "UPDATE tblaccount SET status='Active' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function deactivate_action($connect,$id){

	$sql = "UPDATE tblaccount SET status='Inactive' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function subscribe_action($connect,$id){

	$sql = "UPDATE tblaccount SET subcribe='Yes' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function unsubscribe_action($connect,$id){

	$sql = "UPDATE tblaccount SET subcribe='No' WHERE id=$id";
	$result = $connect->query($sql);
	if ($result === true) {
		return 1;
	} else {
		return 0;
	}
}

function get_accounts($connect){
	//ORDER BY deadline ASC
	$sql = "SELECT * FROM tblaccount";
	$result = $connect->query($sql);
		return $result;
}


function get_accountaction($connect,$id){
	$sql = "SELECT * FROM tblaccount WHERE id='$id'";
	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		return $result->fetch_assoc();
	} else {
		return "0";
	}
}


?>


