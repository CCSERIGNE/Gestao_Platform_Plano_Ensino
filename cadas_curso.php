<!doctype html>
 <html >
<?php
    $ed_cod_curso = "";
    $ed_nome_curso = "";
    $ed_forma_curso = "";
    $ed_nivel_curso = "";
    $ed_mod_curso  = "";
    $cd_curso = (isset($_GET['cd_curso'])) ? $_GET['cd_curso'] : '';
    $acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
    if($acao == "deletar")
    {
        include 'connection.php';
        $result_dl = mysqli_query($conn, "DELETE FROM curso WHERE cod_curso = '$cd_curso'");
        if(!$result_dl)
              {
                echo "<script>alert('Cod Curso Nao Foi Achado!');document.location='cadas_curso.php';</script>";
                die(" " );
              } 
        else
        {
          echo "<script>alert('Os Dados foi Deletado com sucesso!');document.location='cadas_curso.php';</script>";
        }
          
    }
    else if ($acao == "editar")
    {
      include 'connection.php';
      $result_ed = mysqli_query($conn, "SELECT c.nome,c.modalide,c.cod_form,c.cod_curso,f.nivel,f.descripcao FROM curso c JOIN forma f on f.cod_form = c.cod_form WHERE c.cod_curso = '$cd_curso'");
          if(!$result_ed)
              {
               echo "<script>alert('Cod Curso Nao Foi Achado!');document.location='cadas_curso.php';</script>";
                die(" " );
              }  
          while($dados_ed= mysqli_fetch_array($result_ed) )
              {
                  $ed_cod_curso = $dados_ed['cod_curso'];
                  $ed_nome_curso = $dados_ed['nome'];
                  $ed_forma_curso = $dados_ed['cod_form'];
                  $ed_nivel_curso = $dados_ed['nivel'];
                  $ed_mod_curso   = $dados_ed['modalide'];
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
  <style type="text/css" class="init"></style>
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" language="javascript" src="template/vendor/bootstrap/js/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="template/vendor/bootstrap/js/demo.js"></script>
  
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
      
  <div id="loginbox" style="margin-top:50px; " class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">       <div style="background-color: #fff; border-color: green; " class="panel panel-info" >
               <div style="background-color:green; " class="panel-heading">
                <h3 align="center" style="color:#fff"><b>CADASTRAR CURSO</b></h3>
               <div style="color:#fff; "class="panel-title"> </div>
               <div style="float:right; font-size: 80%; position: relative; top:-10px ; "><a href="#"></a></div>
         </div>     
 
    <div style="padding-top:30px" class="panel-body" >
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
      <form  method="POST" action="curso_cadastrado.php">	
					<div style="margin-bottom: 25px" class="input-group">

            <?php
            echo'
            <input type="hidden" name="acao" value="'.$acao.'">
            <input type="hidden" name="cd_curso" value="'.$ed_cod_curso.'">  
               <span class="input-group-addon"><i  class="glyphicon glyphicon-modal-window"> COD CURSO</i>
										<input  type="text" name ="cod_curso" value="'.$ed_cod_curso.'"';if($acao =="editar")echo 'disabled';echo '>
                    </span>  
                    
                             
					</div>
					<div style="margin-bottom: 25px " class="input-group"  >
              <span  class="input-group-addon"><i  class="glyphicon glyphicon-briefcase"> NOME CURSO </i>
										<input type="text"  name="nome_curso" value="'.$ed_nome_curso.'">
										</span>
				  </div>';
          ?>
					<div style="margin-bottom: 15px" class="input-group" >
              <span  class="input-group-addon"><i class="glyphicon glyphicon-folder-close"> MODALIDADE</i>
										<select name="modalidade" >  
										<option value="PRESENCIAL" <?= ($ed_mod_curso=="PRESENCIAL")? 'selected': ''?> > PRESENCIAL</option>
										<option value="EAD" <?= ($ed_mod_curso=="EAD")? 'selected': ''?>> EAD</option></select></span>
          </div>
					<div style="margin-bottom: 15px" class="input-group">
              <span class="input-group-addon"><i  class="glyphicon glyphicon-tasks"> NIVEL</i>
										<select  name="nivel_curso" >  
										<option value="ENSINO MEDIO" <?= ($ed_nivel_curso=="ENSINO MEDIO")? 'selected': ''?>> ENSINO MEDIO</option>
										<option value="SUPERIOR" <?= ($ed_nivel_curso=="SUPERIOR")? 'selected': ''?>> SUPERIOR</option></select></span>
          </div>
					<div style="margin-bottom: 25px" class="input-group">
               <span class="input-group-addon"><i  class="glyphicon glyphicon-copyright-mark"> FORMA</i>
										<select name="forma_curso" >  
										<option value="001" <?= ($ed_forma_curso=="001")? 'selected': ''?>> Integrado</option>
										<option value="002" <?= ($ed_forma_curso=="002")? 'selected':''?>> Subsequente </option>
										<option value="0003" <?= ($ed_forma_curso=="0003")? 'selected': ''?>> Bacherelado</option>
										<option value="0004" <?= ($ed_forma_curso=="0004")? 'selected': ''?>> Licenciatura</option>
										<option value="0005" <?= ($ed_forma_curso=="0005")? 'selected': ''?>> Engenharia</option>
										</select></span>
					</div>
          <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
            <div style="position:center " class="col-sm-12 controls">
									<center><button style="color:green;"  type="submit" > CADASTRA </button> 
                     <!-- <center><input type="submit" align="center" id="btn-login"  href="pagin1.html" class="btn btn-success"></center>
                     <a id="btn-fblogin" href="#" class="btn btn-primary">Login com Facebook</a>-->
						</div>
          </div>
 
			  </form>		   
        <br><br>
        
        <form method="POST" action="cadas_curso.php">

         <center style="color: green" > <h4>COLSULTA CURSO</h4></center>
         <center> <input type="text" name="cood_curso"><button style="color:green;"  type="submit" > CONSULTA </button></center> 
         <center><h6 style ="color:green"> INFORME CODIGO DE CURSO </h6></center>
        </form><br>

        <div class="container">
        <table id="minhatabela" class="table">
         <thead>
           <tr>
                <th style="color: green"><b>Nome</b></th>
                <th style="color: green"><b>Desc.</b></th>
                 <th style="color: green"><b>Nivel</b></th>
                 <th style="color: green"><b>Moda.</b></th>
            </tr>
        </thead>
        
   <tbody>     
        <?php
        $cood_curso = (isset($_POST['cood_curso'])) ? $_POST['cood_curso'] : '';
          include 'connection.php';                    
          $result = mysqli_query($conn, "SELECT c.nome,c.modalide,c.cod_form,c.cod_curso,f.nivel,f.descripcao FROM curso as c JOIN forma as f on f.cod_form = c.cod_form WHERE c.cod_curso = $cood_curso");

          if(!$result)
              {
                echo '<center><h6 style ="color:green"> VERIFICA CODIGO DE CURSO </h6></center>';
                die(" " );
              }                              
          while($dados= mysqli_fetch_array($result) )
              {
                echo'    
                      <tr class="success">
                      <td>'.$dados['nome'].'</td>
                      <td>'.$dados['descripcao'].'</td>
                      <td>'.$dados['nivel'].'</td>
                      <td>'.$dados['modalide'].'</td>
                     
      <td><center>
     <a href="cadas_curso.php?acao=editar&cd_curso='.$dados['cod_curso'].'" type="button"  class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"> Edita</a></i>
     <a href="cadas_curso.php?acao=deletar&cd_curso='.$dados['cod_curso'].'" type="button" target="_blank" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-delet"> Deleta</a></i>
     </center></td>  ';
              }        
      ?>
      </tr>
  </tbody>
  </table>
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
 
 

  
  
  
 
 