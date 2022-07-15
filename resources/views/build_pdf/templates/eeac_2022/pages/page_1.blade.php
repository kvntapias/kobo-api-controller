{{-- <div class="seccion_head mt-1">
  <h4 class="text-center">
    CARACTERIZACIÓN <br>
    ESQUEMAS ESPECIALES DE ACOMPAÑAMIENTO COMUNITARIO
  </h4>
</div> --}}

<div style="margin: 3px 5px 4px 4px; background-color: #4C96FE; color: white;">
  <h4 class="text-center">
    CARACTERIZACIÓN <br>
    ESQUEMAS ESPECIALES DE ACOMPAÑAMIENTO COMUNITARIO
  </h4>
</div>

<!--Tratam. Datos personales-->
<div class="contenedor_ppal">
  <table class="basic_table" style="width: 40%">
      <tbody>
          <tr>
            <td>
              <b>AUTORIZACIÓN TRATAMIENTO DE DATOS PERSONALES : </b>
              {{ $build_pdf->imprimir_texto('Autorizaci_n_tratami_de_datos_personales', true) }}
            </td>
          </tr>
          <tr>
            <td>
              <b>FECHA DE LA VISITA :</b>
              {{ $build_pdf->imprimir_texto('FECHA_DE_LA_VISITA') }}
            </td>
          </tr>
      </tbody>
  </table>
</div>

<!--Nombre Esquema/Codigo-->
<div class="contenedor_ppal">
  <table class="basic_table" style="width: 40%">
      <tbody>
        <tr>
          <td>
            <b>NOMBRE DEL ESQUEMA :</b>
            {{ $build_pdf->imprimir_texto('NOMBRE_DEL_ESQUEMA') }}
          </td>
        </tr>
        <tr>
          <td>
            <b>CÓDGO DEL ESQUEMA :</b>
            {{ $build_pdf->imprimir_texto('C_DIGO_DEL_ESQUEMA') }}
          </td>
        </tr>
      </tbody>
  </table>
</div>

<!--Departamento/Municipio/Dane-->
<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <!--DEPT-MUNICIP-DANE ETC.-->
      <td width="50%">
        <table class="basic_table">
          <tbody>
            <tr>
              <td>
                <b>DEPARTAMENTO :</b>
                {{ $build_pdf->imprimir_texto('departamento', true) }}
              </td>
            </tr>
            <tr>
              <td>
                <b>MUNICIPIO :</b>
                {{ $build_pdf->imprimir_texto('municipio', true) }}
              </td>
            </tr>
            <tr>
              <td>
                <b>CÓDIGO DANE :</b>
                {{ $build_pdf->imprimir_texto('codigo_dane') }}
              </td>
            </tr>
            <tr>
              <td>
                <b>DIRECCIÓN TERRITORIAL :</b>
                {{ $build_pdf->imprimir_texto('DIRECCI_N_TERRITORIAL', true) }}
              </td>
            </tr>
          </tbody>
        </table>
      </td>
      <!--CORREMTO-VEREDA-ZONA ETC.-->
      <td width="50%">
        <table class="basic_table" style="width: 100%">
          <tbody>
            <tr>
              <td>
                <b>CORREGIMIENTO O LOCALIDAD :</b>
                {{ $build_pdf->imprimir_texto('CORREGIMIENTO_O_LOCALIDAD') }}
              </td>
            </tr>
            <tr>
              <td>
                <b>VEREDA O BARRIO :</b>
                {{ $build_pdf->imprimir_texto('VEREDA_O_BARRIO') }}
              </td>
            </tr>
            <tr>
              <td>
                <b>ZONA DE INTERVENCIÓN :</b>
                {{ $build_pdf->imprimir_texto('ZONA_DE_INTERVENCION') }}
              </td>
            </tr>
            <tr>
              <td>
                <b>DIRECCIÓN :</b>
                {{ $build_pdf->imprimir_texto('DIRECCION') }}
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

<!--Grupo Poblacional-->
<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <td width="50%">
        <table class="basic_table">
            <tbody>
                <tr>
                  <td>
                    <b>GRUPO POBLACIONAL :</b>
                    {{ $build_pdf->imprimir_texto('_3_GRUPO_POBLACIONAL', true) }}
                    <br>
                    {{ $build_pdf->imprimir_texto('_3_1_Indique_cual') }}
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>NOMBRE DE LA COMUNIDAD O PUEBLO :</b>
                    {{ $build_pdf->imprimir_texto('_3_1_NOMBRE_DE_LA_COMUNIDAD_O_PUEBLO') }}
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>ESTADO DE LA ENTREGA :</b>
                    {{ $build_pdf->imprimir_texto('ESTADO_DE_LA_ENTREGA', true) }}
                  </td>
                </tr>
            </tbody>
        </table>
      </td>
      <!--ejecucion-->
      <td width="50%">
        <table class="basic_table">
            <tbody>
                <tr>
                  <td>
                    <b>PARTICIPANTES EN LA EJECUCIÓN DEL PROYECTO :</b>
                    {{ $build_pdf->imprimir_texto_implode('_4_PARTICIPANTES_EN_LA_EJECUCI', true) }}
                    <br>
                    {{ $build_pdf->imprimir_texto('_4_1_CUAL') }}
                  </td>
                </tr>
            </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

<!--Linea de intervensión-->
<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <td width="100%">
        <table class="basic_table">
            <tbody>
                <tr>
                  <td>
                    <b>LINEA DE INTERVENCIÓN :</b>
                    {{ $build_pdf->imprimir_texto('_2_LINEA_DE_INVERSION_EEAC', true) }}
                    {{ $build_pdf->imprimir_texto('_2_1_Seleccione_dotaci_n', true) ? " - ".$build_pdf->imprimir_texto('_2_1_Seleccione_dotaci_n', true) : "" }}
                  </td>
                </tr>
            </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

<!--Georeferenciacion y SOPORTE DE SEGUIMIENTO A LA OBRA-->
<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <td width="100%">
        <table class="basic_table">
            <tbody>
                <tr>
                  <td>
                    <b>SOPORTE DE SEGUIMIENTO A LA OBRA :</b>
                    <div class="image_container">
                      {!! $build_pdf->showImgServer('Soporte_de_seguimiento_a_la_obra', false, 300, 300) !!}
                    </div>
                  </td>
                  <td></td>
                  <td>
                    <b>LATITUD/LONGITUD :</b>
                    <div class="image_container">
                      <img style="margin-top: 10px" class="image_map_georef" src="{{ $build_pdf->generar_imagen_geo() }}" height="300" width="300">
                    </div>
                  </td>
                </tr>
            </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

<div class="page-break"></div>