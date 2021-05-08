Deebee
======

What is it?
-----------
A simple PHP library for MySQL DB access and querying.

Installation
------------
```bash
  cd /path/to/put_deebee_in
  git clone git@github.com:ekdevdes/deebee.git "deebee"
```

Usage
-----

### Setting the Database Credentials (Two Ways)

```php
  require_once("deebee/deebee.php");
```

#### First Way
*Note: All the options in the array are optional (including the "database" option) as there are two different ways of establishing a connection*

```php
  $db = new DeeBee([
    "username" => "root",
    "pw" => "root",
    "hostname" => "localhost",
    "database" => "github_db" 
  ]);
```
**OR**

#### Second Way
*Note: The database name is optional*

```php
  $db = new DeeBee();
  $db->username = "root";
  $db->pw = "root";
  $db->hostname = "localhost";
  $db->database = "github_db";
```

### Establishing a Connection and Selecting a Database
*Note: the database name parameter of the `set_db()` function is optional, and if not specified will use the database name passed in during class instantiation (whether you've done it the first or second way (above))*

```php
$db->connect->set_db("github_db");
```

**OR**

```php
$db->connect();
$db->set_db("github_db");
```

### Last but not least, querying

#### For the shorter queries....
*Note: The `query()` function returns an array of the results*

```php 
  $results = $db->query("SELECT * FROM users");
```

#### For the longer queries, I'm talking 10+ lines you can use a SQL file....
*Note: The first parameter is the path to SQL file (or any file containing SQL really) that you want to use and the second parameter tells DeeBee to use a SQL file for the query string instead of the query string being passed in a parameter*

```php
  $results = $db->query("./github.sql", TRUE);
```

## OK, that's everything...enjoy!
