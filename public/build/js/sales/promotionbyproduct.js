$(document).ready(function() {
    

    $("#fecha_inicio").datepicker({
            format: "yyyy-mm-dd",
            startDate: "today", 
            language: "es",
            autoclose: true,
            todayHighlight: true
         });    
    $('#fecha_inicio').datepicker('setDate',"");    

    $("#fecha_fin").datepicker({
        format: "yyyy-mm-dd",
        startDate: "today", 
        language: "es",
        autoclose: true,
        todayHighlight: true
     });    
    $('#fecha_fin').datepicker('setDate',"");    

    var inputStartDate = $('#fecha_inicio').children(".input-date");
    inputStartDate.change(function() {        
        var valueInputStart = $(this).val();
        $('#fecha_fin').datepicker('setStartDate', valueInputStart);
        $('#fecha_fin').datepicker('setDate', valueInputStart);
    });

    var activeSystemClass = $('.list-group-item.active');

    //something is entered in search form
    $('#promotionbyproduct-search').keyup( function() {
       var that = this;
        // affect all table rows on in systems table
        var tableBody = $('.table-list-search tbody');
        var tableRowsClass = $('.table-list-search tbody tr');
        $('.search-sf').remove();
        tableRowsClass.each( function(i, val) {
        
            //Lower text for case insensitive
            var rowText = $(val).text().toLowerCase();
            var inputText = $(that).val().toLowerCase();
            if(inputText != '')
            {
                $('.search-query-sf').remove();
                tableBody.prepend('<tr class="search-query-sf"><td colspan="6"><strong>Buscando: "'
                    + $(that).val()
                    + '"</strong></td></tr>');
            }
            else
            {
                $('.search-query-sf').remove();
            }

            if( rowText.indexOf( inputText ) == -1 )
            {
                //hide rows
                tableRowsClass.eq(i).hide();
                
            }
            else
            {
                $('.search-sf').remove();
                tableRowsClass.eq(i).show();
            }
        });
        //all tr elements are hidden
        if(tableRowsClass.children(':visible').length == 0)
        {
            tableBody.append('<tr class="search-sf"><td class="text-muted" colspan="6">No se encontraron resultados.</td></tr>');
        }
    });
});