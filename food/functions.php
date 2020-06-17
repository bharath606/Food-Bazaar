<?php
function insert($table_name, $data){
	global $conn;
	foreach ($data as $key => $value) {
        $str1 .= $key.",";
        $str2 .= "'".$value."',";
    }
    $str1 = substr($str1,0, -1);
    $str2 = substr($str2,0, -1);
    $sql = "INSERT INTO $table_name ($str1) VALUES ($str2)";
    if (mysqli_query($conn, $sql)) {
        return $conn->insert_id;
    } else {
        return "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
function get_row($sql, $format=""){
	global $conn;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	    if ($format=="ARRAY_A") {
	    	return $row;
	    } elseif ($format=="OBJECT_K") {
		    while($row = $result->fetch_assoc()) {
		        $rows[$row["id"]] = (object) $row;
		    }
	    	return $rows;
	    } else {
	        $rows = (object) $row;
    		return $rows;
	    }
	    return $row;
	} else {
	    return NULL;
	}
}
function get_var($sql){
	global $conn;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	    foreach ($row as $key => $value) {
	    	$final = $value;
	    }
	    return $value;
	} else {
	    return NULL;
	}
}
function update($table_name, $data, $where=""){
	global $conn;
	foreach ($data as $key => $value) {
        $str1 .= $key."=";
        $str1 .= "'".$value."',";
    }
    $str1 = substr($str1,0, -1);
	if ($where) {
		$str2 = 'WHERE ';
	}
	foreach ($where as $key => $value) {
		$str2 .= $key."='".$value."' AND";
	}
	$str2 = substr($str2, 0, -4);
	$sql = "UPDATE $table_name SET $str1 $str2";
	if ($conn->query($sql) === TRUE) {
	    return true;
	} else {
	    return "Error updating: " . $conn->error;
	}
}
function delete($table_name, $where){
	global $conn;
	if ($where) {
		$str = 'WHERE ';
	}
	foreach ($where as $key => $value) {
		$str .= $key."='".$value."' AND";
	}
	$str = substr($str, 0, -4);
	$sql = "DELETE FROM $table_name $str";
	if ($conn->query($sql) === TRUE) {
	    return "Deleted successfully";
	} else {
	    return "Error deleting: " . $conn->error;
	}
}
function get_results($sql, $format=""){
	global $conn;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    $i = 0;
	    if ($format=="ARRAY_A") {
	    	while($row = $result->fetch_assoc()) {
		        $rows[$i++] = $row;
		    }
	    	return $rows;
	    } elseif ($format=="OBJECT_K") {
		    while($row = $result->fetch_assoc()) {
		        $rows[$row["id"]] = (object) $row;
		    }
	    	return $rows;
	    } else {
		    while($row = $result->fetch_assoc()) {
		        $rows[$i++] = (object) $row;
		    }

	    	$final = (object) $rows;
	    	return $final;
	    }
	} else {
	    return NULL;
	}
}
function get_option($key){
	return get_var("SELECT option_value FROM options WHERE option_name=");
}
function update_option($key,$value){
	$option_value = get_var("SELECT option_value from options where option_name=");
	$data["option_name"] = $key;
	$data["option_value"] = $value;
	if($option_value){
		update("options",$data);
	} else {
		insert("options",$data);
	}
}
function redirect_to_same(){
    ?>
    <script type="text/javascript">
        window.location.href = "";
    </script>
    <?php
}
function get_current_user_id(){
	global $user_id;
	return $user_id;
}