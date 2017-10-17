<!DOCTYPE html>
<html>
<head>
	<title>HAHAHAHAH</title>
</head>
<body>
<?php
$cor=array("red","pink","green","black","gray");
$nomes=array("alan","maria","luciana","joao");
foreach ($nomes as $key => $value){
      	?>
      	<div style="background-color: <?php echo $cor[$key];?>;color:<?php echo $cor[($key+1)%5];?>;padding: <?php echo $key*5;?>px">
      		na cs!
      		<?php echo $value; ?>;
      	</div>
      	<?php
}
?>
<?php
    function F1($nome,$i)
   {
   	 if($i>0)
     return "ola marilene,hoje a noite,vinho,tainha e mt sexo ".$nome."!!!!  ".
     F1($nome,$i-1);
     else
     	return " ";
   }
   echo F1("JOAO",2);

   function soma($i,$j){
   	     return $i+$j;
   }
   var_dump( soma(1,2));

   function vetor(){
   	return array(1,2,3,4,5,6,7,8,9,"JOAO",10.04,array("batata",19,"alo,foi aqui que pediram um assalto e um refém?"));
   }
   var_dump(vetor());
   ?>
</body>
</html>