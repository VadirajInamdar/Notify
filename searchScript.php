<?php
	require "includes/common.php";
    if(isset($_POST['submit'])&&!empty($_POST['submit']))
    {
        $sname = $_POST['searchstring'];
        $sql="SELECT * FROM public.institute_data WHERE concat_idx @@ phraseto_tsquery('english', '$sname')";
        $rs = pg_query($dbconn, $sql) or die("Cannot execute query: $sql\n");
        $numofrows = pg_num_rows($rs);
        ?>  <b>Result:</b><br><?php   
        for ($j=0; $j < $numofrows; $j++)
        {
            $row = pg_fetch_assoc($rs);
            $resultId=$row['institute_id'];
            $resultAdd=$row['address'];
            $resultName=$row['name'];
            echo "id:". $resultId . ", name:" . $resultName . "address:" . $resultAdd . " <br>\n";
        }
    }  
?>

<!doctype html>
<html>
    <head>
        <title>Search Results</title> 
    </head>
    <body>
        <form action="searchBar.php">
            <button type="submit">Return</button>
        </form>
    </body>
</html>
           
