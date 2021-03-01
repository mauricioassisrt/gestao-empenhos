
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
        @foreach($servico as $iten)
        @if($iten->user_id === auth()->user()->id)
        <font face="Helvetica"> 
        <h2 style="text-align: center;">REPAROS REALIZADOS EM {{date( 'd/m/Y' , strtotime($iten->data))}}</h2>
        <hr/>




        @foreach($servico as $iten)
        <p style="text-align: center"> Equipamento :  {{$iten->nomes}} </p>
        <p style="text-align: center"> DESCRIÇÃO DOS ITENS</p>
        @break; 
        @endforeach
        <br/>
       

        <table style="margin: auto" >
            <thead>
                <tr>
                    <th>
                        Peça
                    </th>
                    <th>
                        Descrição
                    </th>
                    <th>
                        Quantidade
                    </th>
                    <th>
                        Valor 
                    </th>
                    <th>
                        Valor Total 
                    </th>

                </tr>
            </thead>
            <tbody>
                <!--percore todos os pecas cadastrado em banco -->
                @foreach($servico as $iten)
                <tr>
                    <td>
                        {{$iten->nome}}
                    </td>
                    <td>
                        {{$iten->descricaopeca}} 
                    </td>
                    <td>
                        {{$iten->quantidade}} 
                    </td>
                    <td>
                        R$ {{$iten->valorSomaIten}} 
                    </td>
                    <td>
                        R$ {{$iten->preco}} 
                    </td>

                </tr>
                @endforeach


            </tbody>

        </table>
        <hr/>
        @if(count($servico)>=1)
        <table style="margin: auto; border:none"  >
            <thead>
                <tr>

                    <th style="border:none">
                        Total de Peças 
                    </th>
                    <th style="border:none">
                        Total mão de obra 
                    </th >
                    <th style="border:none">
                        Peças Reparadas
                    </th>
                    <th style="border:none">
                        Valor Final 
                    </th>


                </tr>
            </thead>
            <tbody>
                <!--percore todos os pecas cadastrado em banco -->

                <tr>

                    <td style="border:none">
                        R$ {{$iten->totalpecas}}
                    </td>
                    <td style="border:none">
                        R${{$iten->maodeobra}}
                    </td>
                    <td style="border:none">
                        {{ $iten->itens}}
                    </td>
                    <td style="border:none">
                        R${{$iten->valorFinal}}
                    </td>

                </tr>
            </tbody>
        </table>

        @endif

        </font> <br />
        @break
        @endif
        @endforeach
    </body>
</html>
