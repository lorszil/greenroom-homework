<?php

   $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = greenroom";
   $credentials = "user = postgres password=Sz28Lor6666";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
       echo "Error : Unable to open database\n";
   } else {
       echo "Opened database successfully\n";
   }

    $query = "DROP TABLE IF EXISTS cars";

    $drop = pg_query($db, $query);
    if(!$drop) {
        echo pg_last_error($db);
    } else {
        echo "Table dropped successfully\n";
    }

    $sql =<<<EOF
          CREATE TABLE TRACTOR
          (BRAND           TEXT    NOT NULL,
          TYPE            TEXT     NOT NULL,
          PRICE        INT     NOT NULL,
          PERFORMANCE        INT     NOT NULL,
          DESCRIPTION           TEXT    NOT NULL);
EOF;

    $sql =<<<EOF
          INSERT INTO TRACTOR (BRAND,TYPE,PRICE,PERFORMANCE,DESCRIPTION)
          VALUES ('PORSCHEs', 'XYV234', 3200000, 340, 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG.' );
EOF;


    $ret = pg_query($db, $sql);
    if(!$ret) {
        echo pg_last_error($db);
    } else {
        echo "Table created successfully\n";
    }
    pg_close($db);
