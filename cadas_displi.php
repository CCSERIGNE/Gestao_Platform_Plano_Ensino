<!doctype html>
 <html >
 <?php
    $ed_cod_dis = "";
    $ed_nome_dis = "";
    $ed_siape_dis = "";
    $ed_texteobj_dis = "";
    $ed_textement_dis = "";
    $ed_coleg_dis = "";

    $cod_dis = (isset($_GET['cod_dis'])) ? $_GET['cod_dis'] : '';
    $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
    if ($acao == "deletar") {
    include 'connection.php';
        $result_dl = mysqli_query($conn, "DELETE FROM disciplina WHERE cod_dis = '$cod_dis'");
        if(!$result_dl)
              {
                echo "<script>alert('Cod Curso Nao Foi Achado!');document.location='cadas_displi.php';</script>";
                die(" " );
              } 
        else
        {
          echo "<script>alert('Os Dados foi Deletado com sucesso!');document.location='cadas_displi.php';</script>";
        }
          
    }
    else if ($acao == "editar")
    {
      include 'connection.php';
      $result_d = mysqli_query($conn, "SELECT cod_dis,nome,colegiado,ano_smestral,ementa,objetivo,siape_prof FROM disciplina  WHERE cod_dis = '$cod_dis'");
          if(!$result_d)
              {
                echo "<script>alert('Cod Disciplina Nao Foi Achado!');document.location='cadas_displi.php';</script>";
                die(" " );
              }                              
          while($dados_d= mysqli_fetch_array($result_d) )
              {

                  $ed_cod_dis = $dados_d['cod_dis'];
                  $ed_nome_dis = $dados_d['nome'];
                  $ed_siape_dis = $dados_d['siape_prof'];
                  $ed_textement_dis = $dados_d['ementa'];
                  $ed_texteobj_dis = $dados_d['objetivo'];
                  $ed_coleg_dis  = $dados_d['colegiado'];
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
       <center><a href="opcao.html" class="nav-link" style="color: #fff" ><h6><b>RETURN</b></h6></a></center>
    </div>
  </nav>
 
 <div class="container-fluid">    
						<br>
      <!--<h3 align="center" style="color: green"><b>CADASTRAR DISCIPLINA</b></h3>-->
        <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div style="background-color: #fff; border-color: green; " class="panel panel-info" >
                    <div style="background-color:green; " class="panel-heading">
                       <h3 align="center" style="color:#fff"><b>CADASTRAR DISCIPLINA</b></h3>
                        <div style="color:#fff; "class="panel-title"> </div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px ; "><a href="#"></a></div>
                    </div>     
 
                    <div style="padding-top:30px" class="panel-body" >
 
                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
   		
					<form  method="POST" action="displina_cadastrado.php">
                <div style="margin-bottom: 10px" class="input-group">
                   <?php
            echo'
            <input type="hidden" name="acao" value="'.$acao.'">
             <input type="hidden" name="prof_dis" value="'.$ed_siape_dis.'">
             <input type="hidden" name="cod_dis" value="'.$ed_cod_dis.'">
                    <center> <span class="input-group-addon"><i class="glyphicon glyphicon-erase"> SIAPE
                    <input type="text" name="prof_dis" value="'.$ed_siape_dis.'"';if($acao =="editar")echo 'disabled';echo '>
                      
                    </i></span></center>
                  </div>

									<div style="margin-bottom: 10px" class="input-group">
                    <center> <span class="input-group-addon"><i class="glyphicon glyphicon-th"> COD DISCIPLINA
										<input type="text" name="cod_dis" value="'.$ed_cod_dis.'"';if($acao =="editar")echo 'disabled';echo '>
                      
                    </i></span></center>
								  </div>
									 
									
									<div style="margin-bottom: 10px" class="input-group">
                    <center> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"> DISCIPLINA
                      <input type="text" name="nome_dis" value="'.$ed_nome_dis .'"></i></span></center>
										</i></span></center>
								  </div>';
                      ?>
                  <div style="margin-bottom: 10px" class="input-group">
               <span class="input-group-addon"><i  class="glyphicon glyphicon-copyright-mark"> CURSO</i>
                            <select name="cod_curso">
                              <?php
                        include 'connection.php';                    
                       $result_c = mysqli_query($conn, "SELECT nome,cod_curso FRoM curso WHERE 1" );
                       if(!$result_c)
                         {
                             echo '<center><h6 style ="color:green"> INFORME CODIGO DE CURSO </h6></center>';
                              die(" " );
                         } 
                         while($dados_c= mysqli_fetch_array($result_c) )
                        {
                            echo'
                              <option value="'.$dados_c['cod_curso'].'">'.$dados_c['nome'].'</option>';}?>
                              </select>
                    </i></span></center>
                  </div>
									
									<div style="margin-bottom: 10px" class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-time"> CARGA HORARIOS
										<input type="time" name="crg_hora"></i></span>
                  </div>
									
									<div style="margin-bottom: 10px" class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"> COLEGIADO
										  <select name="coleg">
										  <option value="NAO" <?= ($ed_coleg_dis=="NAO")? 'selected': ''?>>NAO</option>
										  <option value="SIM" <?= ($ed_coleg_dis=="SIM")? 'selected': ''?>>SIM</option>
										</select>	</i></span>
                  </div>
									
									
									
									<div style="margin-bottom: 10px" class="input-group">
                  <!--  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar">ANO                   
                        <?php  
                        
                        $tp=  date(' Y ');
                        echo'
                       <select name="ano_semestre">><option value="2017">';echo $tp;echo'</option>
                              <option value="2018">';echo $tp+1;echo'</option>
                              <option value="2019">';echo $tp+2;echo'</option>
                      </select></i></span></center>'; ?> 
                    </i></span>-->
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"> ANO/SEMESTRE
                     <?php
                     $tp=  date(' Y ');
                     echo '
                      <select name="ano_semestre">
                        <option value="1/'. $tp .'">Premeiro</option>
                        <option value="2/'.$tp.'">Segunda</option>
                        <option value="3/'.$tp.'">Terceiro</option>
                        <option value="4/'.$tp.'">Quarto</option>
                        <option value="5/'.$tp.'">Quinta</option>
                        <option value="6/'.$tp.'">Sexta</option>
                        <option value="7/'.$tp.'">Sete</option>
                        <option value="8/'.$tp.'">Oito</option>
                        <option value="9/'.$tp.'">Nono</option>
                      </select>'; ?></i></span>
                  </div>
									
                  <?php
                  echo'
									<div style="margin-bottom: 15px" class="input-group">
                      <span class="input-group-addon"><i class="" > EMENTA
										 <br><br> <textarea  cols="50" style="height: 70px" name="textement" >'.$ed_textement_dis.'</textarea>
                  </div>
									
									<div style="margin-bottom: 15px" class="input-group">
                      <span class="input-group-addon"><i class="">OBJETIVO
										 <br><br><textarea  cols="50" style="height: 70px" name="textobjetivo" >'.$ed_texteobj_dis.'</textarea>
                  </div>
									';?>

               <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
                  <div style="position:center " class="col-sm-12 controls">
											<center><button style="color:green;"  type="submit" > CADASTRA  </button> 
                      <!-- <center><input type="submit" align="center" id="btn-login"  href="pagin1.html" class="btn btn-success"></center>
                      <a id="btn-fblogin" href="#" class="btn btn-primary">Login com Facebook</a>-->
                  </div>
               </div>
              </form>  
            <br><br>
        
        <form method="POST" action="cadas_displi.php">

         <center style="color: green" > <h4>COLSULTA DISCIPLINA</h4></center>
         <center> <input type="text" name="cod_dis"><button style="color:green;"  type="submit" > CONSULTA </button></center>
         <center><h6 style ="color:green"> INFORME CODIGO DE DISCIPLINA  </h6></center> <br>
        </form>

        <div class="container">
        <table class="table">
         <thead>
           <tr >
                <th style="color: green ">SIAPE_PROF</th>
                <th style="color: green ">COD</th>
                <th style="color: green">DISCIPLINA</th>
                 <th style="color: green">COLEGIADO</th>
                 <th style="color: green">AN/SEM</th>
                 
            </tr>
        </thead> 
       <tbody>     
        <?php
        $cod_dis = (isset($_POST['cod_dis'])) ? $_POST['cod_dis'] : '';
          include 'connection.php';                    
          $result = mysqli_query($conn, "SELECT cod_dis,nome,colegiado,ano_smestral,siape_prof FROM disciplina WHERE cod_dis = '$cod_dis'");
          if(!$result)
              {
                echo '<center><h6 style ="color:green"> VERIFICA CODIGO DE DISCIPLINA  </h6></center>';
                die("" );
              }                              
          while($dados= mysqli_fetch_array($result) )
              {
                echo'    
                      <tr class="success">
                      <td>'.$dados['siape_prof'].'</td>
                      <td>'.$dados['cod_dis'].'</td>
                      <td>'.$dados['nome'].'</td>
                      <td>'.$dados['colegiado'].'</td>
                      <td>'.$dados['ano_smestral'].'</td>
      <td><center>
      <a href="cadas_displi.php?acao=editar&cod_dis='.$dados['cod_dis'].'" type="button"  class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"> Edita</a></i>
     <a href="cadas_displi.php?acao=deletar&cod_dis='.$dados['cod_dis'].'" type="button" target="_blank" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-delet"> Deleta</a></i>
     </center></td>  ';
              }        
      ?>
      </tr>
  </tbody>
  </table>
									   
        </div>                     
     </div>  
  </div>
   
		<!-- Bootstrap core JavaScript -->
  <script src="template/vendor/jquery/jquery.min.js"></script>
  <script src="template/vendor/tether/tether.min.js"></script>
  <script src="template/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>									
</html>
 
 

  
  
  
 
 