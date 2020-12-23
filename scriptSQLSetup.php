<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('test.db');
      }
   } //Funciona após instalação da extensão SQLite3 no PHP.ini

   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      CREATE TABLE INVENTARIO
      (UPC CHAR(13) PRIMARY KEY NOT NULL,
      PRODUTO TEXT NOT NULL,
      ESTOQUE INT,
      PRECO REAL);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>
<html>
   <body>
      <p><br></p>
      <button onclick="window.history.back()">Voltar</button>
      <p><br></p>
	  <hr>
   </body>
</html>