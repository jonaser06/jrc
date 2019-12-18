var objJrc = {

    init: function(){
        objJrc.checked();
        objJrc.DatePicker();
        objJrc.Consulta();
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

    Consulta: function(){
        var consulta = objJrc.$_GET('consulta');
        
        if(consulta=='resumenequipos'){
            objJrc.ResumenEquipos();
        }
        if(consulta=='resumenindicadores'){
            objJrc.ResumenIndicadores();
        }
        if(consulta=='horasoperacion'){
            objJrc.HorasOperacion();
        }
        if(consulta=='disponibilidad'){
            objJrc.Disponibilidad();
        }
        if(consulta=='utilizacion'){
            objJrc.Utilizacion();
        }
        if(consulta=='mtbf'){
            objJrc.Mtbf();
        }
        if(consulta=='mttr'){
            objJrc.Mttr();
        }
        if(consulta=='reporte'){
            objJrc.Report();
        }
    },
    ResumenEquipos: function(){

    },
    ResumenIndicadores: function(){

    },
    HorasOperacion: function(){

    },
    Disponibilidad: function(){

    },
    Utilizacion: function(){

    },
    Mtbf: function(){

    },
    Mttr: function(){

    },
    Report: function(){
        $.ajax({
            type: 'GET',
            url: 'http://blackapp.xyz/reporteservice',
            dataType: 'json'
        }).done(function( data ){
            console.log(data);
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