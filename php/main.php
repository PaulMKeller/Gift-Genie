<!DOCTYPE html>
<html>

<head>
    <title>www.gratuityp.com</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <?php       
       
            $serverName = "db638520808.db.1and1.com"; //serverName\instanceName
            $connectionInfo = array( "Database"=>"db638520808", "UID"=>"dbo638520808", "PWD"=>"Register2016!");
            $conn = sqlsrv_connect( $serverName, $connectionInfo);

            if( $conn ) {
                //echo "Connection established.<br />";
            }else{
                 echo "Connection to database could not be established.<br />";
                 die( print_r( sqlsrv_errors(), true));
            }

            $sql = "EXEC sp_Gift_Tree_GetList";
            $stmt = sqlsrv_query( $conn, $sql);

            if( $stmt === false ) {
                die( print_r( sqlsrv_errors(), true));
            } else {
                echo "<table>";
                echo "<tr>";
                echo "<th>Tree ID</th>";
                echo "<th>Question</th>";
                echo "<th>Answer</th>";
                echo "</tr>";

                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC))
                {
                    $id = $row["TreeID"];
                    $question = $row["QuestionText"];
                    $answer = $row["AnswerText"];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$question</td>";
                    echo "<td>$answer</td>";
                    echo "</tr>";

                }

                echo "</table>";
            }
            
        
        ?>
</body>

</html>