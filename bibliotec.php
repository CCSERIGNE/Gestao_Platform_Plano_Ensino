<!doctype html>
 <html >

<?php
    $ed_cod_b  = "";
    $ed_orde_rdb = "";
    $ed_tipo_rdb = "";
    $ed_desc_b = "";
    $ed_numl_b = "";
    
    $cod_disb = (isset($_GET['cod_disb'])) ? $_GET['cod_disb'] : '';
    $cod_bibl = (isset($_GET['cod_bibl'])) ? $_GET['cod_bibl'] : '';
    $num_liv  = (isset($_GET['num_liv'])) ? $_GET['num_liv'] : '';
    $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
   
   if($acao == "deletar")
    {
        include 'connection.php';
        $result_dl = mysqli_query($conn, "DELETE FROM biblioteca WHERE cod_biblio = '$cod_bibl' AND Numero = $num_liv");
        if(!$result_dl)
              {
                
                echo "<script>alert('Verifica Dados Informado!');document.location='bibliotec.php';</script>";
                die(" " );
              } 
        else
        {
          echo "<script>alert('Os Dados foi Deletado com sucesso!');document.location='bibliotec.php';</script>";
        }
          
    }
    else if ($acao == "editar")
    {
      include 'connection.php';                    
               $result_b = mysqli_query($conn, "SELECT  b.cod_biblio,b.descripcao,b.Numero,rdb.ordem,rdb.tipo ,rdb.cod_dis FROM biblioteca  b JOIN relacao_dis_biblio  rdb on rdb.cod_biblio = b.cod_biblio WHERE rdb.cod_dis = '$cod_disb' ");
               if(!$result_b)
              {
                
                echo "<script>alert('Cod Disciplina Nao Foi Achado!');document.location='bibliotec.php';</script>";
                die(" " );
              }                              
          while($dados_b= mysqli_fetch_array($result_b) )
              {
                  $ed_cod_b = $dados_b['cod_biblio'];
                  $ed_orde_rdb = $dados_b['ordem'];
                  $ed_tipo_rdb = $dados_b['tipo'];
                  $ed_desc_b = $dados_b['descripcao'];
                  $ed_numl_b = $dados_b['Numero'];
                  
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
	  <center><a href="principal.html" class="nav-link" style="color: #fff"><h6><b>SAIR</b></h6></a></center>
    </div>
  </nav>
 
 <div class="container-fluid">    
						<br>
       
 <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div style="background-color: #fff; border-color: green; " class="panel panel-info" >
         <div style="background-color:green; " class="panel-heading">
          <h3 align="center" style="color: #fff"><b>CADASTRAR BIBLIOGRAFIA</b></h3>
             <div style="color:#fff; "class="panel-title"> </div>
        </div>     
 
   <div style="padding-top:30px" class="panel-body" >
 
              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
         
					<form  method="POST"  action="bibliografia_cadas.php">	
                       <?php
                         echo'
                           <input type="hidden" name="acao" value="'.$acao.'">
                           <input type="hidden" name="id_livro" value="'.$ed_numl_b.'">
                        ';?>					         
                  <div style="margin-bottom: 25px" class="input-group">
                     <center> <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"> COD DISCIPLINA
                        <select name="cod_dis" >  
                            <!--connection e select -->  
                        <?php


                          include 'connection.php';                    
                              $result = mysqli_query($conn, "SELECT cod_dis FROM disciplina ");
                          if(!$result)
                          {
                            die("Erro nao seleciono : " );
                          }
                              
                      while($dados= mysqli_fetch_array($result) )
                      {echo'
                        
                        <option value='.$dados['cod_dis'].'> '.$dados['cod_dis'].'</option>';
                      }?>
                        </select></i></span></center>
                                                                                                             
                </div>				
									
									<div style="margin-bottom: 15px" class="input-group">
                     <span class="input-group-addon"><i class=" glyphicon glyphicon-book"> COD LIVRO
										      <input type="text" name="cod_livro" <?= 'value="'.$ed_cod_b.'"'?>></i></span>
                 </div>
								   

									<div style="margin-bottom: 15px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"> DESCRIPÇÃO
										      <br><br><textarea  cols="50" style="height: 70px" <?='name="text_descrip">'.$ed_desc_b.'' ?></textarea></i></span>
                  </div>
									
									<div style="margin-bottom: 25px" class="input-group">
                    <center> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"> TIPO
										  <select name="tipo_livro" >  
										      <option value="BASICAS" <?= ($ed_tipo_rdb=="BASICAS")? 'selected': ''?>> BASICAS</option>
										      <option value="COMPLEMENTARES" <?= ($ed_tipo_rdb=="COMPLEMENT")? 'selected': ''?>> COMPLEMENTARES</option>
										      <option value="APROFUNDAMENTO" <?= ($ed_tipo_rdb=="APROFUNDAM")? 'selected': ''?>> APROFUNDAMENTO</option>
										  </select></i></span></center>
									</div>

									<div style="margin-bottom: 15px" class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-list"> ORDEM
										<input name="ordem" <?='value="'.$ed_orde_rdb.'"'?> ></i></span>
                 </div>

                   <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
 
                <div style="position:center " class="col-sm-12 controls">
								    <center><button style="color:green;"  type="submit" > CADASTRA  </button></center> 
                     <!-- <center><input type="submit" align="center" id="btn-login"  href="pagin1.html" class="btn btn-success">-->
                     </center><br>
                     
								</div>
         </div>
 
			</form>		
      <center>
        <a style="color:green" id="btn-fblogin" href="cadas_avali.php" class="btn btn-secondary">RETORNA</a> 
        <a style="color:green" id="btn-fblogin" href="plano_fim.php" class="btn btn-secondary">FINALIZA</a>
      </center><br>

      <form method="POST" action="bibliotec.php">

         <center style="color: green" > <h4>COLSULTA BIBLIOGRAFIA</h4></center>
         <center> <input type="text" name="cod_dis"><button style="color:green;"  type="submit" > CONSULTA </button></center> 
        </form>

        <div class="container">
        <table class="table">
         <thead>
           <tr>
                <td ><b>Ordem</b></td>
               <center>  <td ><b>Tipo</b></td></center>
                 <td ><b>Cod Livro</b></td>
                 <td ><b>Disciplina</b></td>
                <td ><b>Num</b></td>
            </tr>
        </thead>
        
   <tbody> 
                         <?php
        $cod_dis = (isset($_POST['cod_dis'])) ? $_POST['cod_dis'] : '';
          include 'connection.php';                    
          $result_bilbio = mysqli_query($conn, "SELECT  b.cod_biblio,b.Numero,rb.ordem,rb.tipo ,rb.cod_dis FROM biblioteca as b JOIN relacao_dis_biblio as rb on rb.cod_biblio = b.cod_biblio WHERE rb.cod_dis = '$cod_dis' ");
          if(!$result_bilbio)
              {
                echo '<center><h6 style ="color:green"> INFORME CODIGO DE DISCIPLINA PARA BIBLIOGRAFIA </h6></center>';
                die("") ;
              }                              
          while($dados_biblio= mysqli_fetch_array($result_bilbio) )
              {
                echo'    
                      <tr class="success">
                      <td  >'.$dados_biblio['ordem'].'</td>
                          <td >'.$dados_biblio['tipo'].'</td>
                         <td >'.$dados_biblio['cod_biblio'].'</td>
                         <td >'.$dados_biblio['cod_dis'].'</td>
                         <td >'.$dados_biblio['Numero'].'</td>
                  
      <td><center>
     <a href="bibliotec.php?acao=editar&cod_bibl='.$dados_biblio['cod_biblio'].'&cod_disb='.$dados_biblio['cod_dis'].'&num_liv='.$dados_biblio['Numero'].'" type="button"  class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"> Edita</a></i>
     <a href="bibliotec.php?acao=deletar&cod_bibl='.$dados_biblio['cod_biblio'].'&cod_disb='.$dados_biblio['cod_dis'].'&num_liv='.$dados_biblio['Numero'].'" type="button"  class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-delet"> Deleta</a></i>
     </center></td>  ';
              }        
      ?>
      </tr> 
       </tbody>
       </table></center>	
       		 
   </div>                     
      </div>  
        </div>
   
		<!-- Bootstrap core JavaScript -->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/tether/tether.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>									
</html>
 
 

  
  
  
 
 