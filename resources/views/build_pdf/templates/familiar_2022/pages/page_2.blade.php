@if ($build_pdf->imprimir_texto('_1_CUENTA_CON_ESQUEMA_DE_ACOMP') == "si")

    <div class="contenedor_ppal">
        <table style="width: 100%;" class="basic_table table table-sm text-left">
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

    <!--Justificaciones PREHGUNTAS 30 - 55 -->
    <div class="contenedor_ppal">
        <table style="width: 100%;" class="basic_table table table-sm">
            <tbody>
            <tr>
                <td width="50%">
                    30. JUSTIFIQUE LAS RESPUESTAS NEGATIVAS. INFORME LA RAZÓN PRINCIPAL POR LA CUAL EL NEGOCIO NO CUENTA CON LOS REQUISITOS MENCIONADOS ANTERIORMENTE
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_2_JUSTIFIQUE_LAS_RE_ONADOS_ANTERIORMENTE', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    31. ¿QUÉ TAN ÚTIL ES PARA USTED DAR CUMPLIMIENTO A TODOS LOS REQUISITOS DE LEGALIZACIÓN?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_1_QU_TAN_TIL_ES_ITOS_DE_LEGALIZACI_N', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    32. ¿QUÉ TAN INTERESADO SE ENCUENTRA USTED DE CUMPLIR CON TODOS LOS REQUISITOS LEGALES PARA SU NEGOCIO?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_2_QU_TAN_INTERESA_ALES_PARA_SU_NEGOCIO', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    33. ¿CUÁL DE LOS SIGUIENTES REQUISITOS CONSIDERA QUE DEBE SER RESUELTO DE MANERA MÁS INMEDIATA EN SU NEGOCIO?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto_implode('_3_CU_L_DE_LOS_SIGU_EDIATA_EN_SU_NEGOCIO', false, " ", ",", true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    34. ¿QUÉ TAN INTERESADO SE ENCUENTRA EN RECIBIR ASISTENCIA TÉCNICA PARA SU NEGOCIO?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_1_QU_TAN_INTERESA_NICA_PARA_SU_NEGOCIO', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    35. ¿EL EEAF CUENTA CON PRACTIVAS CONTABLES?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_2_EL_EEAF_CUENTA_CON_PRACTIV', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    36. PORQUE NO SE LLEVA LA CONTABILIDAD ACTUALMENTE:
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_2_1_PORQUE_NO_SE_LL_ABILIDAD_ACTUALMENTE', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    37. ¿EN ALGUN MOMENTO UTILIZARON LA CONTABILIDAD PARA TOMAR DECISIONES EN SU EMPRENDIMIENTO?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_3_EN_ALGUN_MOMENTO_UTILIZARO', true) }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    38.  En que Forma:
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_3_1_En_que_Forma') }}
                </td>
            </tr>
            <tr>
                <td width="50%">
                    39. ¿EL EEAF MANEJA PRECIOS DIFERENCIALES AL MOMENTO DE VENTA DE PRODUCTO O SERVICIO ?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_4_EL_EEAF_MANEJA_P_PRODUCTO_O_SERVICIO_', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    40. Si la respuesta es afirmativa, indique los diferenciales que maneja:
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto_implode('_4_1_Si_la_respuesta_es_afirma', false, " ", ",", true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    41. Especifique Cuales
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_4_2_Especifique_Cuales') }}
                </td>
            </tr>

            <!--42-->
            <tr>
                <td width="50%">
                    42. ¿QUÉ REQUIERE EL EEAF PARA MEJORAR LA CALIDAD DE SU PRODUCTO/SERVICIO ?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto_implode('_5_QU_REQUIERE_EL_EEAF_PARA_', false, " ", ",", true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    43. Especifique Cuales
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_5_1_Especifique_Cuales') }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    44. ¿CUÁLES SON LOS CANALES DE DISTRIBUCIÓN DEL EEAF?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto_implode('_6_CU_LES_SON_LOS_CANALES_DE_', false, " ", ",", true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    45. Especifique Cuales
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_6_1_Especifique_Cuales') }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    46. ¿LES DA ALGÚN TIPO DE BENEFICIO A SUS CLIENTES?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_7_LES_DA_ALG_N_TIP_FICIO_A_SUS_CLIENTES', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    47. Si la respuesta es afirmativa, indique los beneficios:
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto_implode('_7_1_Si_la_respuesta_es_afirma', false, " ", ",", true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    48. Especifique Cuales
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_7_2_Especifique_Cuales') }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    49. El EEAF LE GENERA INGRESOS
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_5_El_EEAF_LE_GENERA_RECURSO', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    50. ESTOS INGRESOS PROVIENEN DE:
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_9_ESTOS_RECURSOS_PROVIENEN_DE', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    51. ¿LO QUE COBRA POR SU PRODUCTO LE ALCANZA PARA CUBRIR LOS COSTOS DE PRODUCCIÓN?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_10_LO_QUE_COBRA_PO_COSTOS_DE_PRODUCCI_N', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    52. ¿EL PERSONAL QUE INTERVIENE EN LA PRODUCCIÓN SE HA CAPACITADO?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_11_EL_PERSONAL_QUE_I_N_SE_HA_CAPACITADO', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    53. ¿HAN REALIZADO ALGÚN EJERCICIO DE PLANIFICACIÓN, EN LOS ÚLTIMOS DOS AÑOS?
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_12_HAN_REALIZADO_ALG_N_EJERC', true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    54. SELECCIONE LOS EJERCICIOS REALIZADOS
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto_implode('_12_HAN_REALIZADO_ALG_N_EJERC', false, " ", ",", true) }}
                </td>
            </tr>

            <tr>
                <td width="50%">
                    55. RECOMENDACIONES
                </td>
                <td>
                    {{ $build_pdf->imprimir_texto('_11_RECOMENDACIONES') }}
                </td>
            </tr>

            </tbody>
        </table>
    </div>

@endif

<div class="page-break"></div>
<!--Datos de contacto-->
<div class="contenedor_ppal">
    <table style="width: 100%;" class="basic_table table table-sm">
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