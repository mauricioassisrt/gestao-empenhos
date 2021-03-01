   
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
$valorTotal = 0;
$quantidade = 0;
foreach ($equipamento as $equipamentos) {
    if ($equipamentos->periodo->id_user == auth()->user()->id) {
        
        $valorTotal = $valorTotal + $equipamentos->periodo->valor;
        $quantidade++;
     
    }
}
   

foreach ($equipamento as $equipamentos) {

    if ($equipamentos->locador->user_id === auth()->user()->id) {

        $html .= '<tr>';
        $html .= '<td style="font-size: 12px">' . date('d/m/Y', strtotime($equipamentos->vencimento)) . '</td>';
        $html .= '<td>' . $equipamentos->locador->nome . '</td>';
        $html .= '<td>' . $equipamentos->locador->telefone . '</td>';
        $html .= '<td>' . $equipamentos->equipamento->nome . ' </td>';
        $html .= '<td>' . $equipamentos->periodo->nome . '</td>';
        $html .= '<td style="font-size: 10px">R$' . $equipamentos->periodo->valor . ',00</td>';
        $html .= '<td >' . $equipamentos->endereco . '</td>';

        $html .= '</tr>';
    }
}


$html .= '</tbody>';
$html .= '</table';
$html .= '<h4> TOTAL DE LOCAÇÕES =  ' . $quantidade . '</h4>';

$html .='<h4>  VALOR TOTAL =  R$'.$valorTotal.',00</h4>';
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
			<h2 style="text-align: center;">RELATÓRIO LOCAÇÕES POR PERÍODO</h2>
                         <p style="font-size: 14px">RELATÓRIO ENTRE '.$inicial.' ATÉ ' .$final.'</p>
			' . $html . '
		');

//Renderizar o html

$dompdf->render();

//Exibibir a página
$dompdf->stream(
        "relatorio_por_periodo.pdf", array(
    "Attachment" => true //Para realizar o download somente alterar para true
        )
);
?>
