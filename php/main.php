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
            }

            while($row = sqlsrv_fetch_rows($stmt)){
                echo "$row";
            }
            
        
        ?>
</body>

</html>