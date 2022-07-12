<!--RESULTADO DE LA VISITA-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
      <thead>
        <div class="seccion_head">
          <h4 class="text-center">
            RESULTADO DE LA VISITA
          </h4>
        </div>
      </thead>
      <tr>
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_zn3gj10') as $grup_rpta)
                <tr>
                  <td width="50%">
                    {{ $grup_rpta['pregunta'] }} : 
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