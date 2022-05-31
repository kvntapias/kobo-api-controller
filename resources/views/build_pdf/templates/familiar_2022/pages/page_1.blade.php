<div class="seccion_head mt-1">
    <h4 class="text-center">
      INFORMACION GENERAL
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
              <b>TIPO DE VISITA :</b>
              {{ $build_pdf->imprimir_texto('Qu_tipo_de_visita_se_llevar_', true) }}
            </td>
          </tr>
      </tbody>
  </table>
</div>


<!--Información General-->
<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <td width="50%">
        <table class="basic_table">
            <tbody>
              <tr>
                <td>
                  1.1. Fecha de caracterización :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_1_Fecha_de_caracterizaci_n') }}
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  1.2. Tipo de Documento :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_2_Tipo_de_Documento', TRUE) }}
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  3. ¿SE LE REALIZO LA ENTREGA DEL ESQUEMA DE ACOMPAÑAMIENTO FAMILIAR? :
                  {{ $build_pdf->imprimir_texto('_SE_LE_REALIZO_LA_ENTREGA_DEL_', true) }}
                  <br>
                </td>
              </tr>
            </tbody>
        </table>
      </td>
    </tr>
  </table>
</div>


<!-- group_xr6vs11/_1_CUENTA_CON_ESQUEMA_DE_ACOMP -->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
      <thead>
        <div  class="seccion_head">
          <h4 class="text-center">
            **4. SEGUIMIENTO A LOS ESQUEMAS ESPECIALES DE ACOMPAÑAMIENTO FAMILIAR**
          </h4>
        </div>
      </thead>
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_xr6vs11') as $grup_rpta)
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
        </td>
      </tr>
  </table>
</div>

<!-- GENERACIÓN DE INGRESOS -->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
      <thead>
        <div  class="seccion_head">
          <h4 class="text-center">
            GENERACIÓN DE INGRESOS
          </h4>
        </div>
      </thead>
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_kg8at81') as $grup_rpta)
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
        </td>
      </tr>
  </table>
</div>

<div class="contenedor_ppal">
  <table style="width: 100%;" class="basic_table table table-sm">
    <thead>
      <tr class="seccion_head">
        <th colspan="2">
          <h4 class="text-center">
            {{ $build_pdf->imprimir_texto('group_xr6vs11/TIPO_DE_INVERSI_N_Marque_con_', true) }}
          </h4>
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($build_pdf->imprimir_grupo_respuestas($build_pdf->getGrupoBasedRespuesta('group_xr6vs11/TIPO_DE_INVERSI_N_Marque_con_')) as $grup_rpta)
        @switch($grup_rpta['type'])
          @case('image')
            <tr>
              <td width="50%">
                {{ $grup_rpta['pregunta'] }} : <br>
              </td>
              <td>
                {!! $grup_rpta['respuesta'] !!}
              </td>
            </tr>
          @break
          @case('text')
          @case('select_one')
            <tr>
              <td width="50%">
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