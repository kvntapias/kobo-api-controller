<h4 class="text-center">EVALUACIÓN GENERAL DEL ESQUEMA</h4>

<div class="contenedor_ppal" >
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

<!--CONDICIONES DEL ESPACIO INTERVENIDO-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="text-center">
      <tr>
        <td>  <h4 class="text-center">CONDICIONES DEL ESPACIO INTERVENIDO</h4>
        </td>
      </tr>
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

<!--CONDICIONES SOCIOECONÓMICAS DE LA COMUNIDAD-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="text-center">
      <tr>
        <td>  <h4 class="text-center">CONDICIONES SOCIOECONÓMICAS DE LA COMUNIDAD</h4>
        </td>
      </tr>
      <tr>
        <td width="50%">
          <table class="basic_table text-center" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_xm2lt02') as $grup_rpta)
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

<!--ARRAIGO TERRITORIAL-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="text-center">
      <tr>
        <td>  <h4 class="text-center">ARRAIGO TERRITORIAL, INTEGRACIÓN COMUNITARIA, BIENESTAR EMOCIONAL</h4>
        </td>
      </tr>
      <tr>
        <td width="50%">
          <table class="basic_table text-center" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_dy7ma42') as $grup_rpta)
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

<!--RESULTADO DE LA VISITA-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="text-center">
      <tr>
        <td>  <h4 class="text-center">RESULTADO DE LA VISITA</h4>
        </td>
      </tr>
      <tr>
        <td width="50%">
          <table class="basic_table text-center" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas('group_zn3gj10') as $grup_rpta)
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

<!--REGISTRO FOTOGRÁFICO VISITA-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="text-center">
      <tbody>
        <tr>
          <td>  <h4 class="text-center">REGISTRO FOTOGRÁFICO VISITA</h4>
          </td>
        </tr>
        @foreach ($build_pdf->imprimir_grupo_respuestas('group_wg8zp28/group_nl9hv20', true) as $grup_rpta)
          @switch($grup_rpta['type'])
              @case('image')
                <tr style="border: 1px solid black">
                  <td>
                    {{ $grup_rpta['pregunta'] }} : <br>
                  </td>
                  <td>
                    {!! $grup_rpta['respuesta'] !!}
                  </td>
                </tr>
              @break
              @case('text')
                <tr style="border: 1px solid black">
                  <td>
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