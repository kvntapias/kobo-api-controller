<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="basic_table table table-sm">
    <thead>
      <tr>
        <td colspan="2">
          <div class="seccion_head">
            <h4 class="text-center">
              LINEA DE INTERVENSIÓN - {{ $build_pdf->imprimir_texto('_2_LINEA_DE_INVERSION_EEAC', true) }}
            </h4>
          </div>
        </td>
      </tr>
    </thead>
    <tbody>
      @foreach ($build_pdf->imprimir_grupo_respuestas_by_condicion_parent('_2_LINEA_DE_INVERSION_EEAC') as $grup_rpta)
        @switch($grup_rpta['type'])
            @case('image')
              <tr >
                <td width="50%">
                  {{ $grup_rpta['pregunta'] }} : 
                </td>
                <td>
                  {!! $grup_rpta['respuesta'] !!}
                </td>
              </tr>
            @break
            @case('text')
            @case('select_one')
              <tr >
                <td width="50%">
                  {{ $grup_rpta['pregunta'] }} : 
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

@if ($build_pdf->imprimir_texto('_2_1_Seleccione_dotaci_n', true))
  <div class="contenedor_ppal">
    <table style="width: 100%; page-break-inside: avoid;" class="basic_table table table-sm">
      <thead>
        <tr>
          <td colspan="2">
            <div class="seccion_head">
              <h4 class="text-center">
                SUBLINEA DE DOTACIÓN - {{ $build_pdf->imprimir_texto('_2_1_Seleccione_dotaci_n', true) }}
              </h4>
            </div>
          </td>
        </tr>
      </thead>
      <tbody>
          @foreach ($build_pdf->imprimir_grupo_respuestas_by_condicion_parent('_2_1_Seleccione_dotaci_n') as $grup_rpta_subli)
            @switch($grup_rpta_subli['type'])
              @case('image')
                <tr >
                  <td width="50%">
                      {{ $grup_rpta_subli['pregunta'] }} : 
                  </td>
                  <td>
                      {!! $grup_rpta_subli['respuesta'] !!}
                  </td>
                </tr>
              @break
              @case('text')
              @case('select_one')
                <tr >
                  <td width="50%">
                      {{ $grup_rpta_subli['pregunta'] }} : 
                  </td>
                  <td>
                      {{ $grup_rpta_subli['respuesta'] }}
                  </td>
                </tr>
              @break                  
            @endswitch
          @endforeach
      </tbody>
    </table>
  </div>
@endif