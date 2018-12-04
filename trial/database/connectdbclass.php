<?php
/*
@author:Faith Kilonzi

*/

require_once('config_db.php');

/*
* database connection class
*/
class Dbconnection 
{
	private $connect;
	private $result;


/*
* get the connection to the database
*@return true or false
*/
public function getConnection(){
    $this->connect =mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	if (mysqli_connect_errno()) {
		return false;
	}
	else{
		return true;
	}

}

/* close the database connection
*@return null if successful
*/
public function closeConnection(){
	if($this->getConnection())
        mysqli_close($this->connect);


}

/*
* execute an sql query
*@return true or false
*/
public function query($sql){
    if(!$this->getConnection()) {
        return false;
    }

    else{
    	$this->result = mysqli_query($this->connect, $sql);
        if(mysqli_affected_rows($this->connect) > 0){
         return true;
        }
        else{
            return false;
        }
    	
    }
}
/*
* execute prepare statement query
*@return true or false
*/
public function preparequery($sql, $type, $inputs){
    if(!$this->getConnection()) {
        return false;
    }

    else{
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param($type);
        $stmt->execute();
        if ($stmt->errno) {
          return false;
        } else {
            $stmt->close();
            return true;
        }

        $this->result = mysqli_query($this->conn, $sql);
    }
}

/**
@fetchall fetches all the elments in the database 
*/
public function fetch(){
    if ($this->result == false) {
        return false;
    }
    else {
    return mysqli_fetch_assoc($this->result);
    }
}

/**
@fetchall fetches all the elments in the database 
*/
public function fetchall(){
    if ($this->result == false) {
        return false;
    }
    else {
    return mysqli_fetch_all($this->result);
    }
}

/**
@getRow gets a whole table row in the database 
*/
public function getRow(){
    if ($this->result == false) {
        return 0;
    }
    else {
    return mysqli_num_rows($this->result);
    }
}




}

?>