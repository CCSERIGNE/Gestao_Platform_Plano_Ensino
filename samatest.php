<?php

	include'connection.php';
	echo "touba";

			$sql1 = mysqli_query($conn,"SELECT d.cod_dis, d.nome, d.cargo_horario,d.colegiado, d.ano_smestral, d.ementa, d.objetivo ,b.descripcao, b.cod_biblio,rbd.ordem, rbd.tipo,p.nome,c.nome, c.modalide, c.cod_curso, c.cod_form ,f.descripcao,f.nivel FROM disciplina  d
			JOIN relacao_dis_biblio  rbd on rbd.cod_dis = d.cod_dis
			JOIN biblioteca  b on b.cod_biblio = rbd.cod_biblio
			JOIN relacao_dis_prof  rdp on rdp.cod_dis = d.cod_dis
			JOIN professor  p on p.siape = rdp.siape
			JOIN relacao_curso_dis  rcd on rcd.cod_dis = d.cod_dis
			JOIN curso  c on c.cod_curso = rcd.cod_curso
			JOIN forma  f on f.cod_form = c.cod_form
			WHERE 1");
							if(!$sql1){
											echo "bahoul";
							}else
							{
								while ($dados_cons1 = mysqli_fetch_array($sql1 ,MYSQL_ASSOC)) 
                      {
                          
                         echo $dados_cons1['d.nome'];
                         echo $dados_cons1[3];	
                         
                      }   
							}
?>