<template>
  <div class="vue-template">
    <h3>Reporte Validado</h3>
    <p class="justify">En este reporte se puede observar la validaci&oacute;n de los campos 'empleado.area' y 'area.id' a nivel de consulta SQL para poder mostrar el nombre del &aacute;rea, en lugar de su id. <br>
    Adem&aacute;s, existe en la tabla un registro con un n&uacute;mero de DPI "no v&aacute;lido" ya que est&aacute; separado por guiones y, para efecto de este reporte, no deber&iacute;a de estarlo. Por ello, dicho registro se excluye del reporte ya que no cumple con los requisitos.</p>
    <table id="Table" ref="table" class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre Completo</th>
          <th>Fecha de Ingreso</th>
          <th>DPI</th>
          <th>&Aacute;rea</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="empleado in empleados" :key="empleado.id">
          <td>{{ empleado.ID }}</td>
          <td>{{ empleado.NOMBRE }}</td>
          <td>{{ empleado.FECHA_INGRESO }}</td>
          <td>{{ empleado.DPI }}</td>
          <td>{{ empleado.AREA }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
var url = "http://localhost/vuevalidation/db/backend.php";
import axios from "axios";
export default {
  data() {
    return {
      empleados: [],
      empleado: {
        id: null,
        nombre: null,
        fechaIn: null,
        dpi: null,
        area: null
      },
    };
  },
  created() {
    this.mostrarDatos();
  },
  methods: {
    mostrarDatos: function () {
      axios.post(url, { opcion: 1 }).then((response) => {
        this.empleados = response.data;
        console.log(response.data);
      });
    }
  },
};
</script>