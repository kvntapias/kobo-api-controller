<!--Titulo-->
<h4 class="text-center">CARACTERIZACIÓN</h4>

<!--Tratam. Datos personales-->
<div class="contenedor_ppal">
  <table class="basic_table {{-- full_right --}}" style="width: 40%">
      <tbody>
          <tr>
            <td>
              <b>AUTORIZACIÓN TRATAMIENTO DE DATOS PERSONALES : </b>
              {{ $build_pdf->imprimir_texto('Autorizaci_n_tratami_de_datos_personales') }}
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
  <table class="basic_table {{-- full_right --}}" style="width: 40%">
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
                {{ $build_pdf->imprimir_texto('departamento') }}
              </td>
            </tr>
            <tr>
              <td>
                <b>MUNICIPIO :</b>
                {{ $build_pdf->imprimir_texto('municipio') }}
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
                {{ $build_pdf->imprimir_texto('DIRECCI_N_TERRITORIAL') }}
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
                    {{ $build_pdf->imprimir_texto('_3_GRUPO_POBLACIONAL') }}
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
                    -
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
                    {{ $build_pdf->imprimir_texto('_4_PARTICIPANTES_EN_LA_EJECUCI') }}
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
                    {{ $build_pdf->imprimir_texto('_2_LINEA_DE_INVERSION_EEAC') }}
                  </td>
                </tr>
            </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

<!--Georeferenciacion-->
<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <td width="100%">
        <table class="basic_table">
            <tbody>
                <tr>
                  <td>
                    <b>GEOREFERENCIACION :</b>
                  </td>
                  <td>
                    <b>LATITUD/LONGITUD</b>
                    {{ $build_pdf->imprimir_texto('GEOREFERENCIACION') }}
                  </td>
                  {{-- <td>
                    <b>LONGITUD :</b>
                    {{ $build_pdf->imprimir_texto('') }}
                  </td> --}}
                </tr>
            </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>

{{--   
# TEMPLATE
<div class="contenedor_ppal">
  <table>
      <tbody>
          <tr>
            <td class="td-25">
                <h3>Column {{$i}}</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </td>
            <td class="td-25">
                <h3>Column 4</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </td>
            <td class="td-25">
                <h3>Column 4</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </td>
            <td class="td-25">
                <h3>Column 4</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </td>
          </tr>
      </tbody>
  </table>
</div>
 --}}