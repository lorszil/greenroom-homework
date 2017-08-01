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

   $sql =<<<EOF
      CREATE TABLE TRACTOR
          (BRAND           TEXT    NOT NULL,
          TYPE            TEXT     NOT NULL,
          PRICE        INT     NOT NULL,
          PERFORMANCE        INT     NOT NULL,
          DESCRIPTION           TEXT    NOT NULL);
EOF;


   /*$sql =<<<EOF
          INSERT INTO TRACTOR (BRAND,TYPE,PRICE,PERFORMANCE,DESCRIPTION)
          VALUES ('PORSCHEs', 'XYV234', 3200000, 340, 'THE QUICK BROWN FOX JUMPS OVER THE LAZY DOG.' );
EOF;*/



    function insertRandom($brand, $type, $price, $performance, $description) {
        // prepare statement for insert
        $sql = 'INSERT INTO tractor (BRAND,TYPE,PRICE,PERFORMANCE,DESCRIPTION) VALUES(:brand, :type, :price, :performance, :description';
        $stmt = $this->pdo->prepare($sql);


        // pass values to the statement
        $stmt->bindValue(':brand', $brand);
        $stmt->bindValue(':type', $type);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':performance', $performance);
        $stmt->bindValue(':description', $description);

        echo "put";

        // execute the insert statement
        $stmt->execute();

        // return generated id
        return $this->pdo->lastInsertId('stocks_id_seq');
    }

    for ($x = 0; $x<5;$x++) {
        echo "ok";

        $brands = array("John Deere", "Massey Ferguson", "MTZ", "New Holland", "Zetor");
        $brand = array_rand($brands);

        $type = substr(md5(microtime()),rand(0,26),4);

        $price = rand(500000, 150000000);

        $performance = rand(100, 400);

        $description = substr(md5(microtime()),rand(0,26),8);


        insertRandom($brand, $type, $price, $performance, $description);

    }

    $ret = pg_query($db, $sql);
   if(!$ret) {
       echo pg_last_error($db);
   } else {
       echo "Table created successfully\n";
   }

   pg_close($db);
