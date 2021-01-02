<!doctype html>
 <html >

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
      <center><a href="principal.html" class="nav-link" style="color: #fff"  ><h6><b>SAIR</b></h6></a></center>
    </div>
  </nav>
 
 <div class="container-fluid">    
						<br>
      
        <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div style="background-color: #fff; border-color: green; " class="panel panel-info" >
                    <div style="background-color:green; " class="panel-heading">
                      <h3 align="center" style="color: #fff"><b>CADASTRAR PLANO ENSINO</b></h3>
                        <div style="color:#fff; "class="panel-title"> </div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px ; "><a href="#"></a></div>
                    </div>     
 
                    <div style="padding-top:30px" class="panel-body" >
 
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                          <!--connection e select -->  
                        <?php

							include 'connection.php';
		                
							$result = mysqli_query($conn, "SELECT nome FROM curso ");
							if(!$result)
							{
								die("Erro nao seleciono : " );
							}


                  $result_dis = mysqli_query($conn, "SELECT cod_dis , nome FROM disciplina ");
              if(!$result_dis)
              {
                die("Erro nao seleciono : " );
              }
						?>
                                    
                           
							
					<form  method="POST" action="plano_cadas.php">	
									
						
               <!--   <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-oil"> COD PLANO
                      <input type="text" name="cod_plano"></i></span></center>            
                 </div>-->


								
               <div style="margin-bottom: 25px" class="input-group">
                     <center> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"> DISCIPLINA
                    <select name="curso" >  
                          <?php
                            while($dados_dis= mysqli_fetch_array($result_dis) )
                            {echo'
                            
                            <option value=" '.$dados_dis['cod_dis'].'"> '.$dados_dis['nome'].'</option>';
                      }?>
                    </select></i></span></center>
                                                                                                             
                </div>
									
                  <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-oil"> ANO LETIVO
                        <?php  
                        
                        $tp=  date(' Y ');
                        $tpp = $tp+1;
                        $tppp = $tp+2;
                        echo'
                       <select name="ano_letivo">
                       <option';echo' value="'.$tp.'"';echo'>';echo $tp;echo'</option>
                       <option';echo' value="'.$tpp.'"';echo'>';echo $tpp;echo'</option>
                       <option';echo' value="'.$tppp.'"';echo'>';echo $tppp;echo'</option>
                      </select></i></span></center>'; ?> 

                 </div>

                  <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-oil"> ANO/SEMESTRE
                       <select name="semestre_letivo">
                              <option value="Premeiro">Premeiro</option>
                              <option value="Segunda">Segunda</option>
                              <option value="Terceiro">Terceiro</option>
                              <option value="Quarto">Quarto</option>
                              <option value="Quinta">Quinta</option>
                              <option value="Sexta">Sexta</option>
                              <option value="Sete">Sete</option>
                              <option value="Oito">Oito</option>
                              <option value="Nono">Nono</option>
                      </select></i></span></center>

                 </div>
                  <div style="margin-bottom: 15px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"> ESTRATÉGIA DE RECUPERAÇÃO
                     <br><br><textarea  cols="50" style="height: 70px" name="textestr_rec"> </textarea></i></span>
                  </div>

                  <div style="margin-bottom: 15px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"> CONTEÚDO PROGRAMÁTICO
                     <br><br><textarea  cols="50" style="height: 70px" name="textcont_pro"> </textarea></i></span>
                  </div>

                  <div style="margin-bottom: 15px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"> CRONOGRAMA
                     <br><br><textarea  cols="50" style="height: 70px" name="text_crono"> </textarea></i></span>
                  </div>
 
                  <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                     <div style="position:center " class="col-sm-12 controls">
					             <center><button style="color:green;"  type="submit" > CADASTRA  </button> 
                        <!-- <center><input type="submit" align="center" id="btn-login"  href="pagin1.html" class="btn btn-success"></center>
                       <a id="btn-fblogin" href="#" class="btn btn-primary">Login com Facebook</a>-->
									
                      </div>
                  </div>
            </form> 
				 </div>                     
      </div>  
  </div>
   
		<!-- Bootstrap core JavaScript -->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/tether/tether.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>									
</html>
 
 

  
  
  
 
 