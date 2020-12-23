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

   $sql =<<<EOF
      INSERT INTO INVENTARIO (UPC,PRODUTO,ESTOQUE,PRECO)
      VALUES ('7891200007929', 'Durepoxi Loctite 50g', 37, 3.00 );
	  
      INSERT INTO INVENTARIO (UPC,PRODUTO,ESTOQUE,PRECO)
      VALUES ('7895144896502', 'Goma de Mascar Mentos PureFruit Melancia 8.5g Sem Açúcar 8 Unidades.', 7, 1.50);
	  
      INSERT INTO INVENTARIO (UPC,PRODUTO,ESTOQUE,PRECO)
      VALUES ('7891027179700', 'Agenda 2020 Tilibra Pepper 160 Folhas', 37, 3.00 );

EOF;

   $ret = $db->exec($sql);
   if(!$ret) {
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();
?>
