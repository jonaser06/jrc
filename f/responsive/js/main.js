var urlProd = 'http://blackapp.xyz/';
//var urlProd = 'http://localhost/jrc/';
//var urlDev = 'http://localhost/jrc/';

var objJrc = {

    init: function(){
        objJrc.checked();
        objJrc.DatePicker();
        objJrc.Consulta();
        objJrc.tools();
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
        $('#datepicker').datepicker({
            orientation: 'bottom right',
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        $(' #datepicker2, #datepicker3').datepicker({
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
        if(consulta=='mtbf'){
            objJrc.Mtbf();
        }
        if(consulta=='mttr'){
            objJrc.Mttr();
        }
        if(consulta=='reporte'){
            objJrc.Report();
        }
        if(consulta=='scoops'){
            objJrc.ReportScoops();
        }
    },
    ResumenEquipos: function(){
        $.ajax({
            type: 'GET',
            url: urlProd+'reporteservice',
            dataType: 'json'
        }).done(function(data){
            //totales
            var AcumHrs = 0.0, AcumInsp = 0.0, AcumPrev = 0.0, AcumProg = 0.0, AcumCorr = 0.0, AcumRepA = 0.0, AcumDM = 0.0, AcumMTBF = 0.0, AcumMTTR = 0.0;
            //print pagination
            var pag = "";
                pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' data-previus='"+data.previus_page+"' >«</a></li>": '';
            
            for(var i = 1; i <= data.pagination; i++ ){
                var active = (data.current_page == i) ? 'activepage' : '';
                pag += "<li><a href='#' class='go_page "+active+"' data-page='"+i+"'>"+i+"</a></li>";
            }
                pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-next='"+data.next_page+"'>»</a></li>": '';
            
            $('.pagination_resumen').append(pag);
            data.data.forEach(function( element, index ){
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                
                Ao = (isNaN(Ao))?'-':Ao.toString()+'%';

                var content = '';
                    content += '<tr>';
                    content += '<td>'+element.id_reporte+'</td>';
                    content += '<td>'+element.equipo_trabajo+'</td>';
                    content += '<td></td>';
                    content += '<td>'+parseFloat(element.hora_acumulada).toFixed(1)+'</td>';
                    content += '<td>'+parseFloat(hora).toFixed(1)+'</td>';
                    content += '<td>'+parseFloat(element.hora).toFixed(1)+'</td>'; //sumarizar
                    content += '<td>'+element.inspecc+'</td>';
                    content += '<td>'+element.mantto_prev+'</td>';
                    content += '<td>'+element.homp+'</td>';
                    content += '<td>'+element.repcorrect+'</td>';
                    content += '<td>'+element.otrosacci+'</td>';
                    content += '<td>'+Ao+'</td>';
                    content += '<td>'+_mtbf.toFixed(1)+'</td>';
                    content += '<td>'+_mttr.toFixed(1)+'</td>';
                    content += '</tr>';
                $('#tbl_resumenequipos').append(content);

                AcumHrs += parseFloat(element.hora);
                AcumInsp += parseFloat(element.inspecc);
                AcumPrev += parseFloat(element.mantto_prev);
                AcumProg += parseFloat(element.homp);
                AcumCorr += parseFloat(element.repcorrect);
                AcumRepA += parseFloat(element.otrosacci);
                AcumDM += parseFloat(Ao);
                AcumMTBF += parseFloat(_mtbf);
                AcumMTTR += parseFloat(_mttr);
            });

            var content2 = '';
                content2 += '<tr>';
                content2 += '<td colspan="5">TOTAL SCOOPTRAMS</td>';
                content2 += '<td>'+AcumHrs.toFixed(1)+'</td>';
                content2 += '<td>'+AcumInsp.toFixed(1)+'</td>';
                content2 += '<td>'+AcumPrev.toFixed(1)+'</td>';
                content2 += '<td>'+AcumProg.toFixed(1)+'</td>';
                content2 += '<td>'+AcumCorr.toFixed(1)+'</td>';
                content2 += '<td>'+AcumRepA.toFixed(1)+'</td>';
                content2 += '<td>'+AcumDM.toFixed(1)+'</td>';
                content2 += '<td>'+AcumMTBF.toFixed(1)+'</td>';
                content2 += '<td>'+AcumMTTR.toFixed(1)+'</td>';
                content2 += '</tr>';
            $('#tbl_resumenequipos_foot').append(content2);

        });
        //buscar por fechas
        $(".consulta_resumen").on('click',function(){
            $('#tbl_resumenequipos').html('');
            $('#tbl_resumenequipos_foot').html('');
            $('.pagination_resumen').html('');
            $(this).val("Cargando...");
            var de = $('.de').val();
            var hasta = $('.hasta').val();
            $.ajax({
                type: 'GET',
                url: urlProd+'reporteservice?de='+de+'&hasta='+hasta,
                dataType: 'json'
            }).done(function(data){
                $(".consulta_resumen").val('Consultar');
                //totales
                var AcumHrs = 0.0, AcumInsp = 0.0, AcumPrev = 0.0, AcumProg = 0.0, AcumCorr = 0.0, AcumRepA = 0.0, AcumDM = 0.0, AcumMTBF = 0.0, AcumMTTR = 0.0;
                //print pagination
                var pag = "";
                    pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' data-previus='"+data.previus_page+"' >«</a></li>": '';
                
                for(var i = 1; i <= data.pagination; i++ ){
                    var active = (data.current_page == i) ? 'activepage' : '';
                    pag += "<li><a href='#' class='go_page "+active+"' data-page='"+i+"'>"+i+"</a></li>";
                }
                    pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-next='"+data.next_page+"'>»</a></li>": '';
                
                $('.pagination_resumen').append(pag);
                data.data.forEach(function( element, index ){
                    hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                    _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                    _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
    
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                    
                    Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
    
                    var content = '';
                        content += '<tr>';
                        content += '<td>'+element.id_reporte+'</td>';
                        content += '<td>'+element.equipo_trabajo+'</td>';
                        content += '<td></td>';
                        content += '<td>'+parseFloat(element.hora_acumulada).toFixed(1)+'</td>';
                        content += '<td>'+parseFloat(hora).toFixed(1)+'</td>';
                        content += '<td>'+parseFloat(element.hora).toFixed(1)+'</td>'; //sumarizar
                        content += '<td>'+element.inspecc+'</td>';
                        content += '<td>'+element.mantto_prev+'</td>';
                        content += '<td>'+element.homp+'</td>';
                        content += '<td>'+element.repcorrect+'</td>';
                        content += '<td>'+element.otrosacci+'</td>';
                        content += '<td>'+Ao+'</td>';
                        content += '<td>'+_mtbf.toFixed(1)+'</td>';
                        content += '<td>'+_mttr.toFixed(1)+'</td>';
                        content += '</tr>';
                    $('#tbl_resumenequipos').append(content);
    
                    AcumHrs += parseFloat(element.hora);
                    AcumInsp += parseFloat(element.inspecc);
                    AcumPrev += parseFloat(element.mantto_prev);
                    AcumProg += parseFloat(element.homp);
                    AcumCorr += parseFloat(element.repcorrect);
                    AcumRepA += parseFloat(element.otrosacci);
                    AcumDM += parseFloat(Ao);
                    AcumMTBF += parseFloat(_mtbf);
                    AcumMTTR += parseFloat(_mttr);
                });
    
                var content2 = '';
                    content2 += '<tr>';
                    content2 += '<td colspan="5">TOTAL SCOOPTRAMS</td>';
                    content2 += '<td>'+AcumHrs.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumInsp.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumPrev.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumProg.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumCorr.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumRepA.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumDM.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumMTBF.toFixed(1)+'</td>';
                    content2 += '<td>'+AcumMTTR.toFixed(1)+'</td>';
                    content2 += '</tr>';
                $('#tbl_resumenequipos_foot').append(content2);
    
            });
        });
    },
    ResumenIndicadores: function(){

    },
    HorasOperacion: function(){

    },
    Disponibilidad: function(){

    },
    Mtbf: function(){

    },
    Mttr: function(){

    },
    ReportScoops:function(){
        var equipo = $('.equipo').val();
        $.ajax({
            type: 'GET',
            url: urlProd+'reportescoops?equipo='+equipo+'&page=1',
            dataType: 'json'
        }).done(function( data ){
            
            //print pagination
            var pag = "";
                pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' data-previus='"+data.previus_page+"' >«</a></li>": '';
            
            for(var i = 1; i <= data.pagination; i++ ){
                var active = (data.current_page == i) ? 'activepage' : '';
                pag += "<li><a href='#' class='go_page "+active+"' data-page='"+i+"'>"+i+"</a></li>";
            }
                pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-next='"+data.next_page+"'>»</a></li>": '';
            
            $('.pagination').append(pag);
            //print table
            data.data.forEach(function( element, index ){
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                
                Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
                
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
            $('#tbl_scoops').html('');
            $('.pagination').html('');
            $(this).val("Cargando...");
            var equipo = $('.equipo').val();
            var de = $('.de').val();
            var hasta = $('.hasta').val();
            $.ajax({
                type: 'GET',
                url: urlProd+'reportescoops?equipo='+equipo+'&de='+de+'&hasta='+hasta+'&page=1',
                dataType: 'json'
            }).done(function( data ){
                $(".consulta_scoops").val("Consultar");
                //print pagination
                    var pag = "";
                    pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' data-de='"+de+"' data-hasta='"+hasta+"' data-previus='"+data.previus_page+"' >«</a></li>": '';
                
                for(var i = 1; i <= data.pagination; i++ ){
                    var active = (data.current_page == i) ? 'activepage' : '';
                    pag += "<li><a href='#' class='go_page "+active+"' data-de='"+de+"' data-hasta='"+hasta+"' data-page='"+i+"'>"+i+"</a></li>";
                }
                    pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-de='"+de+"' data-hasta='"+hasta+"' data-next='"+data.next_page+"'>»</a></li>": '';
                
                $('.pagination').append(pag);
                //print table
                data.data.forEach(function( element, index ){
                    hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                    _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                    _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                    Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                    
                    Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
            //print pagination
            var pag = "";
                pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' data-previus='"+data.previus_page+"' >«</a></li>": '';
            
            for(var i = 1; i <= data.pagination; i++ ){
                var active = (data.current_page == i) ? 'activepage' : '';
                pag += "<li><a href='#' class='go_page "+active+"' data-page='"+i+"'>"+i+"</a></li>";
            }
                pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-next='"+data.next_page+"'>»</a></li>": '';
            
            $('.pagination').append(pag);
            //print table
            data.data.forEach(function( element, index ){
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                
                Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
                
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
            $('.pagination').html('');
            $(this).val("Cargando...");
            var de = $('.de').val();
            var hasta = $('.hasta').val();
            $.ajax({
                type: 'GET',
                url: urlProd+'reporteservice?de='+de+'&hasta='+hasta,
                dataType: 'json'
            }).done(function( data ){
                //print pagination
                    var pag = "";
                    pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' data-previus='"+data.previus_page+"' >«</a></li>": '';
                
                for(var i = 1; i <= data.pagination; i++ ){
                    var active = (data.current_page == i) ? 'activepage' : '';
                    pag += "<li><a href='#' class='go_page "+active+"' data-page='"+i+"'>"+i+"</a></li>";
                }
                    pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-next='"+data.next_page+"'>»</a></li>": '';
                
                $('.pagination').append(pag);
                //print table
                $(".consulta").val("Consultar");
                data.data.forEach(function( element, index ){
                    hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                    _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                    _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);

                    Ao = ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                    
                    Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
        if(fallas==0){
            return 0;
        }else{
            return parseFloat(hora) / parseFloat(fallas);
        }
    },
    calcmttr:function(homp, parada, fallas){
        if(fallas==0){
            return 0;
        }else{
            return ( parseFloat(homp) + parseFloat(parada) )/ parseFloat(fallas);
        }
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
    },
    tools:function(){
        $("body").on('click',".previus_page",function(e){
            e.preventDefault();
            //identificando pagina para la consulta
            var consulta = objJrc.$_GET('consulta');
            var endpoint;
            if(consulta=='scoops'){
                endpoint = 'reportescoops';
            }
            if(consulta=='reporte'){
                endpoint = 'reporteservice';
            }
            if(consulta=='resumenequipos'){
                endpoint = 'reporteservice';
            }
            //obteniendo datos
            var page = $(this).data("previus");
            var de = $(".de").val();
            var hasta = $(".hasta").val();
            var fecha = (de === undefined && hasta === undefined)?'':('de='+de+'&hasta='+hasta);
            var param = 'data-de='+de+' data-hasta='+hasta;
            var equipo = $('.equipo').val();
                equipo = (equipo===undefined)?'':('equipo='+equipo+'&');
            $('#tbl').html('');
            $('#tbl_scoops').html('');
            $('#tbl_resumenequipos').html('');
            $('#tbl_resumenequipos_foot').html('');
            $.ajax({
                type: 'GET',
                url: urlProd+endpoint+'?'+equipo+fecha+'&page='+page,
                dataType: 'json'
            }).done(function( data ){
                //totales
                var AcumHrs = 0.0, AcumInsp = 0.0, AcumPrev = 0.0, AcumProg = 0.0, AcumCorr = 0.0, AcumRepA = 0.0, AcumDM = 0.0, AcumMTBF = 0.0, AcumMTTR = 0.0;
                //print pagination
                var pag = "";
                    pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' "+param+" data-previus='"+data.previus_page+"' >«</a></li>": '';
                
                for(var i = 1; i <= data.pagination; i++ ){
                    var active = (data.current_page == i) ? 'activepage' : '';
                    pag += "<li><a href='#' class='go_page "+active+"' "+param+" data-page='"+i+"'>"+i+"</a></li>";
                }
                    pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' "+param+" data-next='"+data.next_page+"'>»</a></li>": '';
            
                $('.pagination').html(pag);
                //print table
                if(consulta=='scoops'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
                }
                if(consulta=='reporte'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
                        
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
                }
                if(consulta=='resumenequipos'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
        
                        var content = '';
                            content += '<tr>';
                            content += '<td>'+element.id_reporte+'</td>';
                            content += '<td>'+element.equipo_trabajo+'</td>';
                            content += '<td></td>';
                            content += '<td>'+parseFloat(element.hora_acumulada).toFixed(1)+'</td>';
                            content += '<td>'+parseFloat(hora).toFixed(1)+'</td>';
                            content += '<td>'+parseFloat(element.hora).toFixed(1)+'</td>'; //sumarizar
                            content += '<td>'+element.inspecc+'</td>';
                            content += '<td>'+element.mantto_prev+'</td>';
                            content += '<td>'+element.homp+'</td>';
                            content += '<td>'+element.repcorrect+'</td>';
                            content += '<td>'+element.otrosacci+'</td>';
                            content += '<td>'+Ao+'</td>';
                            content += '<td>'+_mtbf.toFixed(1)+'</td>';
                            content += '<td>'+_mttr.toFixed(1)+'</td>';
                            content += '</tr>';
                        $('#tbl_resumenequipos').append(content);
        
                        AcumHrs += parseFloat(element.hora);
                        AcumInsp += parseFloat(element.inspecc);
                        AcumPrev += parseFloat(element.mantto_prev);
                        AcumProg += parseFloat(element.homp);
                        AcumCorr += parseFloat(element.repcorrect);
                        AcumRepA += parseFloat(element.otrosacci);
                        AcumDM += parseFloat(Ao);
                        AcumMTBF += parseFloat(_mtbf);
                        AcumMTTR += parseFloat(_mttr);
                    });
        
                    var content2 = '';
                        content2 += '<tr>';
                        content2 += '<td colspan="5">TOTAL SCOOPTRAMS</td>';
                        content2 += '<td>'+AcumHrs.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumInsp.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumPrev.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumProg.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumCorr.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumRepA.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumDM.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumMTBF.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumMTTR.toFixed(1)+'</td>';
                        content2 += '</tr>';
                    $('#tbl_resumenequipos_foot').append(content2);
                }
            });
        });
        $("body").on('click',".next_page",function(e){
            e.preventDefault();
            //identificando pagina para la consulta
            var consulta = objJrc.$_GET('consulta');
            var endpoint;
            if(consulta=='scoops'){
                endpoint = 'reportescoops';
            }
            if(consulta=='reporte'){
                endpoint = 'reporteservice';
            }
            if(consulta=='resumenequipos'){
                endpoint = 'reporteservice';
            }
            //obteniendo datos
            var page = $(this).data("next");
            var de = $(".de").val();
            var hasta = $(".hasta").val();
            var fecha = (de === undefined && hasta === undefined )?'':('de='+de+'&hasta='+hasta);
            var param = 'data-de='+de+' data-hasta='+hasta;
            var equipo = $('.equipo').val();
                equipo = (equipo===undefined)?'':('equipo='+equipo+'&');
            $('#tbl').html('');
            $('#tbl_scoops').html('');
            $('#tbl_resumenequipos').html('');
            $('#tbl_resumenequipos_foot').html('');
            $.ajax({
                type: 'GET',
                url: urlProd+endpoint+'?'+equipo+fecha+'&page='+page, 
                dataType: 'json'
            }).done(function( data ){
                //totales
                var AcumHrs = 0.0, AcumInsp = 0.0, AcumPrev = 0.0, AcumProg = 0.0, AcumCorr = 0.0, AcumRepA = 0.0, AcumDM = 0.0, AcumMTBF = 0.0, AcumMTTR = 0.0;
                //print pagination
                var pag = "";
                    pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' "+param+" data-previus='"+data.previus_page+"' >«</a></li>": '';
            
                for(var i = 1; i <= data.pagination; i++ ){
                    var active = (data.current_page == i) ? 'activepage' : '';
                    pag += "<li><a href='#' class='go_page "+active+"' data-page='"+i+"'>"+i+"</a></li>";
                }
                    pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' data-next='"+data.next_page+"'>»</a></li>": '';
            
                $('.pagination').html(pag);
                //print table
                consulta = objJrc.$_GET('consulta');
                if(consulta=='scoops'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
                }
                if(consulta=='reporte'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
    
                        Ao = ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
                }
                if(consulta=='resumenequipos'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
        
                        var content = '';
                            content += '<tr>';
                            content += '<td>'+element.id_reporte+'</td>';
                            content += '<td>'+element.equipo_trabajo+'</td>';
                            content += '<td></td>';
                            content += '<td>'+parseFloat(element.hora_acumulada).toFixed(1)+'</td>';
                            content += '<td>'+parseFloat(hora).toFixed(1)+'</td>';
                            content += '<td>'+parseFloat(element.hora).toFixed(1)+'</td>'; //sumarizar
                            content += '<td>'+element.inspecc+'</td>';
                            content += '<td>'+element.mantto_prev+'</td>';
                            content += '<td>'+element.homp+'</td>';
                            content += '<td>'+element.repcorrect+'</td>';
                            content += '<td>'+element.otrosacci+'</td>';
                            content += '<td>'+Ao+'</td>';
                            content += '<td>'+_mtbf.toFixed(1)+'</td>';
                            content += '<td>'+_mttr.toFixed(1)+'</td>';
                            content += '</tr>';
                        $('#tbl_resumenequipos').append(content);
                        AcumHrs += parseFloat(element.hora);
                        AcumInsp += parseFloat(element.inspecc);
                        AcumPrev += parseFloat(element.mantto_prev);
                        AcumProg += parseFloat(element.homp);
                        AcumCorr += parseFloat(element.repcorrect);
                        AcumRepA += parseFloat(element.otrosacci);
                        AcumDM += parseFloat(Ao);
                        AcumMTBF += parseFloat(_mtbf);
                        AcumMTTR += parseFloat(_mttr);
                    });
        
                    var content2 = '';
                        content2 += '<tr>';
                        content2 += '<td colspan="5">TOTAL SCOOPTRAMS</td>';
                        content2 += '<td>'+AcumHrs.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumInsp.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumPrev.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumProg.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumCorr.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumRepA.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumDM.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumMTBF.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumMTTR.toFixed(1)+'</td>';
                        content2 += '</tr>';
                    $('#tbl_resumenequipos_foot').append(content2);
                }
            });

        });
        $("body").on('click',".go_page",function(e){
            e.preventDefault();
            //identificando pagina para la consulta
            var consulta = objJrc.$_GET('consulta');
            var endpoint;
            if(consulta=='scoops'){
                endpoint = 'reportescoops';
            }
            if(consulta=='reporte'){
                endpoint = 'reporteservice';
            }
            if(consulta=='resumenequipos'){
                endpoint = 'reporteservice';
            }
            //obteniendo datos
            var page = $(this).data("page");
            var de = $(".de").val();
            var hasta = $(".hasta").val();
            var fecha = (de === undefined && hasta === undefined)?'':('de='+de+'&hasta='+hasta);
            var param = 'data-de='+de+' data-hasta='+hasta;
            var equipo = $('.equipo').val();
                equipo = (equipo===undefined)?'':('equipo='+equipo+'&');
            $('#tbl').html('');
            $('#tbl_scoops').html('');
            $('#tbl_resumenequipos').html('');
            $('#tbl_resumenequipos_foot').html('');
            $.ajax({
                type: 'GET',
                url: urlProd+endpoint+'?'+equipo+fecha+'&page='+page,
                dataType: 'json'
            }).done(function( data ){
                //totales
                var AcumHrs = 0.0, AcumInsp = 0.0, AcumPrev = 0.0, AcumProg = 0.0, AcumCorr = 0.0, AcumRepA = 0.0, AcumDM = 0.0, AcumMTBF = 0.0, AcumMTTR = 0.0;
                //print pagination
                var pag = "";
                    pag += (data.previus_page!='false') ? "<li><a href='#' class='previus_page' "+param+" data-previus='"+data.previus_page+"' >«</a></li>": '';
                
                for(var i = 1; i <= data.pagination; i++ ){
                    var active = (data.current_page == i) ? 'activepage' : '';
                    pag += "<li><a href='#' class='go_page "+active+"' "+param+" data-page='"+i+"'>"+i+"</a></li>";
                }
                    pag += (data.next_page!='false') ? "<li><a href='#' class='next_page' "+param+" data-next='"+data.next_page+"'>»</a></li>": '';
            
                $('.pagination').html(pag);
                //print table
                consulta = objJrc.$_GET('consulta');
                if(consulta=='scoops'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
                }
                if(consulta=='reporte'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
    
                        Ao = ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
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
                }
                if(consulta=='resumenequipos'){
                    data.data.forEach(function( element, index ){
                        hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                        _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                        _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
        
                        Ao =  ((_mtbf/(_mtbf+_mttr))*100).toFixed(1);
                        
                        Ao = (isNaN(Ao))?'-':Ao.toString()+'%';
        
                        var content = '';
                            content += '<tr>';
                            content += '<td>'+element.id_reporte+'</td>';
                            content += '<td>'+element.equipo_trabajo+'</td>';
                            content += '<td></td>';
                            content += '<td>'+parseFloat(element.hora_acumulada).toFixed(1)+'</td>';
                            content += '<td>'+parseFloat(hora).toFixed(1)+'</td>';
                            content += '<td>'+parseFloat(element.hora).toFixed(1)+'</td>'; //sumarizar
                            content += '<td>'+element.inspecc+'</td>';
                            content += '<td>'+element.mantto_prev+'</td>';
                            content += '<td>'+element.homp+'</td>';
                            content += '<td>'+element.repcorrect+'</td>';
                            content += '<td>'+element.otrosacci+'</td>';
                            content += '<td>'+Ao+'</td>';
                            content += '<td>'+_mtbf.toFixed(1)+'</td>';
                            content += '<td>'+_mttr.toFixed(1)+'</td>';
                            content += '</tr>';
                        $('#tbl_resumenequipos').append(content);
        
                        AcumHrs += parseFloat(element.hora);
                        AcumInsp += parseFloat(element.inspecc);
                        AcumPrev += parseFloat(element.mantto_prev);
                        AcumProg += parseFloat(element.homp);
                        AcumCorr += parseFloat(element.repcorrect);
                        AcumRepA += parseFloat(element.otrosacci);
                        AcumDM += parseFloat(Ao);
                        AcumMTBF += parseFloat(_mtbf);
                        AcumMTTR += parseFloat(_mttr);
                    });
        
                    var content2 = '';
                        content2 += '<tr>';
                        content2 += '<td colspan="5">TOTAL SCOOPTRAMS</td>';
                        content2 += '<td>'+AcumHrs.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumInsp.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumPrev.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumProg.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumCorr.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumRepA.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumDM.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumMTBF.toFixed(1)+'</td>';
                        content2 += '<td>'+AcumMTTR.toFixed(1)+'</td>';
                        content2 += '</tr>';
                    $('#tbl_resumenequipos_foot').append(content2);
                }
            });
        });
    }
};

$(document).ready(function(){
    objJrc.init();
});