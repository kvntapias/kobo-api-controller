<h4 class="text-center">EVALUACIÓN GENERAL DEL ESQUEMA</h4>

<div class="contenedor_ppal">
  <table style="width: 100%" class="text-center">
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="50%">
          <table class="basic_table text-center" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_du4lw03') as $grup_rpta)
                <tr style="border: 1px solid black">
                  <td>
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


<h4 class="text-center">CONDICIONES DEL ESPACIO INTERVENIDO</h4>
<div class="contenedor_ppal" style="page-break-after: always;">
  <table style="width: 100%" class="text-center">
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="50%">
          <table class="basic_table text-center" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_ox3kp13') as $grup_rpta)
                <tr style="border: 1px solid black">
                  <td>
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