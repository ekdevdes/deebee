<?php

class DeeBee {
	public $username;
	public $pw;
	public $hostname;
	public $database;
	public $results;
	
	protected $handle;
	protected $db;
	
	public function __construct($info = NULL){
		
		if($info){
			if(array_key_exists("username", $info)) $this->username = $info["username"];
			if(array_key_exists("pw", $info)) $this->pw = $info["pw"];
			if(array_key_exists("hostname", $info)) $this->hostname = $info["hostname"];
			if(array_key_exists("database", $info)) $this->database = $info["database"];
		}
				
	}

	public function connect(){ 
		$this->handle = mysql_connect($this->hostname, $this->username, $this->pw) or die("Unable to connect to MySQL database."); 
		return $this;
	}
	
	public function set_db($db_name = NULL){ 
	
		$deebee;
		
		if ($db_name) {
			$deebee = $db_name;
		} else {
			$deebee = $this->database;
		}
	
		$this->db = mysql_select_db($deebee, $this->handle) or die("Could not select the database."); 
		return $this;
	}
	
	public function query($query, $isSQLFile = false) {
		
		$q;
		if (!$isSQLFile) {
			$q = $query;
		} else {
			$q = file_get_contents($query);
		}
		
		if ($per_page) {
			$this->per = $per_page;
		}
		
		$result = mysql_query($q);
		$r = [];
		
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			array_push($r, $row);
		}

		return $r;
		
	}

}
