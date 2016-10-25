$(document).ready(function($) {
	var n=1;
    
    
    //$('.date').datepicker();
    

    $("#add").click(function() {
        var x = $("#add").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }
        if(n==25){return;}
        n++;           
        $("#promotion").append('' +  
            ' <div class="row promoLine"> ' +                                                           
                ' <div class="col-lg-3"> ' +
                    ' <div class="form-group"> ' +
                        ' <label>Categoría de producto</label> ' +
                        ' <select class="form-control"> ' +                                           
                            ' <option value="0">Seleccione</option> ' +                                            
                        ' </select> ' +
                    ' </div> ' +
                ' </div>' +                                   
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +
                        ' <label> Producto </label>' +
                        ' <select class="form-control">' +                                           
                            ' <option value="0"> Seleccione </option>' +                                                                                        
                        ' </select>' +
                    ' </div>' +
                ' </div>' +                                                               
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +
                        ' <label> Cantidad de descuento </label>' +
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> u </span>' +
                            ' <input class="form-control" name="discountAmount" placeholder="Cantidad de descuento" maxlength="3">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +
                        ' <label> Porcentaje de descuento </label>' +
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> % </span>' +
                            ' <input type="text" class="form-control" name="discount" placeholder="Porcentaje de descuento">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +                                
            ' </div>' 
        );

    });
    $("#remove").click(function() {
        var x = $("#remove").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }
        if(n==1){return}
            $(".promoLine:last-child").remove();
        n--;
    });
});