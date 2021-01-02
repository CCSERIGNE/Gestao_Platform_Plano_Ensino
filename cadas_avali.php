<!doctype html>
 <html >
 <?php
    $ed_peso_av = "";
    $ed_insturmeno = "";
    $ed_criteiro = "";
    $ed_sequ_av = "";
    $ed_cod_pl_av = "";
    
    $cod_sequ = (isset($_GET['cod_sequ'])) ? $_GET['cod_sequ'] : '';
    $cod_plano = (isset($_GET['cod_plano'])) ? $_GET['cod_plano'] : '';
    $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
   
    if($acao == "deletar")
    {
        include 'connection.php';
        $result_dl = mysqli_query($conn, "DELETE FROM avaliacao WHERE cod_plano = '$cod_plano' AND sequencial = '$cod_sequ'");
        if(!$result_dl)
              {
                echo "<script>alert('Cod Curso Nao Foi Achado!');document.location='cadas_avali.php';</script>";
                die(" " );
              } 
        else
        {
          echo "<script>alert('Os Dados foi Deletado com sucesso!');document.location='cadas_avali.php';</script>";
        }
          
    }
    else if ($acao == "editar")
    {
      include 'connection.php';                    
               $result_seq2 = mysqli_query($conn, "SELECT peso, instrumento, criteiro, cod_plano,sequencial FROM avaliacao WHERE cod_plano = '$cod_plano' AND sequencial = '$cod_sequ'");
               if(!$result_seq2)
              {
                echo "<script>alert('Cod Plano Nao Foi Achado!');document.location='cadas_avali.php';</script>";
                die(" " );
              }                              
          while($dados_seq2= mysqli_fetch_array($result_seq2) )
              {
                  $ed_peso_av = $dados_seq2['peso'];
                  $ed_insturmeno = $dados_seq2['instrumento'];
                  $ed_criteiro = $dados_seq2['criteiro'];
                  $ed_sequ_av = $dados_seq2['sequencial'];
                  $ed_cod_pl_av = $dados_seq2['cod_plano'];
              }

    }
?>



<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Plano Ensino</title>
 
  <!-- Bootstrap core CSS -->
  <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="template/vendor/bootstrap/css/csss.css" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  
  <style>

    
  </style>
</head>

<body style="background-color: #fff;">
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
      </div>

    </div>
  </nav>
 
 <div class="container-fluid">    
						<br>
          
   <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">   <div style="background-color: #fff; border-color: green; " class="panel panel-info" >
                  <div style="background-color:green; " class="panel-heading">
                    <h3 align="center" style="color: #fff"><b>CADASTRAR AVALIAÇÃO</b></h3>
                       <div style="color:#fff; "class="panel-title"> </div>
                      <div style="float:right; font-size: 80%; position: relative; top:-10px ; ">
                        <a href="#"></a>
                      </div>
                  </div>     
      
      <div style="padding-top:30px" class="panel-body" >
 
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
         <form  method="POST"  action="avaliacao_cadastrado.php">	
          <?php
              echo'
                    <input type="hidden" name="acao" value="'.$acao.'">';?>
					      <div style="margin-bottom: 25px" class="input-group">
                     <center> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"> COD PLANO
                    <select name="dis_avalia" >
                            <!--connection e select -->  
                        <?php
                           
                          include 'connection.php';                    
                              $result = mysqli_query($conn, "SELECT cod_plano FROM plano_ensino WHERE 1 ");
                          if(!$result)
                          {
                            die("Erro nao seleciono : " );
                          }
                          
                              
                      while($dados= mysqli_fetch_array($result) )
                      {echo'
                        
                        <option value='.$dados['cod_plano'].'> '.$dados['cod_plano'].'</option>';
                      }?>
                    </select></i></span></center>
                </div>
									<?php
                  echo '

									<div style="margin-bottom: 25px" class="input-group">
                     <center> <span class="input-group-addon"><i class="glyphicon glyphicon-option-vertical"> SEQUENCIAL
										<input type="text" name="sequencial" value="'.$ed_sequ_av.'"></i></span></center>
								 </div>
									
									
									<div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-oil"> PESO
										  <input type="text" name="peso_av" value='.$ed_peso_av.'></i></span></center>						
                 </div>
								   
									<div style="margin-bottom: 15px" class="input-group">
                      <center><span class="input-group-addon"><i class="glyphicon glyphicon-tasks"> CRITEIRO
										 <br><br> <textarea  cols="50" style="height: 70px" name="textcrite">'.$ed_criteiro.'</textarea></i></span></center>
                  </div>
									
									<div style="margin-bottom: 15px" class="input-group">
                    <center> <span class="input-group-addon"><i class="glyphicon glyphicon-copyright-mark"> INSTRUMENTO 
										<br><br><textarea  cols="50" style="height: 70px" name="textisnt">'.$ed_insturmeno.'</textarea></i></span></center>
								</div>'
                ;?>
                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                    <div style="position:center " class="col-sm-12 controls">
										  	<center><button style="color:green;"  type="submit" > CADASTRA  </button></center>  
                        
									 </div>               
          </form>
                     <br><br><center> <a style="color:green" id="btn-fblogin" href="edit_plano.php" class="btn btn-secondary">RETORNA</a> 
                     <a style="color:green" id="btn-fblogin" href="bibliotec.php" class="btn btn-secondary">AVANÇA</a></center> <br>     
                 
                 <form method="POST" action="cadas_avali.php">

         <center style="color: green" > <h4>COLSULTA AVALIAÇÃO</h4></center>
         <center> <input type="text" name="cod_plano"><button style="color:green;"  type="submit" > CONSULTA </button></center>
         <center><h6 style ="color:green"> INFORME CODIGO DE PLANO  </h6></center><br> 
        </form>
         <div class="container">
        <table class="table">
         <thead>
           <tr>
                <td ><b>Plano</b></td>
               <center>  <td ><b>Sequ.</b></td></center>
                 <td ><b>PESO</b></td>
            </tr>
        </thead>
        <tbody>
         <?php
        $cod_plano = (isset($_POST['cod_plano'])) ? $_POST['cod_plano'] : '';
          include 'connection.php';                    
               $result_seq = mysqli_query($conn, "SELECT sequencial ,peso,cod_plano FROM avaliacao WHERE cod_plano = $cod_plano");
               if(!$result_seq)
              {
                echo '<center><h6 style ="color:green"> VERIFICA CODIGO DE PLANO PARA AVALIAÇÃO </h6></center>';
                die("") ;
              }                              
          while($dados_seq= mysqli_fetch_array($result_seq) )
              {
                echo'    
                      <tr class="success">
                      <td  >'.$dados_seq['cod_plano'].'</td>
                          <td >'.$dados_seq['sequencial'].'</td>
                         <td >'.$dados_seq['peso'].'</td>              
      <td><center>
     <a href="cadas_avali.php?acao=editar&cod_plano='.$dados_seq['cod_plano'].'&cod_sequ='.$dados_seq['sequencial'].'" type="button"  class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"> Edita</a></i>
     <a href="cadas_avali.php?acao=deletar&cod_plano='.$dados_seq['cod_plano'].'&cod_sequ='.$dados_seq['sequencial'].'" type="button"  class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-delet"> Deleta</a></i>
     </center></td>  ';
              }        
      ?>
         </tr>
         </tbody>
         </div> 
        </div>
       </div>   
     </div>
                     
   
		<!-- Bootstrap core JavaScript -->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/tether/tether.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>									
</html>
 
 

  
  
  
 
 