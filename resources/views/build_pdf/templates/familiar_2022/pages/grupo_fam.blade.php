@if ($build_pdf->imprimir_grupo_respuestas('group_wu4ss89/grupo_familiar_01'))
    <!--INTEGRANTES HOGAR-->
    <div class="contenedor_ppal">
        <table style="width: 100%; page-break-inside: avoid;" class="table">
            <thead>
                <tr>
                <td colspan="2">
                    <div class="seccion_head">
                    <h4 class="text-center">
                        INTEGRANTES DEL HOGAR
                    </h4>
                    </div>
                </td>
                </tr>
            </thead>
            <tbody>
                @foreach ($build_pdf->imprimir_grupo_respuestas('group_wu4ss89/grupo_familiar_01') as $grup_rpta)
                    <tr @if ($grup_rpta['key'] == "Tipo_de_documento")
                            style="border-top: 1px solid black; font-weight: bold"
                        @endif
                    >
                        @switch($grup_rpta['type'])
                            @case('text')
                            @case('select_one')
                            @case('select_multiple')
                            @case('date')
                                    <td>
                                        {{ $grup_rpta['pregunta'] }} :
                                    </td>
                                    <td>
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