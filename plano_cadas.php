<?php

   include 'connection.php';
    
        // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  
  $curso = (isset($_POST['curso'])) ? $_POST['curso'] : '';
  $ano_letivo = (isset($_POST['ano_letivo'])) ? $_POST['ano_letivo'] : '';
  $semestre_letivo = (isset($_POST['semestre_letivo'])) ? $_POST['semestre_letivo'] : '';
  $textestr_rec = (isset($_POST['textestr_rec'])) ? $_POST['textestr_rec'] : '';
  $textcont_pro = (isset($_POST['textcont_pro'])) ? $_POST['textcont_pro'] : '';
  $text_crono = (isset($_POST['text_crono'])) ? $_POST['text_crono'] : '';
  
  if(empty($textestr_rec) || empty($semestre_letivo) || empty($ano_letivo) || empty($text_crono) || empty($textcont_pro )  || empty($curso)  ){
    
     //header("Location: cadas_displi.html");
    //echo $curso,$ano_letivo,$semestre_letivo;
        echo "<script>alert('Prenche Os Campos Por Favor!');document.location='edit_plano.php';</script>";
  }
  else {
  //conectar em banco 
  
    

      $sql = " INSERT INTO plano_ensino (ano_letivo,semestre_letivo,Estrategica_rec,Conteudo_prog,cronograma,cod_dis)
      VALUES ('$ano_letivo','$semestre_letivo','$textestr_rec','$textcont_pro','$text_crono','$curso')";

      if ($conn->query($sql) === TRUE) {
        
      echo "<script>alert('Cadastrado Com Succeso!');document.location='cadas_avali.php';</script>";
          
      } else {
        echo($curso);
      echo  "  Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
      
  }

?>

