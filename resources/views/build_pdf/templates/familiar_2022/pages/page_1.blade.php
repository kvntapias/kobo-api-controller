<div class="seccion_head mt-1">
    <h4 class="text-center">
      ESQUEMAS ESPECIALES DE ACOMPAÑAMIENTO FAMILIAR
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


<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
    <tr>
      <td width="50%">
        <table class="basic_table">
            <tbody>
                <tr>
                  <td>
                    <b>_SE_LE_REALIZO_LA_ENTREGA_DEL_ :</b>
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
            GRUPO RESP group_xr6vs11
          </h4>
        </div>
      </thead>
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_xr6vs11') as $grup_rpta)
                <tr style="border: 1px solid black">
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

<!-- group_kg8at81 -->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
      <thead>
        <div  class="seccion_head">
          <h4 class="text-center">
            GRUPO RESP group_kg8at81
          </h4>
        </div>
      </thead>
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_kg8at81') as $grup_rpta)
                <tr style="border: 1px solid black">
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