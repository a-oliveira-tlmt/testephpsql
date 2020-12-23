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
      echo "Opened database successfully\n";
   }

   $upcform = htmlspecialchars($_POST['upc']);

   $sql =<<<EOF
      SELECT * from INVENTARIO
	  WHERE UPC = $upcform;
EOF;

   $ret = $db->query($sql);
   $row = $ret->fetchArray(SQLITE3_ASSOC);
   echo nl2br("\nNome do Produto: ". $row['PRODUTO']."\n");
   echo nl2br("Preço = ". $row['PRECO']."\n");
   echo nl2br("Operation done successfully\n");
   $db->close();
?>
<html>
   <body>
      <button onclick="window.history.back()">Voltar</button>
   </body>
</html>
