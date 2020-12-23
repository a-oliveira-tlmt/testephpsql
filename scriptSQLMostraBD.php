<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('test.db');
      }
   }
   
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo nl2br("Opened database successfully\n");
   }

   $sql =<<<EOF
      SELECT * from INVENTARIO;
EOF;

   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo nl2br("UPC = ". $row['UPC'] . "\n");
      echo nl2br("Produto = ". $row['PRODUTO'] ."\n");
      echo nl2br("Estoque = ". $row['ESTOQUE'] ."\n");
      echo nl2br("Preço = ".$row['PRECO'] ."\n\n");
   }
   echo "Operation done successfully\n";
   $db->close();
?>
