   
<?php

$html = ' <table  style="text-align: center; font-size: 12px;"  >';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th style="text-align: center;" bgcolor="GREY">VENCIMENTO </th>';
$html .= '<th style="text-align: center;" bgcolor="GREY">CLIENTE</th>';
$html .= '<th style="text-align: center;" bgcolor="GREY"> TELEFONE</th>';
$html .= '<th style="text-align: center;" bgcolor="GREY">EQUIPAMENTO </th>';
$html .= '<th style="text-align: center;" bgcolor="GREY"> PERIODO </th>';
$html .= '<th style="text-align: center;" bgcolor="GREY"> VALOR </th>';
$html .= '<th style="text-align: center;" bgcolor="GREY"> ENDEREÇO </th>';

$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$totalLocacoes = 0;
$somavalorLocacoes = 0;

foreach ($itens as $iten) {

    if ($iten->equipamento->user_id == auth()->user()->id && $equipamento->id == $iten->equipamento->id) {
        $totalLocacoes++;
        $somavalorLocacoes = $iten->periodo->valor + $somavalorLocacoes;

        $html .= '<tr>';
        $html .= '<td style="font-size: 12px">' . date('d/m/Y', strtotime($iten->vencimento)) . '</td>';
        $html .= '<td>' . $iten->locador->nome . '</td>';
        $html .= '<td>' . $iten->locador->telefone . '</td>';
        $html .= '<td>' . $iten->equipamento->nome . ' </td>';
        $html .= '<td>' . $iten->periodo->nome . '</td>';
        $html .= '<td style="font-size: 10px">R$' . $iten->periodo->valor . ',00</td>';
        $html .= '<td >' . $iten->endereco . '</td>';

        $html .= '</tr>';
    }
}

if ($equipamento->valor < $somavalorLocacoes) {
    $resultadoLucro = " LUCRO ";
    $lucro = $somavalorLocacoes - $equipamento->valor;
} else {
    $resultadoLucro = " PREJUÍZO R$ -  ";
    $lucro = $equipamento->valor - $somavalorLocacoes;
}

$html .= '</tbody>';
$html .= '</table';

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html(' <head>

                        <style>
                            table, th, td {
                                 border: 1px solid black;
                                 border-collapse: collapse;
                                 margin:auto;
                            }
                            body{
                            font-family:Helvetica;
                            
                            }
                        </style>
                        
                    </head>
			<h2 style="text-align: center;">RELATÓRIO LOCAÇÕES POR EQUIPAMENTO</h2>
                         <p  style="  text-align: center;">RELATÓRIO ENTRE ' . $inicial . ' ATÉ ' . $final . '<br/></p><h3 style="text-align: center;"> ' . $equipamento->nome . $equipamento->codigo. '</h3>
                             
			' . $html . ' <p style="font-size: 14px">   LOCAÇÕES REALIZADAS PELO EQUIPAMENTO ' . $totalLocacoes . '<br/> VALOR TOTAL DAS LOCAÇÕES R$ ' . $somavalorLocacoes . ',00 <br/> VALOR PAGO NO EQUIPAMENTO R$ '.$equipamento->valor.',00<br/> '
        . '' . $resultadoLucro . '' . $lucro . ',00</p>
		');

//Renderizar o html

$dompdf->render();

//Exibibir a página
$dompdf->stream(
        "relatorio_por_periodo.pdf", array(
    "Attachment" => false //Para realizar o download somente alterar para true
        )
);
?>
