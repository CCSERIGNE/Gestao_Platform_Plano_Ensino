<?php

		// Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $siape_prof = (isset($_POST['siape_prof'])) ? $_POST['siape_prof'] : '';
  $senha_prof = (isset($_POST['senha_prof'])) ? $_POST['senha_prof'] : '';
          include 'connection.php'; 
          $result = mysqli_query($conn, "SELECT siape,senha FROM professor WHERE siape = $senha_prof");
          if(!$result)
              {
              	echo "<script>alert('Verifica a Senha e Siape Por Favor!');document.location='cons_plano.php';</script>";
 
              }
              echo "<script>document.location='plano_fim.php';</script>";


?>
