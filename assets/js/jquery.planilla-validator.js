jQuery.fn.validate = function ()
{
    /* Mensajes por defecto */
    var _mensaje = {
        campo_obligatorio: 'Este campo es obligatorio',
        campo_min: 'Este campo debe tener como mínimo {0} caracteres'
    };

    var form = $(this);

    try {
        /* Cuenta los posibles errores encontrados */
        var errores = 0;

        /* Los controles encontrados por nuestra Clase de CSS */
        var controles = $('[data-validacion-tipo]', form);

        /* Comenzamos a validar cada control */
        $.each(controles, function () {

            /* El control actual del arreglo */
            var obj = $(this);

            /* No nos interesa validar controles con el estado readonly/disabled */
            if (!obj.prop('readonly') || !obj.prop('disabled'))
            {
                if ($(this).data('validacion-tipo') != undefined) {
                    /* El tipo de validacion asignado a este control */
                    $.each($(this).data('validacion-tipo').split('|'), function (i, v) {

                        /* El control donde vamos agregar el texto */
                        var small = $('<small />');

                        /* El contenedor del control */
                        var form_group = obj.closest('.form-group');
                        form_group.removeClass('has-error'); /* Limpiamos el estado de error */

                        /* Capturamos el label donde queremos mostrar el mensaje */
                        var label = form_group.find('label');
                        label.find('small').remove(); /* Eliminamos el mensaje anterior */
                        label.append(small);

                        /* Validamos si es requerido */
                        if (v == 'requerido') {
                            if (obj.val().length == 0) {

                                /* Contamos que hay un error */
                                errores++;

                                /* Agregamos la clase de bootstrap de errores */
                                form_group.addClass('has-error');

                                /* Mostramos el mensaje */
                                if (obj.data('validacion-mensaje') == undefined) {
                                    small.text(_mensaje.campo_obligatorio);
                                } else {
                                    small.text(obj.data('validacion-mensaje'));
                                }

                                return false; /* Rompe el bucle */
                            }
                        }

                        /* Cantidad minima de caracteres */
                        if (v.indexOf('min') > -1 && obj.val().length > 0) {

                            // Necesitamos saber la longitud máxima
                            var _min = v.split(':');
                            if (obj.val().length < _min[1]) {

                                errores++;
                                form_group.addClass('has-error');

                                /* Mostramos el mensaje */
                                if (obj.data('validacion-mensaje') == undefined) {
                                    small.text(_mensaje.campo_min.replace('{0}', _min[1]));
                                } else {
                                    small.text(obj.data('validacion-mensaje'));
                                }

                                return false; /* Rompe el bucle */
                            }
                        }

                    })
                }                
            }
        })

        /* Verificamos si ha sido validado */
        return (errores == 0);
    } catch (e) {
        console.error(e);
        return false;
    }
}