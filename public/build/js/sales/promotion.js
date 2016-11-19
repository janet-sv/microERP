$(document).ready(function($) {
	var n=3;
    
    
    //$('.date').datepicker();
    

    $("#add").click(function() {
        var x = $("#add").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }        
        if(n==25){return;}        
        $("#promotion").append('' +  
            ' <div class="row promoLine"> ' +                                                           
                ' <div class="col-lg-3"> ' +
                    ' <div class="form-group"> ' +                        
                        ' <select class="form-control" name="categoryproduct' + n + '"> ' +                                           
                            ' <option value="0">Seleccione</option> ' +                                            
                        ' </select> ' +
                    ' </div> ' +
                ' </div>' +                                   
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <select class="form-control" name="product' + n + '"> ' +                                           
                            ' <option value="0"> Seleccione </option>' +                                                                                        
                        ' </select>' +
                    ' </div>' +
                ' </div>' +                                                               
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> u </span>' +
                            ' <input class="form-control" name="cantidad_descuento' + n + '" placeholder="Cantidad de descuento" maxlength="3">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> % </span>' +
                            ' <input type="text" class="form-control" name="cantidad_descuento' + n +'" placeholder="Porcentaje de descuento">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +                                
            ' </div>' 
        );
        n++;           
    });
    $("#remove").click(function() {
        var x = $("#remove").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }
        if(n==1){return}
            $(".promoLine:last-child").remove();
        n--;
    });
});