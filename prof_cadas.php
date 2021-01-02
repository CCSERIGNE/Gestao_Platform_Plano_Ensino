<?php

	 include 'connection.php';
		
				// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $nome = (isset($_POST['nome'])) ? $_POST['nome'] : '';
  $siape = (isset($_POST['siape'])) ? $_POST['siape'] : '';
  $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
  
  
  
  

  if(empty($nome) || empty($siape) || empty($senha) ){
	  
	   //header("Location: cadas_displi.html");
  			echo "<script>alert('Prenche Os Campos Por Favor!');document.location='prof_cadas.php';</script>";
  }
  else {
  //conectar em banco 
  
		

			$sql = "INSERT INTO professor(nome,siape,senha) VALUES ('$nome','$siape','$senha')";

			if ($conn->query($sql) === TRUE) {
				
			echo "<script>alert('Login Cadastrado Com Succeso!');document.location='cadas_prof.html';</script>";
					
			} else {
			echo  "  Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
			
  }

?>

