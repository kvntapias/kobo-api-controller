@if ($build_pdf->imprimir_grupo_respuestas('group_wu4ss89/grupo_familiar_01'))
    <!--INTEGRANTES HOGAR-->
    <div class="contenedor_ppal">
        <table style="width: 100%; page-break-inside: avoid;" class="table">
            <thead>
                <tr class="seccion_head">
                  <th colspan="2">
                    <h4 class="text-center">
                        INTEGRANTES DEL HOGAR
                    </h4>
                  </th>
                </tr>
              </thead>
            <tbody>
                @foreach ($build_pdf->imprimir_grupo_respuestas('group_wu4ss89/grupo_familiar_01') as $grup_rpta)
                    <tr @if ($grup_rpta['key'] == "Tipo_de_documento")
                            style="border-top: 1px solid black; font-weight: bold; text-align: left"
                        @endif
                    >
                        @switch($grup_rpta['type'])
                            @case('text')
                            @case('select_one')
                            @case('select_multiple')
                            @case('date')
                                    <td width="50%">
                                        {{ $grup_rpta['pregunta'] }} :
                                    </td>
                                    <td style="text-align: left">
                                        {{ $grup_rpta['respuesta'] }}
                                    </td>
                            @break             
                        @endswitch
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> 
@endif

<div class="page-break"></div>
<!--Datos de contacto-->
<div class="contenedor_ppal">
    <table style="width: 100%;" class="basic_table table table-sm">
        <thead>
            <tr class="seccion_head">
              <th colspan="2">
                <h4 class="text-center">
                    CONSTANCIA DE DESARROLLO DE LA VISITA
                </h4>
              </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td width="50%">
                    56. NOMBRE COMPLETO DE QUIEN REALIZA LA VISITA
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('NOMBRE_COMPLETO_DE_Q_EN_REALIZA_LA_VISITA') }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    57. No.DOCUMENTO DE IDENTIDAD
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('No_DOCUMENTO_DE_IDENTIDAD') }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    58. TELÉFONO DE CONTACTO
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('TEL_FONO_DE_CONTACTO') }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    59. FIRMA DEL BENEFICIARIO
                </td>
                <td>
                    <div class="image_container">
                        {!! $build_pdf->showImgServer('FIRMA_DEL_BENEFICIARIO', false, 300, 300) !!}
                    </div>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    60. FIRMA DE QUIEN REALIZA LA VISITA
                </td>
                <td>
                    <div class="image_container">
                        {!! $build_pdf->showImgServer('FIRMA_DE_QUIEN_REALIZA_LA_VISITA', false, 300, 300) !!}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>