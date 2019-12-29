var urlProd = 'http://blackapp.xyz/';
//var urlProd = 'http://localhost/jrc/';
//var urlDev = 'http://localhost/jrc/';

var objJrc = {

    init: function(){
        objJrc.checked();
        objJrc.DatePicker();
        objJrc.Consulta();
        objJrc.ReportScoops();
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
    ReportScoops:function(){
        var equipo = $('.equipo').val();
        var de = $('.de').val();
        var hasta = $('.hasta').val();
        $.ajax({
            type: 'GET',
            url: urlProd+'reportescoops?equipo='+equipo,
            dataType: 'json'
        }).done(function( data ){
            console.log(data);
            data.data.forEach(function( element, index ){
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                
                if(isNaN(Ao)){
                    Ao = '-';
                }else{
                    Ao = Ao.toString()+'%';
                }
                var content = "";
                    content += '<tr>';
                    content += '<td>'+element.inicio_jornada+'</td>';
                    content += '<td>'+element.hora_acumulada+'</td>';
                    content += '<td>'+hora+'</td>';
                    content += '<td>'+element.hora+'</td>';
                    content += '<td>'+hora+'</td>';
                    content += '<td>'+element.inspecc+'</td>';
                    content += '<td>'+element.mantto_prev+'</td>';
                    content += '<td>'+element.homp+'</td>';
                    content += '<td>'+element.tiempo_parada+'</td>';
                    content += '<td>'+element.horas_calend+'</td>';
                    content += '<td>'+element.horas_prog+'</td>';
                    content += '<td>'+Ao+'</td>';
                    content += '<td>'+element.fallas_equipo+'</td>';
                    content += '<td>'+element.descripcion+'</td>';
                    content += '/<tr>';
                $('#tbl_scoops').append(content);
            });
        });
        //busca por fechas
        $(".consulta_scoops").on('click',function(){
            var equipo = $('.equipo').val();
            var de = $('.de').val();
            var hasta = $('.hasta').val();
            console.log("de: "+de+" equipo:"+equipo);
            $.ajax({
                type: 'GET',
                url: urlProd+'reportescoops?equipo='+equipo+'&de='+de+'&hasta='+hasta,
                dataType: 'json'
            }).done(function( data ){
                console.log(data);
                data.data.forEach(function( element, index ){
                    hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                    _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                    _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                    Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                    
                    if(isNaN(Ao)){
                        Ao = '-';
                    }else{
                        Ao = Ao.toString()+'%';
                    }
                    var content = "";
                        content += '<tr>';
                        content += '<td>'+element.inicio_jornada+'</td>';
                        content += '<td>'+element.hora_acumulada+'</td>';
                        content += '<td>'+hora+'</td>';
                        content += '<td>'+element.hora+'</td>';
                        content += '<td>'+hora+'</td>';
                        content += '<td>'+element.inspecc+'</td>';
                        content += '<td>'+element.mantto_prev+'</td>';
                        content += '<td>'+element.homp+'</td>';
                        content += '<td>'+element.tiempo_parada+'</td>';
                        content += '<td>'+element.horas_calend+'</td>';
                        content += '<td>'+element.horas_prog+'</td>';
                        content += '<td>'+Ao+'</td>';
                        content += '<td>'+element.fallas_equipo+'</td>';
                        content += '<td>'+element.descripcion+'</td>';
                        content += '/<tr>';
                    $('#tbl_scoops').append(content);
                });
            });
        });
        
    },
    Report: function(){
        var hora, _mtbf, _mttr, Ao;
        $.ajax({
            type: 'GET',
            url: urlProd+'reporteservice',
            dataType: 'json'
        }).done(function( data ){
            console.log(data);
            data.data.forEach(function( element, index ){
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                
                if(isNaN(Ao)){
                    Ao = '-';
                }else{
                    Ao = Ao.toString()+'%';
                }
                
                var content = "";
                    content += '<tr>';
                    content += '<td>'+ element.id_reporte +'</td>';
                    content += '<td>'+ element.equipo_trabajo +'</td>';
                    content += '<td>Caterpillar</td>';
                    content += '<td>R-1600G</td>';
                    content += '<td>Motor Diesel</td>';
                    content += '<td>'+ hora +'</td>';
                    content += '<td>'+ element.tiempo_parada +'</td>';
                    content += '<td>'+Ao+'</td>';
                    content += '<td>'+ element.descripcion +'</td>';
                    content += '<td>Operativo</td>';
                    content += '</tr> ';

                $('#tbl').append(content);
            });
        });

        //si se busca por fechas
        $(".consulta").on('click',function(){
            $('#tbl').html('');
            $(this).val("Cargando...");
            var de = $('.de').val();
            var hasta = $('.hasta').val();
            $.ajax({
                type: 'GET',
                url: urlProd+'reporteservice?de='+de+'&hasta='+hasta,
                dataType: 'json'
            }).done(function( data ){
                console.log(data);
                $(".consulta").val("Consultar");
                data.data.forEach(function( element, index ){
                    hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                    _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                    _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                    Ao = ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                    
                    if(isNaN(Ao)){
                        Ao = '-';
                    }else{
                        Ao = Ao.toString()+'%';
                    }
                    var content = "";
                        content += '<tr>';
                        content += '<td>'+ element.id_reporte +'</td>';
                        content += '<td>'+ element.equipo_trabajo +'</td>';
                        content += '<td>Caterpillar</td>';
                        content += '<td>R-1600G</td>';
                        content += '<td>Motor Diesel</td>';
                        content += '<td>'+ hora +'</td>';
                        content += '<td>'+ element.tiempo_parada +'</td>';
                        content += '<td>'+Ao+'%</td>';
                        content += '<td>'+ element.descripcion +'</td>';
                        content += '<td>Operativo</td>';
                        content += '</tr> ';

                    $('#tbl').append(content);
                });
            });
        });

    },
    calcmtbf:function(hora, fallas){
        return parseFloat(hora) / parseFloat(fallas);
    },
    calcmttr:function(homp, parada, fallas){
        return ( parseFloat(homp) + parseFloat(parada) )/ parseFloat(fallas);
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