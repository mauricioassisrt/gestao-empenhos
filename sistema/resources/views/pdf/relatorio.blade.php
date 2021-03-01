<?php
$valorTotal = 0;
$quantidade = 0;
foreach ($resultado as $resultados) {
    if ($resultados->periodo->id_user == Auth::user()->id) {

        $valorTotal = $valorTotal + $resultados->periodo->valor;
        $quantidade++;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>

        <font face="Helvetica"> 
        <h2 style="text-align: center;">RELATORIO DE POR PERIODO </h2>
        <hr/>




        <table  style="text-align: center; ">
            <thead>
                <tr>
                    <th  style="text-align: center; width:300px;" bgcolor="GREY">
                      PERIODO REFERENCIA
                    </th>
                    <th style="text-align: center; width:200px;" bgcolor="GREY">
                        TOTAL DE LOCAÇÕES 
                    </th>
                    <th style="text-align: center; width:200px;" bgcolor="GREY">
                        VALOR BRUTO
                    </th>

                </tr>
            </thead>

            <tbody>

                <tr>

                    <td>
                        {{$referencia}} ATÉ   {{$referencia2}}
                    </td>

                    <td>
                        {{$quantidade}} 
                    </td>
                    <td>
                        R$ {{$valorTotal}},00 
                    </td>

                </tr>

            </tbody>
        </table>
        <hr/>
        <h4>


        </h4>

        </font> <br />
    </body>
</html>
