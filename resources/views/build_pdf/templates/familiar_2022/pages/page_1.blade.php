<div class="seccion_head mt-1">
    <h4 class="text-center">
      INFORMACION GENERAL
    </h4>
</div>

<!--Tratam. Datos personales Y Tipo de Visita-->
<div class="contenedor_ppal">
  <table class="basic_table" style="width: 40%">
      <tbody>
          <tr>
            <td>
              AUTORIZACIÓN TRATAMIENTO DE DATOS PERSONALES :
              {{ $build_pdf->imprimir_texto('Autorizaci_n_tratami_de_datos_personales', true) }}
            </td>
          </tr>
          <tr>
            <td>
              TIPO DE VISITA :
              {{ $build_pdf->imprimir_texto('Qu_tipo_de_visita_se_llevar_', true) }}
            </td>
          </tr>
      </tbody>
  </table>
</div>


<!--Información General-->
<div class="contenedor_ppal">
  <table style="width: 100%;" class="text-center">
    <tbody>
    <tr>
      <!--IZQUIERDA-->
      <td width="50%">
        <table class="basic_table">
            <tbody>
              <tr>
                <td>
                  Fecha De Caracterización :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_1_Fecha_de_caracterizaci_n') }}
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  Tipo De Documento :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_2_Tipo_de_Documento', TRUE) }}
                  <br>
                </td>
              </tr>
              <tr>
                <td>
                  ¿Se Le Realizo La Entrega Del Esquema De Acompañamiento Familiar? :
                  {{ $build_pdf->imprimir_texto('_SE_LE_REALIZO_LA_ENTREGA_DEL_', true) }}
                </td>
              </tr>
              <tr>
                <td>
                  Nombres :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_4_Nombres') }}
                </td>
              </tr>
              <tr>
                <td>
                  Apellidos :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_5_Apellidos') }}
                </td>
              </tr>
              <tr>
                <td>
                  Departamento :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/departamento', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  Municipio :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/municipio', TRUE) }}
                </td>
              </tr>
            </tbody>
        </table>
      </td>

      <!--DERECHA-->
      <td width="50%">
        <table class="basic_table">
            <tbody>
              <tr>
                <td>
                  Seleccione nombre de la ubicación : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Seleccione_nombre_de_la_ubicac', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  Centro Poblado : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_12_Centro_Poblado') ?? "-" }}
                </td>
              </tr>
              <tr>
                <td>
                  Teléfono : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_14_Telefono') ?? "-" }}
                </td>
              </tr>
              <tr>
                <td>
                  Correo electrónico : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Correo_Electr_nico') }}
                </td>
              </tr>
              <tr>
                <td>
                  Ubicación :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_15_Ubicaci_n') }}
                </td>
              </tr>
              <tr>
                <td>
                  Forma De Llegar Al Predio :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_17_FORMA_DE_LLEGAR_AL_PREDIO') }}
                </td>
              </tr>
              <tr>
                <td>
                  DEPARTAMENTO NACIMIENTO :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/group_kq4ae36/DEPARTAMENTO_NACIMIENTO', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  MUNICIPIO NACIMIENTO :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/group_kq4ae36/MUNICIPIO_NACIMIENTO', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  El entrevistado conoce su fecha de nacimiento :
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/El_entrevistado_conoce_su_fech') }}
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Seleccione_la_fecha_de_nacimiento') }}
                </td>
              </tr>
              <tr>
                <td>
                  Jefe/a de hogar : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Jefe_a_de_hogar', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  Sexo : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/R_4Sexo', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  Orientación Sexual : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Orientaci_n_sexual', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  Identidad de Género : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Identidad_de_g_nero', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  Discapacidad : 
                  {{ $build_pdf->imprimir_texto_implode('group_wu4ss89/Discapacidad', false, " ", ",", true) }}
                </td>
              </tr>
              <tr>
                <td>
                  Pertenencia Étnica : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/Pertenencia_tnica', TRUE) }}
                </td>
              </tr>
              <tr>
                <td>
                  ¿ Cuenta con integrantes en el hogar ? : 
                  {{ $build_pdf->imprimir_texto('group_wu4ss89/_Cuenta_con_integrantes_en_el_', TRUE) }}
                </td>
              </tr>
            </tbody>            
        </table>
      </td>
    </tr>

    <!--IMAGENES/AJUSTAR-->
    {{-- <tr>
      <td>
        Fotografia de la Vivienda :
        <div class="image_container" style="border: width: 100%">
          {!! $build_pdf->showImgServer('group_wu4ss89/_16_Fotografia_de_la_Vivienda', false, 100, 250) !!}
        </div>
      </td>
    </tr>
    <tr>    
      <td>
        Georreferenciación :
        {{ $build_pdf->imprimir_texto('group_wu4ss89/Georreferenciaci_n') }}
        <div class="image_container">
          <img style="margin-top: 10px" class="image_map_georef" src="{{ $build_pdf->generar_imagen_geo() }}" height="300" width="300">
        </div>
      </td>
    </tr>
    <tr>
      <td>
        Fotografía del entrevistado o de su D.I :
         {!! $build_pdf->showImgServer('group_wu4ss89/_6_Fotograf_a_del_en_evistado_o_de_su_D_I') !!}
      </td>
    </tr> --}}
  </tbody>
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