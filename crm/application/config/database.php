<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the "default" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/




/**/
/*
$active_group = 'default';
$active_record = TRUE;

$efg="";
$data = explode('.',$_SERVER['SERVER_NAME']);
if (!empty($data[0])) {
    $efg = $data[0];
}

$servername = "localhost";
$username = "root";
$password = "";

$dbh =new PDO("mysql:host=$servername;dbname=rebelute_crm", $username, $password);

$sql = "SELECT * FROM tbl_organization WHERE org_id='3'";


//$sql = "SELECT * FROM tbl_organization WHERE org_id='".$this->session->userdata('org_id')."'";

$sth = $dbh->prepare($sql);
$sth->execute(array($efg));
$d_result= $sth->fetchAll(PDO::FETCH_ASSOC);

// We are done with PDO for this purpose so free up some resources!
$dbh = null;
unset($dbh);

//echo $efg;
//echo $d_result[0]["database_name"];
//die();

*/
    /**/



/**/
//Using Subdomain
/*
$efg="";
//$data = explode('.',$_SERVER['SERVER_NAME']);
$data = explode('.','www.rebelute1.crm.com');
if (!empty($data[0])) {
    $efg = $data[1];
}

$active_group = $efg; // this will choose from subdomain1/subdomain2 settings below. Add as many as you need
$active_record = TRUE;

$d_db=$efg.'_crm';

//echo $d_db;
//echo $d_result[0]["database_name"];
//die();

$db[$efg]['hostname'] = 'localhost';
$db[$efg]['username'] = 'root';
$db[$efg]['password'] = '';
$db[$efg]['database'] = $d_db;
$db[$efg]['dbdriver'] = 'mysql';
$db[$efg]['dbprefix'] = '';
$db[$efg]['pconnect'] = TRUE;
$db[$efg]['db_debug'] = TRUE;
$db[$efg]['cache_on'] = FALSE;
$db[$efg]['cachedir'] = '';
$db[$efg]['char_set'] = 'utf8';
$db[$efg]['dbcollat'] = 'utf8_general_ci';
$db[$efg]['swap_pre'] = '';
$db[$efg]['autoinit'] = TRUE;
$db[$efg]['stricton'] = FALSE;
*/

/**/



/*
// The following values will probably need to be changed.
// $db['default']['username'] = "crmuser_new";
$db['default']['username'] = "root";
// $db['default']['password'] = "Reb@123";
$db['default']['password'] = "";

//$db['default']['database'] = $d_result[0]["database_name"];
$db['default']['database'] = 'rebelute_crm';

// The following values can probably stay the same.
$db['default']['hostname'] = "localhost";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = FALSE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

$active_group = "default";
$active_record = TRUE;

*/

// session_start();


//$_SESSION['user_id']='28';

// print_r($_SESSION);
// die(0);


$active_group = 'default';
$active_record = TRUE;

$efg="";


$dbh = new PDO('mysql:host=localhost;dbname=rpdigitel', 'root','');

$sql = "SELECT * FROM database_details where id='".$_SESSION['crm_db_id']."'";

$sth = $dbh->prepare($sql);
$sth->execute(array($efg));
$d_result= $sth->fetchAll(PDO::FETCH_ASSOC);


// We are done with PDO for this purpose so free up some resources!
$dbh = null;
unset($dbh);

// The following values will probably need to be changed.
//$db['default']['username'] = $d_result[0]["user"];
//$db['default']['password'] = $d_result[0]["pass"];
//$db['default']['database'] = $d_result[0]["database_name"];

$db['default']['username'] = $d_result[0]["user"];
$db['default']['password'] = $d_result[0]["pass"];
$db['default']['database'] = $d_result[0]["database_name"];



// The following values can probably stay the same.
$db['default']['hostname'] = "localhost";
$db['default']['dbdriver'] = "mysql";
$db['default']['dbprefix'] = "";
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = FALSE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = "";
$db['default']['char_set'] = "utf8";
$db['default']['dbcollat'] = "utf8_general_ci";

$active_group = "default";
$active_record = TRUE;





/* End of file database.php */
/* Location: ./application/config/database.php */