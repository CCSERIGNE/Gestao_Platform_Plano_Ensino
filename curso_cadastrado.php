<?php

	 include 'connection.php';
		
				// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $cd_curso = (isset($_POST['cd_curso'])) ? $_POST['cd_curso'] : '';
  $nome_curso = (isset($_POST['nome_curso'])) ? $_POST['nome_curso'] : '';
  $modalidade = (isset($_POST['modalidade'])) ? $_POST['modalidade'] : '';
  $forma_curso = (isset($_POST['forma_curso'])) ? $_POST['forma_curso'] : '';
  $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';
  $cod_curso =(isset($_POST['cod_curso'])) ? $_POST['cod_curso'] : '';
  
  if(empty($cod_curso) || empty($nome_curso) || empty($modalidade) || empty($forma_curso)){
	  
	   //header("Location: cadas_displi.html");
  		//echo $cd_curso ;
  		//	echo $nome_curso;
       // echo $cod_curso;
  		//	echo $modalidade;
  	//	echo $forma_curso;
  		//echo "<script>alert('Prenche Os Campos Por Favor!');document.location='cadas_curso.php';</script>";
  }
  //conectar em banco 
    echo "string 01";
          //editar
  
    if(!empty($acao) && $acao == "editar" && !empty($cd_curso))
  			{
          echo $cd_curso;
  				$result_ed = mysqli_query($conn,"UPDATE curso SET nome= '$nome_curso', modalide='$modalidade', cod_curso = '$cd_curso',cod_form= '$forma_curso' WHERE  cod_curso = '$cd_curso'");
  				if(!$result_ed)
              {
                echo "string 02";
               echo "<script>alert('Cod Curso Nao Foi Achado!');document.location='cadas_curso.php';</script>";
                die(" " );
              } 
              echo "string 03";
              echo "<script>alert('Curso Foi Alterado Com Sucesso!');document.location='cadas_curso.php';</script>"; 
  			}

  			//  Cadastrar
			$sql = "INSERT INTO curso(nome,modalide,cod_curso,cod_form)
			VALUES ('$nome_curso','$modalidade','$cod_curso','$forma_curso')";

			if ($conn->query($sql) === TRUE) {
				
			echo "<script>alert('Curso Foi Cadastrado Com Succeso!');document.location='cadas_curso.php';</script>";
					
			} else {
			echo  "  Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
  

?>

