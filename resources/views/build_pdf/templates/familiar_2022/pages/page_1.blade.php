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

{{ dd($build_pdf->imprimir_grupo_respuestas_complex('group_wu4ss89')) }}