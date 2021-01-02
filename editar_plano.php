<?php

	 include 'connection.php';
		
				$result = mysqli_query($conn, "SELECT , a.nome, c.nome_curso , a.cod_matricula, a.ano_seletivo 
					FROM aluno as a 
					JOIN curso as c on a.id_curso = c.id_curso");
				if(!$result){
					die("Erro nao seleciono : " );
				}


    // FUNCAO SELECT 


?>