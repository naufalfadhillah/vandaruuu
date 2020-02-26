$(function(){  
    $(document).on('click', '.showModalButton', function(){
       if ($('#modal').data('bs.modal').isShown) {
            $('#modal').find('#modalContent')
                    .load($(this).attr('value'));
            
            $('#modal').removeAttr('tabindex');
        } else {
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'));
            $('#modal').removeAttr('tabindex');  
            
        }
    });
});