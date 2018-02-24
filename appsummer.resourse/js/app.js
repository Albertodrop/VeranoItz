
function eliminarVerano(id_summer){
    
    $.confirm({
    icon: 'fa fa-warning',  
    title: '¿Estas seguro(a) que deseas eliminar este verano?',
    content: 'Al eliminarlo se perdera su contenido y no podras recuperarlo.',
     type: 'red',
    typeAnimated: true,
     columnClass: 'col-md-6 col-md-offset-3',
    buttons: {

        Si: {
            btnClass: 'btn-red',
            action: function () {
            location.href = '../appsummer.controller/controllersummer.php?summer_id='+id_summer+'&btn-eliminar';
         
            }
        },
        Cancelar:{
            btnClass: 'btn-info',
            action: function () {
            
            }
        }
        
    }
});
}


function abandonarVerano(id_summer){
	
	$.confirm({
	icon: 'fa fa-warning',	
    title: '¿Estas seguro(a) que deseas salir de este verano?',
    content: '',
     type: 'red',
    typeAnimated: true,
     columnClass: 'col-md-6 col-md-offset-3',
    buttons: {

        Si: {
        	btnClass: 'btn-red',
        	action: function () {
            
          location.href = '../appsummer.controller/controllersummer.php?summer_id='+id_summer+'&btn-salir';
        	}
        },
        Cancelar:{
        	btnClass: 'btn-info',
        	action: function () {
            
        	}
        }
        
    }
});
}


function setCodeSearch(summer_id){
    $.confirm({
    title: 'Este es un verano privado',
    content: '' +
    '<form action="home.php" class="formName" method ="get">' +
    '<div class="form-group">' +
    '<label>Por favor introduce el codigo aquí</label>' +
    '<input type="text" placeholder="Codigo" class="code form-control" required name "summer_codesearch" maxlength="6" />' +
    '</div>' +
    '</form>',
    buttons: {
        formSubmit: {
            text: 'Aceptar',
            btnClass: 'btn-blue',
            action: function () {
                var code = this.$content.find('.code').val();
                if(!code){
                    $.alert('Codigo no valido');
                    return false;
                }
                
                location.href = '../appsummer.controller/controllersummer.php?summer_id='+summer_id+'&summer_codesearch='+code;
            }
        },
        Cancelar: function () {
            //close
        }
    
},
    
    // },
    // onContentReady: function () {
    //     // bind to events
    //     var jc = this;
    //     this.$content.find('form').on('submit', function (e) {
    //         // if the user submits the form by pressing enter in the field.
    //         e.preventDefault();
    //         jc.$$formSubmit.trigger('click'); // reference the button and click it
    //     });
    // }
});
}
