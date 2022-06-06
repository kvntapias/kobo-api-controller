<div class="contenedor_ppal">
    <table style="width: 100%;" class="basic_table table table-sm">
      {{-- <thead>
        <tr class="seccion_head">
          <th colspan="2">
            <h4 class="text-center">
              18 - 28
            </h4>
          </th>
        </tr>
      </thead> --}}
      <tbody>
        <tr>
            <td width="50%">
                18. COMO ES SU PERCEPCIÓN FRENTE AL PROCESO DEL CUAL FUE BENEFICIARIO PARA LA ENTREGA DEL EEAF.
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('C_COMO_ES_SU_PERCEP_LA_ENTREGA_DEL_EEAF') }}
            </td>
        </tr>
        <tr>
            <td width="50%">
                19. COMO FUE LA ATENCIÓN QUE RECIBIÓ POR PARTE DE LA UNIDAD PARA LA ENTREGA DEL EEAF?
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('d_COMO_FUE_LA_ATENC_LA_ENTREGA_DEL_EEAF') }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                20. ¿COMO FUE LA ATENCIÓN QUE RECIBIÓ POR PARTE DEL OPERADOR PARA LA ENTREGA DEL EEAF?
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('e_COMO_FUE_LA_ATE_LA_ENTREGA_DEL_EEAF') }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                21. ¿QUÉ MEJORAS RECOMENDARÍA CON EL FIN DE FORTALECER EL PROCESO DE IMPLEMENTACIÓN DE EEAF?
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('f_QU_MEJORAS_REC_PLEMENTACI_N_DE_EEAF') }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                22. SELECCIONE LOS SERVICIOS PÚBLICOS NECESARIOS PARA EL FUNCIONAMIENTO DE LA DOTACIÓN
            </td>
            <td>
                {{ $build_pdf->imprimir_texto_implode('A_SELECCIONE_LOS_SE_IENTO_DE_LA_DOTACI_N', false, " ", ",", true) }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                23. ¿CON CUÁL DE ESTOS SERVICIOS PÚBLICOS NO CUENTA EN SU NEGOCIO?
            </td>
            <td>
                {{ $build_pdf->imprimir_texto_implode('B_CON_CU_L_DE_ESTO_CUENTA_EN_SU_NEGOCIO', false, " ", ",", true) }}
            </td>
        </tr>
        
        <tr>
            <td width="50%">
                24. ¿HA MEJORADO LAS CONDICIONES DE NEGOCIO A TRAVÉS DE LA CONSECUCIÓN DE OTROS EQUIPAMIENTOS?
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('C_HA_MEJORADO_LAS_CONDICIONE', true) }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                Ha recibido acompañamiento al EEAF por algún ente territorial
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('Ha_recibido_acompa_amiento_al', true) }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                I26. Indique cual acompañamiento recibió
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('Indique_cual_acompa_amiento_recibi') }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                27. CONSIDERA QUE LA IMPLEMENTACIÓN DEL ESQUEMA CONTRIBUYÓ AL 
                i)MEJORAMIENTO DE SU CAPACIDAD DE GENERACIÓN DE INGRESOS 
                ii)MEJORAMIENTO DE SU SEGURIDAD ALIMENTARIA 
                iii)A LA REDUCCIÓN DE CARENCIAS HABITACIONALES  
                (SE APLICARÁ CUALQUIERA DE LOS TRES SEGÚN SEA EL CASO DEL EEAF QUE SE HAGA SEGUIMIENTO)
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('A_CONSIDERA_QUE_LA_SE_HAGA_SEGUIMIENTO', true) }}
            </td>
        </tr>

        <tr>
            <td width="50%">
                28. ¿LA IMPLEMENTACIÓN DEL EEAF LE HA GENERADO OPORTUNIDADES PARA EL DESARROLLO DE NUEVAS HABILIDADES PERSONALES Y/O COLECTIVAS?
            </td>
            <td>
                {{ $build_pdf->imprimir_texto('B_LA_IMPLEMENTACI_NALES_Y_O_COLECTIVAS', true) }}
            </td>
        </tr>


        @foreach ($build_pdf->imprimir_grupo_respuestas('_1_POR_LO_ANTERIOR_IGUIENTES_REQUISITOS') as $grup_rpta)
            <tr>
                <td width="50%">
                {{ $grup_rpta['pregunta'] }} : <br>
                </td>
                <td>
                {{ $grup_rpta['respuesta'] }}
                </td>
            </tr>
        @endforeach

      </tbody>
    </table>
  </div>