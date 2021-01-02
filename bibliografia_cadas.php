<?php

	 include 'connection.php';
		
				// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $cod_livro= (isset($_POST['cod_livro'])) ? $_POST['cod_livro'] : '';
  $text_descrip = (isset($_POST['text_descrip'])) ? $_POST['text_descrip'] : '';
  $tipo_livro = (isset($_POST['tipo_livro'])) ? $_POST['tipo_livro'] : '';
  $ordem = (isset($_POST['ordem'])) ? $_POST['ordem'] : '';
  $cod_dis =  (isset($_POST['cod_dis'])) ? $_POST['cod_dis'] : '';
  $cod_curso =(isset($_POST['cod_curso'])) ? $_POST['cod_curso'] : '';
  $id_livro   =(isset($_POST['id_livro'])) ? $_POST['id_livro'] : '';
  $acao   =(isset($_POST['acao'])) ? $_POST['acao'] : '';
  

  if(empty($cod_livro) || empty($text_descrip) || empty($tipo_livro) || empty($ordem) || empty($cod_dis) ){
	  
	   //header("Location: cadas_displi.html");
  			echo "<script>alert('Prenche Os Campos Por Favor!');document.location='bibliotec.php';</script>";
  }
  
  else {

  //conectar em banco 
  				
  				//editar
  			if(!empty($acao) && $acao == "editar")
  			{

  				
  				$result_ed = mysqli_query($conn,"UPDATE biblioteca SET descripcao='$text_descrip',cod_biblio='$cod_livro' WHERE Numero=$id_livro");

  				$result_ed1 = mysqli_query($conn,"UPDATE relacao_dis_biblio SET ordem='$ordem',tipo='$tipo_livro',cod_biblio= '$cod_livro' WHERE cod_dis = '$cod_dis'");
  				
  				if(!$result_ed1 && !$result_ed)
              {

               echo "<script>alert(Bibliografia Nao Foi Achado!');document.location='bibliotec.php';</script>";
                die(" " );
              } 
              echo "<script>alert('Bibliografia Foi Alterado Com Sucesso!');document.location='bibliotec.php';</script>"; 
  			}else{
  				
			$sql1 = "INSERT INTO biblioteca (descripcao,cod_biblio) VALUES ('$text_descrip','$cod_livro')";
			$sql2 = "INSERT INTO relacao_dis_biblio(ordem,tipo,cod_biblio, cod_dis) VALUES ('$ordem','$tipo_livro','$cod_livro','$cod_dis')";	
			if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
				
			echo "<script>alert('Bibliografia Foi Cadastrado Com Succeso!');document.location='bibliotec.php';</script>";
					
			} else {
			echo  "  Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
		}	
 }

?>

