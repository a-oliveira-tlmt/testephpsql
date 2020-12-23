<?php
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('test.db');
      }
   }
   
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   
   $upcform = htmlspecialchars($_POST['upc']);
   $prodform = htmlspecialchars($_POST['prod']);
   $estoqueform = (int)$_POST['estoque'];
   $precoform = (float)$_POST['preco'];

   $sql =<<<EOF
      INSERT INTO INVENTARIO (UPC,PRODUTO,ESTOQUE,PRECO)
      VALUES ('$upcform', '$prodform', $estoqueform, $precoform);
EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>
<html>
   <body>
      <button onclick="window.history.back()">Voltar</button>
   </body>
</html>