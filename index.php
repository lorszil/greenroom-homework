<?php

    $host        = "host = 127.0.0.1";
    $port        = "port = 5432";
    $dbname      = "dbname = greenroom";
    $credentials = "user = postgres password=Sz28Lor6666";

    header('Content-Type: application/json');


    $db = pg_connect( "$host $port $dbname $credentials"  );

    // Performing SQL query
    $query = 'SELECT * FROM TRACTOR';
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());

    $tractorArray = array();

    // Printing results in HTML
    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        $lineArray = array();
        array_push($tractorArray, $line);
    }
    echo json_encode($tractorArray);


    pg_close($db);




