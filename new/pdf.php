<?php
require('fpdf/fpdf.php');
require "connect.php"; 

$var = $_COOKIE['gerapdf'];

class Documento1 extends FPDF
{
    function Header()
    {
        $this->Image('bella.png', 340, 0);
        $this->Ln(90);
        $this->SetFont('Arial', 'B', 12);
		$this->Cell(806, 20, iconv('utf-8','iso-8859-1','Relatórios Títulos a Receber'), 1,1, 'C');
        $this->Cell(150, 20, 'Nome', 1,0, 'C');
        $this->Cell(70, 20, 'N. Contrato', 1,0, 'C');
        $this->Cell(50, 20, 'Parcela', 1,0, 'C');
        $this->Cell(70, 20, iconv('utf-8','iso-8859-1','Emissão'), 1,0, 'C');
        $this->Cell(72, 20, 'Vencimento', 1,0, 'C');
        $this->Cell(82, 20, 'Valor', 1,0, 'C');
        $this->Cell(150, 20, iconv('utf-8','iso-8859-1','Observação'), 1,0, 'C');
        $this->Cell(82, 20, 'Data PG', 1,0, 'C');
        $this->Cell(80, 20, 'V. Recebido', 1,0, 'C');         
#$pdf->Cell(30,5,iconv('utf-8','iso-8859-1','Solução:'),0,1);
        
		$this->Ln(20);
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new Documento1('P', 'pt', 'A4');
$pdf->AddPage('L');
$pdf->AliasNbPages();

$sql2 ="select count(p.valorparc) as qtd, sum(p.valorparc) as soma from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente where $var";
		$res = $con->prepare($sql2);
		$res->execute();
		$row2 = $res->fetchObject();
		$qtd = $row2->qtd;
		$soma = $row2->soma;


$sqlX="select p.registro as registro, c.nome as nome, p.numcont as numcont, p.parcela as parcela, p.valorparc as valorparc, p.dataemissao as dataemissao, p.datavenc as datavenc, p.formapg as formapg, p.datapg as datapg,  p.valorreb as valorreb from parcelas p inner join contrato con on p.numcont = con.num inner join cliente c on c.id = con.idcliente where $var";
			
    $resultado = $con->prepare($sqlX);
    $resultado->execute();    
		
while ($row = $resultado->fetchObject()) {
	
    $pdf->Cell(150, 20, iconv('utf-8','iso-8859-1',$row->nome), 1, 0, 'L'); 
    $pdf->Cell(70, 20, $row->numcont, 1, 0, 'C'); 
    $pdf->Cell(50, 20, $row->parcela, 1, 0, 'C'); 
    $pdf->Cell(70, 20, $row->dataemissao, 1, 0, 'L'); 
    $pdf->Cell(72, 20, $row->datavenc, 1, 0, 'L'); 
    $pdf->Cell(82, 20, $row->valorparc. 'R$' , 1, 0, 'L'); 
    $pdf->Cell(150, 20, iconv('utf-8','iso-8859-1',$row->formapg), 1, 0, 'L'); 
    $pdf->Cell(82, 20, $row->datapg, 1, 0, 'L'); 
    $pdf->Cell(80, 20, $row->valorreb, 1, 1, 'L'); 
    
}

#$pdf->Cell(806, 20, 'Valor Total = '. $soma.'R$', 1,1, 'L');
$pdf->Cell(806, 20, 'Bella Eventos', 1,1, 'C');
$pdf->Cell(806, 20, iconv('utf-8','iso-8859-1','Qt. Títulos = '. $qtd. '         Valor Total = '. $soma.'R$'), 0,1, 'L');
$pdf->Output(); 
?>