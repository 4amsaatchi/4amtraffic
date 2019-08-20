<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<input type="button"  id="btnExportar"   value="Exportar a Excel"  class="btn btn-info">
<div id="divData">
<table class="table" id="order_table">
<thead class="text-primary">
<tr>  
<th class="click-order">Agencia</th>
<th class="click-order">Cliente</th>  
<th class="click-order">Responsable</th>  
<th class="click-order">Código de orden</th>  
<th class="click-order">Fecha</th>  
<th class="click-order">Horas</th>
</tr>  
</thead>
</table>
</div>

<script>
  $("#btnExportar").click(function (e) {
    $(this).attr({
        'download': "MiExcel.xls",
            'href': 'data:application/csv;charset=utf-8,' + encodeURIComponent( $('#divData').html())
    })
});
</script>