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
                      <h3 align="center" style="color: #fff"><b>CONSULTAR PLANO ENSINO</b></h3>
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

                $result_plan = mysqli_query($conn, "SELECT cod_plano FROM plano_ensino ");
              if(!$result_plan)
              {
                die("Erro nao seleciono : " );
              }

                  $result_dis = mysqli_query($conn, "SELECT d.cod_dis , d.nome FROM disciplina as d /*JOIN relacao_dis_prof as rdf WHERE rdf.cod_dis */");
              if(!$result_dis)
              {
                die("Erro nao seleciono : " );
              }
						

            $result_siap = mysqli_query($conn, "SELECT p.nome,p.siape FROM professor as p /*JOIN relacao_dis_prof as rel_pd WHERE rel_pd.siape IS NOT NULL */ ");
              if(!$result_siap)
              {
                die("Erro nao seleciono 2: " );
              }

            ?>
                                    
                           
							
					<form  method="POST" action="confirm.php">	
									
						
                  <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-oil"> COD PLANO
                      <select name="cod_plano" >  
                          <?php
                            while($dados_plan= mysqli_fetch_array($result_plan) )
                            {echo'
                            
                            <option value= '.$dados_plan[''].'> '.$dados_plan['cod_plano'].'</option>';
                      }?>
                    </select></i></span></center>              
                 </div>
                <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"> SIPAE PROF
                      <select name="siape_prof" >  
                          <?php
                            while($dados_siap= mysqli_fetch_array($result_siap) )
                            {echo'
                            
                            <option value= '.$dados_siap[''].'> '.$dados_siap['siape'].'</option>';
                      }?>
                    </select></i></span></center>            
                 </div>

								
               <div style="margin-bottom: 25px" class="input-group">
                     <center> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"> DISCIPLINA
                    <select name="cod_dis" >  
                          <?php
                            while($dados_dis= mysqli_fetch_array($result_dis) )
                            {echo'
                            
                            <option value= '.$dados_dis['cod_dis'].'> '.$dados_dis['cod_dis'].'</option>';
                      }?>
                    </select></i></span></center>
                                                                                                             
                </div>
									
                  <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"> ANO LETIVO
                        <?php  
                        
                        $tp=  date(' Y ');
                        echo'
                       <select name="ano_letivo"><option value=';$tp ;echo'>';echo $tp;echo'</option>
                              <option value= ';$tp ;echo'>';echo $tp+1;echo'</option>
                              <option value= ';$tp ;echo'>';echo $tp+2;echo'</option>
                      </select></i></span></center>'; ?> 

                 </div>

                  <div style="margin-bottom: 15px" class="input-group">
                      <center> <span class="input-group-addon"><i class="glyphicon glyphicon-registration-mark">  SEMESTRE
                       <select name="semestre_letivo">
                              <option value="1">Premeiro</option>
                              <option value="2">Segunda</option>
                              <option value="3">Terceiro</option>
                              <option value="4">Quarto</option>
                              <option value="5">Quinta</option>
                              <option value="6">Sexta</option>
                              <option value="7">Sete</option>
                              <option value="8">Oito</option>
                              <option value="9">Nono</option>
                      </select></i></span></center>

                 </div>
                 <div style="margin-bottom: 15px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"> SENHA
                    <input type="password" name="senha_prof">
                    </i></span>
                </div>
                  <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                     <div style="position:center " class="col-sm-12 controls">
					             <center><button style="color:green;"  type="submit" > CONSULTA  </button> 
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
 
 

  
  
  
 
 