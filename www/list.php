<?php
try{
       $conn = new PDO('mysql:host=localhost;dbname=filmsdb', 'root', 'cit2318');
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

//select all the students
$query = "SELECT * FROM films";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php

//check to see if there are any results
if($films){
	//loop over the array of films and display their name
	foreach ($films as $film) {
	    echo "<p>{$film['title']}</p>";
	}
}else{
	echo "No records found";
}


?>
</body>
</html>