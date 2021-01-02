<?php
//teste das variveis
date_default_timezone_set('America/Sao_Paulo');
$temp = date ("d-m-Y  H:m");



$cod_dis = (isset($_POST['cod_dis'])) ? $_POST['cod_dis'] : '';
			if(empty($cod_dis))
			{
				
 					echo "<script>alert('Desculpa Verifica os Dados de plano que voçê deseja gerar!');document.location='plano_fim.php';</script>";
			}
			else{	
				include 'connection.php';

			$sql1 = mysqli_query($conn, "SELECT d.cod_dis, d.nome, d.cargo_horario,d.colegiado, d.ano_smestral, d.ementa, d.objetivo,b.descripcao, b.cod_biblio,rbd.ordem, rbd.tipo,p.nome,c.nome, c.modalide, c.cod_curso, c.cod_form ,f.descripcao,f.nivel

			FROM disciplina  d
			LEFT OUTER JOIN relacao_dis_biblio  rbd on rbd.cod_dis = d.cod_dis
			LEFT OUTER JOIN biblioteca  b on b.cod_biblio = rbd.cod_biblio
			LEFT OUTER JOIN professor  p on p.siape = d.siape_prof
			LEFT OUTER JOIN curso  c on c.cod_curso = d.cod_curso
			LEFT OUTER JOIN forma  f on f.cod_form = c.cod_form
			where d.cod_dis = '$cod_dis'");

			$sql2 = mysqli_query($conn,"SELECT pl.ano_letivo, pl.semestre_letivo,pl.Estrategica_rec, pl.Conteudo_prog,pl.cronograma,pl.cod_plano,avl.peso,avl.instrumento,avl.criteiro,avl.cod_plano,avl.sequencial
			FROM plano_ensino  pl
			LEFT OUTER JOIN avaliacao  avl on avl.cod_plano = pl.cod_plano
			where pl.cod_dis = '$cod_dis'");
		}

			if (!$sql1 || !$sql2)
			{
				echo "<script>alert('O Sistema Nao pode gerar essa Plano Verifica os dados informado!');document.location='plano_fim.php';</script>";
				die("Erro nao seleciono : ");
			}	
				  
				  
				 /* $dados_cons1= mysqli_fetch_array($sql1);
				  $dados_cons2= mysqli_fetch_array($sql1);*/
				  while($dados_cons2 = mysqli_fetch_array($sql2) )
                  {
				  
				  while($dados_cons1 = mysqli_fetch_array($sql1) )
                      {
               
					include ("./MPDF57/mpdf.php");
				
						$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
									$pdf = new mPDF();
									$pdf->text_input_as_HTML = TRUE;
									$pdf->Open();
									$pdf->AddPage();
									$pdf->SetTitle('Plano Ensino');
									$pdf->SetMargins(3,3,20);
									$pdf->SetXY(15, 5);
									$pdf->Image('img/logo4.jpg' ,10,6,95,0 ,'JPG');
									$pdf->SetFont('Times', '', 08);
									$texto="";

									/*configurando cabeçcalho*/
									$pdf->SetY(10);
									$x=0;
									$y=0;
									$pdf->MultiCell(0, 5,$temp, 0,'R');
									$pdf->SetFont('Times', 'B', 08);


									$pdf->SetY(30);
									$x=0;
									$y=0;
									$pdf->MultiCell(0, 3, 'Plano Ensino', 0,'C');
									$pdf->SetFont('Times', 'B', 08);
									
	

								$pdf->SetFont('Times', 'B', 7,5);
						$pdf->SetXY(30, 35);
						$pdf->Cell(150, 5,  $dados_cons1[12],0,2,'C');
						$pdf->Cell(150, 5,  $dados_cons1[13],0,3,'C');
						
						$pdf->SetXY(30, 55);
						$pdf->Cell(90, 5, $dados_cons1[1],0,0,'C');
						$pdf->Cell(60, 5,  $dados_cons1['colegiado'],0,5,'C');
						$pdf->SetXY(30, 60);
						$pdf->Cell(90, 5, "           ". $dados_cons1['cargo_horario'],0,0,'C');
						$pdf->Cell(60, 5, $dados_cons1['ano_smestral'] ,0,5,'C');
						$pdf->SetXY(30, 65);
						$pdf->Cell(150, 5, $dados_cons1[11],0,10,'C');
						$pdf->Cell(150, 5,$dados_cons1[4],0,13,'C');
						$pdf->Cell(150, 5, $dados_cons2[0]."",1,15,'C');
						
						$pdf->SetXY(30, 35);
						$pdf->Cell(150, 5, 'CURSO :',1,2,'L');
						$pdf->Cell(150, 5, 'MODALIDADE DO CURSO :',1,3,'L');
						$pdf->Cell(50, 10, 'NÍVEL DE ENSINO / FORMA',1,0,'L');
						$pdf->Cell(100, 5,$dados_cons1[17] ,1,5,'C');
						$pdf->Cell(100, 5, $dados_cons1[16],1,6,'C');
						$pdf->SetXY(30, 55);
						$pdf->Cell(90, 5, 'DISCIPLINA :',1,0,'L');
						$pdf->Cell(60, 5, 'COLEGIADA :',1,5,'L');
						$pdf->SetXY(30, 60);
						$pdf->Cell(70, 5, 'CARGA DA DISCIPLINA EM H :',1,0,'L');
						$pdf->Cell(80, 5, 'Semestral ou anual :' ,1,5,'L');
						$pdf->SetXY(30, 65);
						$pdf->Cell(150, 5, 'PROFESSOR/PROFESSORES :',1,10,'L');
						$pdf->Cell(150, 5, 'ANO LETIVO/ SEMESTRE :',1,13,'L');
						$pdf->Cell(150, 5, 'SEMESTRE DO CURSO OU ANO DA TURMA :',1,15,'L');
						$soma=0;
						$pdf->SetXY(38, 82);
						
	
						 
								
							$pdf->ln();
							$pdf->SetX(30);
							
							//$pdf->Cell(150, 8,'OBJETIVO GERAL DO CURSO' , 1,2, 'C');
							//$pdf->MultiCell(150, 5,$dados_cons1[]."" , 1,2, 'L');
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'OBJETIVOS DA DISCIPLINA' , 1,2, 'C');
							$pdf->multiCell(150, 5,$dados_cons1[6], 1,3, 'L');
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'EMENTA' , 1,2, 'C');
							$pdf->MultiCell(150, 5,$dados_cons1[5] , 1,0, 'L');
							

							
								$pdf->SetXY(48, 133);
						
	/*avl.peso,avl.instrumento,avl.criteiro,avl.cod_plano,avl.sequencial*/
						 
								
						$pdf->ln();
							
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'CONTEUDO' , 1,2, 'C');
							$pdf->MultiCell(150, 5,$dados_cons2[3]."", 1,0, 'L');
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'CRONOGRAMA' , 1,2, 'C');
							$pdf->MultiCell(150, 5,$dados_cons2[4]."" , 1,0, 'L');
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'SISTEMÁTICA DE AVALIAÇÃO NA DISCIPLINA' , 1,13, 'C');
							$pdf->MultiCell(150, 5,$dados_cons2[10]."       ".$dados_cons2[8] ."             ".$dados_cons2[6] ."", 1,13, 'L');
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'ESTRATÉGIAS DE RECUPERAÇÃO PARALELA' , 1,2, 'C');
							$pdf->MultiCell(150, 5,$dados_cons2[2]."", 1,0, 'C');
							$pdf->SetX(30);
							$pdf->Cell(150, 8,'REFERÊNCIAS BIBLIOGRÁFICAS ' , 1,2, 'C');
							$pdf->MultiCell(150, 5,$dados_cons1[9]."  ".$dados_cons1[7]."      " .$dados_cons1[10]."       " .$dados_cons1[8]."      ", 1,5, 'R');
							$pdf->SetX(30);
							//$pdf->Cell(150, 8,'REFERÊNCIAS BIBLIOGRÁFICAS COMPLEMENTARES' , 1,2, 'C');
							//$pdf->MultiCell(150, 5,$dados_cons1['nome'] ."", 1,0, 'L');
							
							
							
								
						
 
												
												 
												$pdf->Ln();
												$pdf->SetFont('Times', 'B', 09);
												$pdf->SetX(30);
																																				
												//$pdf->Line(90,270,140,270);
												$pdf->Line(70,270,130,270);
												//$pdf->SetXY(30,169);
												//$pdf->MultiCell(150, 5,$mgs1,1,0);
												//$pdf->SetXY(30);
												//$pdf->MultiCell(150, 5,$msg2,1,0);
												$pdf->SetXY(88,278); 
												$pdf->Cell(65, 0, 'PROFESSOR');
												//$pdf->Cell(60, 0, 'Assinatura 2');
								$pdf->Output("plano.pdf","I");
		}
	}
?>