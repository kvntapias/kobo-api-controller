<div style="margin: 3px 5px 4px 4px; background-color: #4C96FE; color: white;">
  <h4 class="text-center">
    INFORMACION GENERAL <br>
    ESQUEMAS ESPECIALES DE ACOMPAÑAMIENTO FAMILIAR
  </h4>
</div>

<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid; border-top: none" class="table table-sm">      
    <tbody>
        <tr>
          <td width="50%">
            AUTORIZACIÓN TRATAMIENTO DE DATOS PERSONALES :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('Autorizaci_n_tratami_de_datos_personales', true) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            TIPO DE VISITA :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('Qu_tipo_de_visita_se_llevar_', true) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Fecha De Caracterización :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_1_Fecha_de_caracterizaci_n') }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Tipo De Documento :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_2_Tipo_de_Documento', TRUE) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            ¿Se Le Realizo La Entrega Del Esquema De Acompañamiento Familiar? :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('_SE_LE_REALIZO_LA_ENTREGA_DEL_', true) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Nombres :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_4_Nombres') }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Apellidos :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_5_Apellidos') }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Departamento :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/departamento', TRUE) }}
          </td>
        </tr>   
        <tr>
          <td width="50%">
            Municipio :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/municipio', TRUE) }}       
          </td>
        </tr> 
        <tr>
          <td width="50%">
            Seleccione nombre de la ubicación : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto_implode('group_wu4ss89/Seleccione_nombre_de_la_ubicac', false, " ", ",", true) }}
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_12_Centro_Poblado') ?? null }}
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_11_Asentamiento_Invasi_n') ?? null }}
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_13_Comunidad_ind_gena') ?? null }}
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_10_Barrio') ?? null }}   
          </td>
        </tr>
        <tr>
          <td width="50%">
            Teléfono : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_14_Telefono') ?? "-" }}      
          </td>
        </tr> 
        <tr>
          <td width="50%">
            Correo electrónico : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/Correo_Electr_nico') }}   
          </td>
        </tr> 
        <tr>
          <td width="50%">
            Ubicación :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_15_Ubicaci_n') }}
          </td>
        </tr>   
        <tr>
          <td width="50%">
            Forma De Llegar Al Predio :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_17_FORMA_DE_LLEGAR_AL_PREDIO') }}
          </td>
        </tr>  
        <tr>
          <td width="50%">
            DEPARTAMENTO NACIMIENTO :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/group_kq4ae36/DEPARTAMENTO_NACIMIENTO', TRUE) }}
          </td>
        </tr>  
        <tr>
          <td width="50%">
            MUNICIPIO NACIMIENTO :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/group_kq4ae36/MUNICIPIO_NACIMIENTO', TRUE) }}
          </td>
        </tr>  
        <tr>
          <td width="50%">
            El entrevistado conoce su fecha de nacimiento :
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/El_entrevistado_conoce_su_fech') }}
            {{ $build_pdf->imprimir_texto('group_wu4ss89/Seleccione_la_fecha_de_nacimiento') }}
            {{ $build_pdf->imprimir_texto('group_wu4ss89/R_3_Edad') }}
          </td>
        </tr>  
        <tr>
          <td width="50%">
            Jefe/a de hogar : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/Jefe_a_de_hogar', TRUE) }}
          </td>
        </tr>  
        <tr>
          <td width="50%">
            Sexo : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/R_4Sexo', TRUE) }}
          </td>
        </tr> 
        <tr>
          <td width="50%">
            Orientación Sexual : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/Orientaci_n_sexual', TRUE) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Identidad de Género : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/Identidad_de_g_nero', TRUE) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Discapacidad : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto_implode('group_wu4ss89/Discapacidad', false, " ", ",", true) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            Pertenencia Étnica : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/Pertenencia_tnica', TRUE) }}
          </td>
        </tr>
        <tr>
          <td width="50%">
            ¿ Cuenta con integrantes en el hogar ? : 
          </td>
          <td>
            {{ $build_pdf->imprimir_texto('group_wu4ss89/_Cuenta_con_integrantes_en_el_', TRUE) }}
          </td>
        </tr>
    </tbody>
  </table>
</div>

<!--IMÁGENES-->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
    <tbody>
      <tr>
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              <tr>
                <td width="50%">
                  Fotografia de la Vivienda :
                </td>
                <td>
                  {!! $build_pdf->showImgServer('group_wu4ss89/_16_Fotografia_de_la_Vivienda', false, 100, 250) !!}
                </td>
              </tr>
              <tr>
                <td width="50%">
                  Georreferenciación :
                </td>
                <td>
                  <img style="margin-top: 10px; width: 250px!important" class="image_map_georef" src="{{ $build_pdf->generar_imagen_geo() }}">
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<!-- group_xr6vs11/_1_CUENTA_CON_ESQUEMA_DE_ACOMP -->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
      <thead>
        <tr class="seccion_head">
          <th colspan="2">
            <h4 class="text-center">
              **4. SEGUIMIENTO A LOS ESQUEMAS ESPECIALES DE ACOMPAÑAMIENTO FAMILIAR**
            </h4>
          </th>
        </tr>
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

<!-- Componente al cual esta asociado el EEAF -->
<div class="contenedor_ppal">
  <table style="width: 100%; page-break-inside: avoid;" class="table">
      <thead>
        <div  class="seccion_head">
          <h4 class="text-center">
            Componente al cual esta asociado el EEAF: 
            {{ $build_pdf->imprimir_texto('group_xr6vs11/_4_1_Componente_al_cual_esta_a', TRUE) }}
          </h4>
        </div>
      </thead>
      <tr>
        <!--LINEA DE DOTACION.-->
        <td width="100%">
          <table class="basic_table table table-sm" style="width: 100%">
            <tbody>
              @foreach ($build_pdf->imprimir_grupo_respuestas( $build_pdf->getGrupoBasedRespuesta('group_xr6vs11/_4_1_Componente_al_cual_esta_a') ) as $grup_rpta)
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


<div class="page-break"></div>
<!--TIPO DE ESQUEMA DE ACOMPAÑAMIENTO-->
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


@if ($build_pdf->imprimir_grupo_respuestas('group_yo3fr74'))
    <!---OTRO TIPO ESQUEMA -->
    <div class="contenedor_ppal">
      <table style="width: 100%;" class="basic_table table table-sm">
        <tbody>
          @foreach ($build_pdf->imprimir_grupo_respuestas('group_yo3fr74') as $grup_rpta)
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
              @case('integer')
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
@endif
