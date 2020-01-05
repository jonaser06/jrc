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
        var fecha = new Date();
        var finfecha = new Date();
        $('#datepicker').datepicker({
            orientation: 'bottom right',
            autoclose: true,
            format: 'yyyy-mm-dd'/* ,
            startDate: fecha,
            endDate: finfecha */
        });
        $(' #datepicker2, #datepicker3').datepicker({
            orientation: 'bottom right',
            autoclose: true,
            format: 'yyyy-mm-dd'/* ,
            startDate: fecha, */
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
        var month  = $("#month").val();
        var years  = $("#years").val();
        $.ajax({
            type: 'GET',
            url: urlProd+'resumenindicadores?month='+month+'&years='+years,
            dataType: 'json'
        }).done(function(data){
            objJrc.formachine(data);
        });
        $(".consulta_indicador").on('click',function(){
            var month  = $("#month").val();
            var years  = $("#years").val();
            $('#tbl_resumenindicadores').html('');
            $('#tbl_resumenindicadores_foot').html('');
            $.ajax({
                type: 'GET',
                url: urlProd+'resumenindicadores?month='+month+'&years='+years,
                dataType: 'json'
            }).done(function(data){
                objJrc.formachine(data);
            });
        });

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
    },
    formachine: function(m){
        var m_2SC019=0, m_2SC022=0, m_2SC026=0, m_2SC029=0, m_2SC035=0, m_2SC037=0, m_2JL003=0, m_2JL015=0, m_2JL016=0;
        var a_2SC019=0, a_2SC022=0, a_2SC026=0, a_2SC029=0, a_2SC035=0, a_2SC037=0, a_2JL003=0, a_2JL015=0, a_2JL016=0;

        var i_2SC019=0, i_2SC022=0, i_2SC026=0, i_2SC029=0, i_2SC035=0, i_2SC037=0, i_2JL003=0, i_2JL015=0, i_2JL016=0;
        var pv_2SC019=0, pv_2SC022=0, pv_2SC026=0, pv_2SC029=0, pv_2SC035=0, pv_2SC037=0, pv_2JL003=0, pv_2JL015=0, pv_2JL016=0;
        var pg_2SC019=0, pg_2SC022=0, pg_2SC026=0, pg_2SC029=0, pg_2SC035=0, pg_2SC037=0, pg_2JL003=0, pg_2JL015=0, pg_2JL016=0;
        var cr_2SC019=0, cr_2SC022=0, cr_2SC026=0, cr_2SC029=0, cr_2SC035=0, cr_2SC037=0, cr_2JL003=0, cr_2JL015=0, cr_2JL016=0;
        var ra_2SC019=0, ra_2SC022=0, ra_2SC026=0, ra_2SC029=0, ra_2SC035=0, ra_2SC037=0, ra_2JL003=0, ra_2JL015=0, ra_2JL016=0;
        var dm_2SC019=0, dm_2SC022=0, dm_2SC026=0, dm_2SC029=0, dm_2SC035=0, dm_2SC037=0, dm_2JL003=0, dm_2JL015=0, dm_2JL016=0;
        var mtbf_2SC019=0.0, mtbf_2SC022=0.0, mtbf_2SC026=0.0, mtbf_2SC029=0.0, mtbf_2SC035=0.0, mtbf_2SC037=0.0, mtbf_2JL003=0.0, mtbf_2JL015=0.0, mtbf_2JL016=0.0;
        var mttr_2SC019=0.0, mttr_2SC022=0.0, mttr_2SC026=0.0, mttr_2SC029=0.0, mttr_2SC035=0.0, mttr_2SC037=0.0, mttr_2JL003=0.0, mttr_2JL015=0.0, mttr_2JL016=0.0;
        //suma en el mes
        m.data.forEach(function( element, index ){
            if(element.equipo_trabajo=='2SC019'){
                m_2SC019 = m_2SC019 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2SC019 = i_2SC019 + parseInt(element.inspecc);
                pv_2SC019 = pv_2SC019 + parseInt(element.mantto_prev);
                pg_2SC019 = pg_2SC019 + parseInt(element.homp);
                cr_2SC019 = cr_2SC019 + parseInt(element.repcorrect);
                ra_2SC019 = ra_2SC019 + parseInt(element.otrosacci);
                dm_2SC019 = dm_2SC019 + Ao;
                mtbf_2SC019 = mtbf_2SC019 + _mtbf;
                mttr_2SC019 = mttr_2SC019 + _mttr;
            }
            if(element.equipo_trabajo=='2SC022'){
                m_2SC022 = m_2SC022 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2SC022 = i_2SC022 + parseInt(element.inspecc);
                pv_2SC022 = pv_2SC022 + parseInt(element.mantto_prev);
                pg_2SC022 = pg_2SC022 + parseInt(element.homp);
                cr_2SC022 = cr_2SC022 + parseInt(element.repcorrect);
                ra_2SC022 = ra_2SC022 + parseInt(element.otrosacci);
                dm_2SC022 = dm_2SC022 + Ao;
                mtbf_2SC022 = mtbf_2SC022 + _mtbf;
                mttr_2SC022 = mttr_2SC022 + _mttr;
            }
            if(element.equipo_trabajo=='2SC026'){
                m_2SC026 = m_2SC026 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2SC026 = i_2SC026 + parseInt(element.inspecc);
                pv_2SC026 = pv_2SC026 + parseInt(element.mantto_prev);
                pg_2SC026 = pg_2SC026 + parseInt(element.homp);
                cr_2SC026 = cr_2SC026 + parseInt(element.repcorrect);
                ra_2SC026 = ra_2SC026 + parseInt(element.otrosacci);
                dm_2SC026 = dm_2SC026 + Ao;
                mtbf_2SC026 = mtbf_2SC026 + _mtbf;
                mttr_2SC026 = mttr_2SC026 + _mttr;
            }
            if(element.equipo_trabajo=='2SC029'){
                m_2SC029 = m_2SC029 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2SC029 = i_2SC029 + parseInt(element.inspecc);
                pv_2SC029 = pv_2SC029 + parseInt(element.mantto_prev);
                pg_2SC029 = pg_2SC029 + parseInt(element.homp);
                cr_2SC029 = cr_2SC029 + parseInt(element.repcorrect);
                ra_2SC029 = ra_2SC029 + parseInt(element.otrosacci);
                dm_2SC029 = dm_2SC029 + Ao;
                mtbf_2SC029 = mtbf_2SC029 + _mtbf;
                mttr_2SC029 = mttr_2SC029 + _mttr;
            }
            if(element.equipo_trabajo=='2SC035'){
                m_2SC035 = m_2SC035 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2SC035 = i_2SC035 + parseInt(element.inspecc);
                pv_2SC035 = pv_2SC035 + parseInt(element.mantto_prev);
                pg_2SC035 = pg_2SC035 + parseInt(element.homp);
                cr_2SC035 = cr_2SC035 + parseInt(element.repcorrect);
                ra_2SC035 = ra_2SC035 + parseInt(element.otrosacci);
                dm_2SC035 = dm_2SC035 + Ao;
                mtbf_2SC035 = mtbf_2SC035 + _mtbf;
                mttr_2SC035 = mttr_2SC035 + _mttr;
            }
            if(element.equipo_trabajo=='2SC037'){
                m_2SC037 = m_2SC037 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2SC037 = i_2SC037 + parseInt(element.inspecc);
                pv_2SC037 = pv_2SC037 + parseInt(element.mantto_prev);
                pg_2SC037 = pg_2SC037 + parseInt(element.homp);
                cr_2SC037 = cr_2SC037 + parseInt(element.repcorrect);
                ra_2SC037 = ra_2SC037 + parseInt(element.otrosacci);
                dm_2SC037 = dm_2SC037 + Ao;
                mtbf_2SC037 = mtbf_2SC037 + _mtbf;
                mttr_2SC037 = mttr_2SC037 + _mttr;
            }
            if(element.equipo_trabajo=='2JL003'){
                m_2JL003 = m_2JL003 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2JL003 = i_2JL003 + parseInt(element.inspecc);
                pv_2JL003 = pv_2JL003 + parseInt(element.mantto_prev);
                pg_2JL003 = pg_2JL003 + parseInt(element.homp);
                cr_2JL003 = cr_2JL003 + parseInt(element.repcorrect);
                ra_2JL003 = ra_2JL003 + parseInt(element.otrosacci);
                dm_2JL003 = dm_2JL003 + Ao;
                mtbf_2JL003 = mtbf_2JL003 + _mtbf;
                mttr_2JL003 = mttr_2JL003 + _mttr;
            }
            if(element.equipo_trabajo=='2JL015'){
                m_2JL015 = m_2JL015 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2JL015 = i_2JL015 + parseInt(element.inspecc);
                pv_2JL015 = pv_2JL015 + parseInt(element.mantto_prev);
                pg_2JL015 = pg_2JL015 + parseInt(element.homp);
                cr_2JL015 = cr_2JL015 + parseInt(element.repcorrect);
                ra_2JL015 = ra_2JL015 + parseInt(element.otrosacci);
                dm_2JL015 = dm_2JL015 + Ao;
                mtbf_2JL015 = mtbf_2JL015 + _mtbf;
                mttr_2JL015 = mttr_2JL015 + _mttr;
            }
            if(element.equipo_trabajo=='2JL016'){
                m_2JL016 = m_2JL016 + parseInt(element.hora);
                hora =  parseFloat(element.hora) + parseFloat(element.hora_acumulada);
                _mtbf = objJrc.calcmtbf(element.hora,element.fallas_equipo);
                _mttr = objJrc.calcmttr(element.homp,element.tiempo_parada,element.fallas_equipo);
                if(_mtbf == 0 && _mttr == 0){
                    Ao = 0;
                }else{
                    Ao =  ((_mtbf/(_mtbf+_mttr))*100);
                }
                i_2JL016 = i_2JL016 + parseInt(element.inspecc);
                pv_2JL016 = pv_2JL016 + parseInt(element.mantto_prev);
                pg_2JL016 = pg_2JL016 + parseInt(element.homp);
                cr_2JL016 = cr_2JL016 + parseInt(element.repcorrect);
                ra_2JL016 = ra_2JL016 + parseInt(element.otrosacci);
                dm_2JL016 = dm_2JL016 + Ao;
                mtbf_2JL016 = mtbf_2JL016 + _mtbf;
                mttr_2JL016 = mttr_2JL016 + _mttr;
            }
        });
        /* console.log ("mes: "+m_2SC019); */
        //suma en el año
        m.year.forEach(function( element, index ){
            if(element.equipo_trabajo=='2SC019'){
                a_2SC019 = a_2SC019 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2SC022'){
                a_2SC022 = a_2SC022 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2SC026'){
                a_2SC026 = a_2SC026 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2SC029'){
                a_2SC029 = a_2SC029 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2SC035'){
                a_2SC035 = a_2SC035 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2SC037'){
                a_2SC037 = a_2SC037 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2JL003'){
                a_2JL003 = a_2JL003 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2JL015'){
                a_2JL015 = a_2JL015 + parseInt(element.hora);
            }
            if(element.equipo_trabajo=='2JL016'){
                a_2JL016 = a_2JL016 + parseInt(element.hora);
            }
        });
        /* console.log ("año: "+a_2SC019); */
        var body = '';
            // para 2SC019
            body += '<tr>';
            body += '<td>2SC019</td>';
            body += '<td>Caterpillar</td>';
            body += '<td>R-1600G</td>';
            body += '<td>9YZ00603</td>';
            body += '<td></td>';
            body += '<td>Iscaycruz</td>';
            body += '<td>'+m_2SC019+'</td>';
            body += '<td>'+a_2SC019+'</td>';
            body += '<td>'+i_2SC019+'</td>';
            body += '<td>'+pv_2SC019+'</td>';
            body += '<td>'+pg_2SC019+'</td>';
            body += '<td>'+cr_2SC019+'</td>';
            body += '<td>'+ra_2SC019+'</td>';
            body += '<td>'+dm_2SC019.toFixed(1)+'</td>';
            body += '<td>'+mtbf_2SC019.toFixed(1)+'</td>';
            body += '<td>'+mttr_2SC019.toFixed(1)+'</td>';
            body += '</tr>';
            // para 2SC022
            body += '<tr>';
            body += '<td>2SC022</td>';
            body += '<td>Caterpillar</td>';
            body += '<td>R-1600G</td>';
            body += '<td>9YZ00657</td>';
            body += '<td></td>';
            body += '<td>Iscaycruz</td>';
            body += '<td>'+m_2SC022+'</td>';
            body += '<td>'+a_2SC022+'</td>';
            body += '<td>'+i_2SC022+'</td>';
            body += '<td>'+pv_2SC022+'</td>';
            body += '<td>'+pg_2SC022+'</td>';
            body += '<td>'+cr_2SC022+'</td>';
            body += '<td>'+ra_2SC022+'</td>';
            body += '<td>'+dm_2SC022.toFixed(1)+'</td>';
            body += '<td>'+mtbf_2SC022.toFixed(1)+'</td>';
            body += '<td>'+mttr_2SC022.toFixed(1)+'</td>';
            body += '</tr>';
            // para 2SC026
            body += '<tr>';
            body += '<td>2SC026</td>';
            body += '<td>Caterpillar</td>';
            body += '<td>R-1600G</td>';
            body += '<td>09YZ00733</td>';
            body += '<td></td>';
            body += '<td>Iscaycruz</td>';
            body += '<td>'+m_2SC026+'</td>';
            body += '<td>'+a_2SC026+'</td>';
            body += '<td>'+i_2SC026+'</td>';
            body += '<td>'+pv_2SC026+'</td>';
            body += '<td>'+pg_2SC026+'</td>';
            body += '<td>'+cr_2SC026+'</td>';
            body += '<td>'+ra_2SC026+'</td>';
            body += '<td>'+dm_2SC026.toFixed(1)+'</td>';
            body += '<td>'+mtbf_2SC026.toFixed(1)+'</td>';
            body += '<td>'+mttr_2SC026.toFixed(1)+'</td>';
            body += '</tr>';
            // para 2SC029
            body += '<tr>';
            body += '<td>2SC029</td>';
            body += '<td>Caterpillar</td>';
            body += '<td>R-1600G</td>';
            body += '<td>9YZ00803</td>';
            body += '<td></td>';
            body += '<td>Iscaycruz</td>';
            body += '<td>'+m_2SC029+'</td>';
            body += '<td>'+a_2SC029+'</td>';
            body += '<td>'+i_2SC029+'</td>';
            body += '<td>'+pv_2SC029+'</td>';
            body += '<td>'+pg_2SC029+'</td>';
            body += '<td>'+cr_2SC029+'</td>';
            body += '<td>'+ra_2SC029+'</td>';
            body += '<td>'+dm_2SC029.toFixed(1)+'</td>';
            body += '<td>'+mtbf_2SC029.toFixed(1)+'</td>';
            body += '<td>'+mttr_2SC029.toFixed(1)+'</td>';
            body += '</tr>';
            // para 2SC035
            body += '<tr>';
            body += '<td>2SC035</td>';
            body += '<td>Caterpillar</td>';
            body += '<td>R-1600G</td>';
            body += '<td>9YZ00803</td>';
            body += '<td></td>';
            body += '<td>Iscaycruz</td>';
            body += '<td>'+m_2SC035+'</td>';
            body += '<td>'+a_2SC035+'</td>';
            body += '<td>'+i_2SC035+'</td>';
            body += '<td>'+pv_2SC035+'</td>';
            body += '<td>'+pg_2SC035+'</td>';
            body += '<td>'+cr_2SC035+'</td>';
            body += '<td>'+ra_2SC035+'</td>';
            body += '<td>'+dm_2SC035.toFixed(1)+'</td>';
            body += '<td>'+mtbf_2SC035.toFixed(1)+'</td>';
            body += '<td>'+mttr_2SC035.toFixed(1)+'</td>';
            body += '</tr>';
            // para 2SC037
            body += '<tr>';
            body += '<td>2SC037</td>';
            body += '<td>Caterpillar</td>';
            body += '<td>R-1600G</td>';
            body += '<td>9YZ00803</td>';
            body += '<td></td>';
            body += '<td>Iscaycruz</td>';
            body += '<td>'+m_2SC037+'</td>';
            body += '<td>'+a_2SC037+'</td>';
            body += '<td>'+i_2SC037+'</td>';
            body += '<td>'+pv_2SC037+'</td>';
            body += '<td>'+pg_2SC037+'</td>';
            body += '<td>'+cr_2SC037+'</td>';
            body += '<td>'+ra_2SC037+'</td>';
            body += '<td>'+dm_2SC037.toFixed(1)+'</td>';
            body += '<td>'+mtbf_2SC037.toFixed(1)+'</td>';
            body += '<td>'+mttr_2SC037.toFixed(1)+'</td>';
            body += '</tr>';
        //print body
        $('#tbl_resumenindicadores').append(body);

        //sumando
        var total_i = i_2SC019+i_2SC022+i_2SC026+i_2SC029+i_2SC035+i_2SC037;
        var total_pv = pv_2SC019+pv_2SC022+pv_2SC026+pv_2SC029+pv_2SC035+pv_2SC037;
        var total_pg = pg_2SC019+pg_2SC022+pg_2SC026+pg_2SC029+pg_2SC035+pg_2SC037;
        var total_cr = cr_2SC019+cr_2SC022+cr_2SC026+cr_2SC029+cr_2SC035+cr_2SC037;
        var total_ra = ra_2SC019+ra_2SC022+ra_2SC026+ra_2SC029+ra_2SC035+ra_2SC037;
        var total_dm = dm_2SC019+dm_2SC022+dm_2SC026+dm_2SC029+dm_2SC035+dm_2SC037;
        var total_mtbf = mtbf_2SC019+mtbf_2SC022+mtbf_2SC026+mtbf_2SC029+mtbf_2SC035+mtbf_2SC037;
        var total_mttr = mttr_2SC019+mttr_2SC022+mttr_2SC026+mttr_2SC029+mttr_2SC035+mttr_2SC037;
        //print footer
        var footer = '';
            footer += '<tr>';
            footer += '<td colspan="8">Total Flota Scooptrams</td>';
            footer += '<td>'+total_i+'</td>';
            footer += '<td>'+total_pv+'</td>';
            footer += '<td>'+total_pg+'</td>';
            footer += '<td>'+total_cr+'</td>';
            footer += '<td>'+total_ra+'</td>';
            footer += '<td>'+total_dm.toFixed(1)+'</td>';
            footer += '<td>'+total_mtbf.toFixed(1)+'</td>';
            footer += '<td>'+total_mttr.toFixed(1)+'</td>';
            footer += '</tr>';
        $('#tbl_resumenindicadores_foot').append(footer);
    }
};

$(document).ready(function(){
    objJrc.init();
});