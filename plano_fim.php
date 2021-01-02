<!DOCTYPE html>
<?php
require_once("seguranca.php");

?>
<html lang="en">
<head>
  <title>Plano Ensino</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <!-- Bootstrap core CSS -->
  <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="template/vendor/bootstrap/css/csss.css" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

 <!-- Navigation -->
  <nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
    <div class="container">
      <img height="70" src="img/logo3.png">
      <div class="collapse navbar-collapse" id="navbarExample">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <!--<a class="nav-link" href="#"></a>-->
          </li>
        </ul>
      </div
	  <center><a href="cons_plano.php" class="nav-link" style="color: #fff" ><h6><b>SAIR</b></h6></a></center>
    </div>
  </nav>
  <br><br>

 <form method="POST" action="plano_fim.php">

         <center style="color: green" ><b><h4>COLSULTA PLANO</h4></b></center>
         <center> <input type="text" name="cod_dis"><button style="color:green;"  type="submit" > CONSULTA </button></center> 
         <center><h6 style ="color:green"> INFORME CODIGO DE DISCIPLINA </h6></center><br>
        </form>

<div class="container">
  
   <table class="table">
    <thead>
      <tr>
        <th style="color: green"><h5><b>PROFESSOR</b></h5></th>
        <th style="color: green"><h5><b>DISCIPLINAS</b></h5></th>
        <th style="color: green"><h5><b>CURSO</b></h5></th>
        <th style="color: green"><h5><b>ANO/SEMESTRE</b></h5></th>
      </tr>
    </thead>
    <tbody>
     <?php
        $cod_dis = (isset($_POST['cod_dis'])) ? $_POST['cod_dis'] : '';
          include 'connection.php';                    
          $result = mysqli_query($conn, "SELECT c.nome,c.cod_curso,d.nome,d.ano_smestral,d.siape_prof,d.cod_dis FROM curso c 
            LEFT OUTER JOIN disciplina d on d.cod_curso = c.cod_curso 
             WHERE d.cod_dis = '$cod_dis'");
          if(!$result)
              {
                if($result[5] != $cod_dis )
                {
                  echo '<center><h6 style ="color:green"> VERIFICA CODIGO DE PLANO  </h6></center>';
                }
               
                echo '<center><h6 style ="color:green"> INFORME CODIGO DE DISCIPLINA </h6></center>';
                die("" );
              }                              
          while($dados= mysqli_fetch_array($result) )
              {
                if(!$dados[5] == $cod_dis )
                {
                  echo '<center><h6 style ="color:green"> veririfica CODIGO DE PLANO PARA AVALIAÇÃO </h6></center>';
                }
                echo'    
                      <tr class="success">
                      <td>'.$dados[4].'</td>
                      <td>'.$dados[2].'</td>
                      <td>'.$dados[0].'</td>
                      <td>'.$dados[3].'</td> 
                                           
		<td><center>
    <form method="POST" target="_blank" action="plano.php">
         <button  class="btn btn-primary btn-sm"   name="cod_dis" value="'.$cod_dis.'" type="submit" > Visualiza </button>       
    <a href="#" type="button" target="_blank" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"> Edita</a></i>
    <a href="#" type="button" target="_blank" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-delet"> Deleta</a></i>
    </form></center></td>	
      </tr>';}
      ?>
    </tbody>
  </table>
</div>

</body>
</html>

