<?php

	 include 'connection.php';
		
				// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $dis_avalia = (isset($_POST['dis_avalia'])) ? $_POST['dis_avalia'] : '';
  $sequencial = (isset($_POST['sequencial'])) ? $_POST['sequencial'] : '';
  $peso_av = (isset($_POST['peso_av'])) ? $_POST['peso_av'] : '';
  $textcrite = (isset($_POST['textcrite'])) ? $_POST['textcrite'] : '';
  $textisnt = (isset($_POST['textisnt'])) ? $_POST['textisnt'] : '';
  $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';
  
  

  

  if(empty($dis_avalia) || empty($sequencial) || empty($peso_av) || empty($textcrite) || empty($textisnt)){
	  
	   //header("Location: cadas_displi.html");
  			echo "<script>alert('Prenche Os Campos Por Favor!');document.location='cadas_avali.php';</script>";
  }
  else {
  //conectar em banco 
  			
  			//editar
  			if(!empty($acao) && $acao == "editar")
  			{
  				$result_ed = mysqli_query($conn,"UPDATE avaliacao SET peso  ='$peso_av', instrumento ='$textisnt', criteiro ='$textcrite', cod_plano = '$dis_avalia', sequencial ='$sequencial' WHERE cod_plano = '$dis_avalia' AND sequencial ='$sequencial'");
  				if(!$result_ed)
              {
                echo $dis_avalia;
               //echo "<script>alert('Cod Plano Nao Foi Achado!');document.location='cadas_avali.php';</script>";
                die(" " );
              } 
              echo "<script>alert('Avaliação Foi Alterado Com Sucesso!');document.location='cadas_avali.php';</script>"; 
  			}

		

			$sql = "INSERT INTO avaliacao(peso,instrumento,sequencial,criteiro,cod_plano) VALUES ('$peso_av','$textisnt','$sequencial','$textcrite','$dis_avalia')";

			if ($conn->query($sql) === TRUE) {
				
			echo "<script>alert('Avaliação Cadastrado Com Succeso!');document.location='cadas_avali.php';</script>";
					
			} else {
			echo  "  Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
  }

?>

