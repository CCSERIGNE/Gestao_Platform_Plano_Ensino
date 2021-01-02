<?php

	 include 'connection.php';
		
				// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $cod_dis = (isset($_POST['cod_dis'])) ? $_POST['cod_dis'] : '';
  $nome_dis = (isset($_POST['nome_dis'])) ? $_POST['nome_dis'] : '';
  $crg_hora = (isset($_POST['crg_hora'])) ? $_POST['crg_hora'] : '';
  $coleg = (isset($_POST['coleg'])) ? $_POST['coleg'] : '';
  $ano_semestre = (isset($_POST['ano_semestre'])) ? $_POST['ano_semestre'] : '';
  $textement = (isset($_POST['textement'])) ? $_POST['textement'] : '';
  $textobjetivo = (isset($_POST['textobjetivo'])) ? $_POST['textobjetivo'] : '';
  $prof_dis = (isset($_POST['prof_dis'])) ? $_POST['prof_dis'] : '';
  $cod_curso = (isset($_POST['cod_curso'])) ? $_POST['cod_curso'] : '';
  $acao = (isset($_POST['acao'])) ? $_POST['acao'] : '';
  
  
  

  if(empty($cod_dis) || empty($nome_dis) || empty($crg_hora) || empty($coleg) || empty($ano_semestre) || empty($textement) || empty($textobjetivo) || empty($prof_dis) || empty($cod_curso)){

  			echo "<script>alert('Prenche Os Campos Por Favor!');document.location='cadas_displi.php';</script>";
  }
  else {
  //conectar em banco 
  
		
		//editar
  			if(!empty($acao) && $acao == "editar")
  			{
  				$result_ed = mysqli_query($conn,"UPDATE disciplina SET cod_dis ='$cod_dis', cod_curso ='$cod_curso',siape_prof='$prof_dis', nome = '$nome_dis',cargo_horario ='$crg_hora',colegiado ='$coleg',ano_smestral ='$ano_semestre',ementa ='$textement',objetivo ='$textobjetivo' WHERE cod_dis = '$cod_dis'");
  				if(!$result_ed)
              {
               echo "<script>alert('Cod Curso Nao Foi Achado!');document.location='cadas_curso.php';</script>";
                die(" " );
              } 
              echo "<script>alert('Curso Foi Alterado Com Sucesso!');document.location='cadas_curso.php';</script>"; 
  			}

			$sql = "INSERT INTO disciplina(cod_dis,cod_curso,siape_prof,nome,cargo_horario,colegiado,ano_smestral,ementa,objetivo)
			VALUES ('$cod_dis','$cod_curso','$prof_dis','$nome_dis','$crg_hora','$coleg','$ano_semestre','$textement','$textobjetivo')";
			/* $sql2 = "INSERT INTO relacao_dis_prof(siape,cod_dis) VALUES ('$prof_dis','$cod_dis')";*/

			if ($conn->query($sql) === TRUE /*&& $conn->query($sql2) === TRUE*/) {
				
			echo "<script>alert('Disciplina Foi Cadastrado Com Succeso!');document.location='cadas_displi.php';</script>";
					
			} else {
			echo  "  Error: document.location ='cadas_displi.php' " . $sql . "<br>" . $conn->error;
			
			}

			$conn->close();
			
  }

?>

