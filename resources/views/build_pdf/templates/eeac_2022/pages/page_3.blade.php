{{-- {{ $build_pdf->imprimir_texto('_2_1_Seleccione_dotaci_n', true) ? " - ".$build_pdf->imprimir_texto('_2_1_Seleccione_dotaci_n', true) : "" }}  --}}
<div class="contenedor_ppal">
    <table style="width: 100%; page-break-inside: avoid;" class="text-center">
        <tbody>
          <tr>
            <td>  <h4 class="text-center">LINEA DE INTERVENSIÓN {{ $build_pdf->imprimir_texto('_2_LINEA_DE_INVERSION_EEAC', true) }} </h4>
            </td>
          </tr>
          @foreach ($build_pdf->imprimir_grupo_respuestas_by_condicion_parent('_2_LINEA_DE_INVERSION_EEAC') as $grup_rpta)
            @switch($grup_rpta['type'])
                @case('image')
                  <tr style="border: 1px solid black">
                    <td>
                      {{ $grup_rpta['pregunta'] }} : <br>
                    </td>
                    <td>
                      {!! $grup_rpta['respuesta'] !!}
                    </td>
                  </tr>
                @break
                @case('text')
                @case('select_one')
                  <tr style="border: 1px solid black">
                    <td>
                      {{ $grup_rpta['pregunta'] }} : <br>
                    </td>
                    <td>
                      {{ $grup_rpta['respuesta'] }}
                    </td>
                  </tr>
                @break                  
            @endswitch
          @endforeach
        </tbody>
    </table>
  </div>