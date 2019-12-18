var objJrc = {

    init: function(){
        objJrc.checked();
        objJrc.DatePicker();
        objJrc.ResumenEquipos();
    },

    checked: function(){
        $(".checked").click(function(){
            if($(this).hasClass('fa-square-o')){
                $(this).removeClass('fa-square-o');
                $(this).addClass('fa-check-square-o');
                $(this).parent().find('.psg').prop("checked", true);
                $(this).parent().find('.psg').val('1');
            }else{
                $(this).removeClass('fa-check-square-o');
                $(this).addClass('fa-square-o');
                $(this).parent().find('.psg').prop("checked", false);
                $(this).parent().find('.psg').val('0');
                }
        });
    },

    DatePicker:function(){
        $('#datepicker, #datepicker2, #datepicker3').datepicker({
            orientation: 'bottom right',
            autoclose: true,
            format: 'yyyy-mm-dd'
        }).datepicker("setDate", new Date());
    },

    ResumenEquipos: function(){
        var id = objJrc.$_GET('consulta');
        $.ajax({}).done(function( data ){
            console.log("Correcto");
        });
    },

    $_GET:function(param){
        var vars = {};
        window.location.href.replace(location.hash, '').replace(
            /[?&]+([^=&]+)=?([^&]*)?/gi,
            function( m, key, value ) { // callback
                vars[key] = value !== undefined ? value : '';
            }
        );
        if ( param ) {
            return vars[param] ? vars[param] : null;    
        }
        return vars;
    }
};

$(document).ready(function(){
    objJrc.init();
});