objReq = {
    init: function(){
        objReq.requerimientos();
        objReq.imboxpagination();
        objReq.openmessage();
        objReq.backlist();
        objReq.actualizar();
    },
    actualizar: function(){
        $(".actualizar").on("click",function(){
            objReq.requerimientos();
        });
    },
    requerimientos: function(){
        $(".volver").html("");
        $(".prints").html("");
        $(".pagination_imbox").html("");
        $.ajax({
            type: 'GET',
            url: urlProd + 'imboxrequerimientos',
            dataType:'json'
        }).done(function(data){
            var i = 0;
            $(".imbox").html("");
            data.data.forEach(function(element){
                content = '';
                content += '<tr>';
                content += '<td></td>';
                content += '<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>';
                content += '<td class="mailbox-name"><a href="#" class="mail" data-current="'+data.current_page+'" data-id="'+element.id_requerimiento+'">'+element.mecanico+'</a></td>';
                content += '<td class="mailbox-subject"><b>Mensaje</b> - '+element.descripcion+' ';
                content += '</td>';
                content += '<td class="mailbox-attachment"></td>';
                content += '<td class="mailbox-date">'+element.fecha+'</td>';
                content += '</tr>';
                $(".imbox").append(content);
                i++;
            }); 
            pagination = '';
            pagination += ' '+data.current_page+'-'+i+'/'+data.pagination+' ';
            pagination += '<div class="btn-group">';
            if(data.previus_page != 'false'){
                pagination += '<button type="button" class="previus btn btn-default btn-sm" data-page="'+data.previus_page+'"><i class="fa fa-chevron-left"></i></button>';
            }
            if(data.next_page != 'false'){  
                pagination += '<button type="button" class="next btn btn-default btn-sm" data-page="'+data.next_page+'"> <i class="fa fa-chevron-right"></i></button>';
            }
            pagination += '</div>';
            $(".pagination_imbox").append(pagination);
        });
    },
    backlist: function(){
        $("body").on("click",".backlist",function(){
            $(".openmessage").html("");

            actualizar = '<button type="button" class="actualizar btn btn-default btn-sm"><i class="fa fa-refresh"></i> Actualizar</button>';
            $(".refresh").append(actualizar);
            
            content = '';
            content += '<div class="table-responsive mailbox-messages">';
            content += '<table class="table table-hover table-striped">';
            content += '<tbody class="imbox">';
                    
            content += '</tbody>';
            content += '</table>';
            content += '</div>';
            $(".listmessage").append(content);
            objReq.requerimientos();
        });
    },
    openmessage: function(){
        $("body").on("click",".mail",function(e){
            $(".refresh").html("");
            print = '<button type="button" class="imprimir btn btn-default btn-sm"><a href="javascript:imboxPDF()"><i class="fa fa-print"></i> Imprimir</a></button>';
            $(".prints").append(print);

            console.log("abierto");
            e.preventDefault();
            var id = $(this).data("id");
            var page = $(this).data("current");
            $(".pagination_imbox").html("");
            var volver = '<button type="button" class="backlist btn btn-default btn-sm"><i class="fa fa-reply"></i> Volver</button>';
            $(".volver").append(volver);
            $(".listmessage").html("");
            $.ajax({
                type:'GET',
                url: urlProd + 'imboxrequerimientos?page='+page,
                dataType: 'json'
            }).done(function(data){
                data.data.forEach(function(element){
                    if(element.id_requerimiento == id){
                        var cadena = element.mecanico;
                        var fstChar = cadena.charAt(0);
                        open = '';
                        open += '<div class="body-message">';
                        open += '<div class="content-message">';
                        open += '<span class="fecha_message">'+element.fecha+'</span>';
                        open += '<div class="avatar_mesage">';
                        open += '<div class="avatar_img">'+fstChar+'</div>';
                        open += '<span class="name_autor">'+element.mecanico+'</span>';
                        open += '</div>';
                        open += '<h4><b>'+element.descripcion+'</b></h4>';
                        open += '<p>'+element.otros+'</p>';
                        open += '<p>'+element.cantidad+'</p>';
                        open += '</div>';
                        open += '</div>';
                        $(".openmessage").append(open);
                    }
                });
            });
        })
    },
    imboxpagination: function (){
        $("body").on("click",".previus",function(){
            var page = $(this).data("page");
            $(".imbox").html("");
            /* previus */
            $.ajax({
                type: 'GET',
                url: urlProd + 'imboxrequerimientos?page='+page,
                dataType:'json'
            }).done(function(data){
                var i = 0;
                data.data.forEach(function(element){
    
                    content = '';
                    content += '<tr>';
                    content += '<td></td>';
                    content += '<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>';
                    content += '<td class="mailbox-name"><a href="#" class="mail" data-current="'+data.current_page+'" data-id="'+element.id_requerimiento+'">'+element.mecanico+'</a></td>';
                    content += '<td class="mailbox-subject"><b>Mensaje</b> - '+element.descripcion+' ';
                    content += '</td>';
                    content += '<td class="mailbox-attachment"></td>';
                    content += '<td class="mailbox-date">'+element.fecha+'</td>';
                    content += '</tr>';
                    $(".imbox").append(content);
                    i++;
                }); 
                $(".pagination_imbox").html("");
                pagination = '';
                pagination += ' 1-'+i+'/'+data.pagination+' ';
                pagination += '<div class="btn-group">';
                if(data.previus_page != 'false'){
                    pagination += '<button type="button" class="previus btn btn-default btn-sm" data-page="'+data.previus_page+'"><i class="fa fa-chevron-left"></i></button>';
                }
                if(data.next_page != 'false'){  
                    pagination += '<button type="button" class="next btn btn-default btn-sm" data-page="'+data.next_page+'"> <i class="fa fa-chevron-right"></i></button>';
                }
                pagination += '</div>';
                $(".pagination_imbox").append(pagination);
            });
        });
        $("body").on("click",".next",function(){
            var page = $(this).data("page");
            $(".imbox").html("");
            /* next */
            $.ajax({
                type: 'GET',
                url: urlProd + 'imboxrequerimientos?page='+page,
                dataType:'json'
            }).done(function(data){
                var i = 0;
                data.data.forEach(function(element){
    
                    content = '';
                    content += '<tr>';
                    content += '<td></td>';
                    content += '<td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>';
                    content += '<td class="mailbox-name"><a href="#" class="mail" data-current="'+data.current_page+'" data-id="'+element.id_requerimiento+'">'+element.mecanico+'</a></td>';
                    content += '<td class="mailbox-subject"><b>Mensaje</b> - '+element.descripcion+' ';
                    content += '</td>';
                    content += '<td class="mailbox-attachment"></td>';
                    content += '<td class="mailbox-date">'+element.fecha+'</td>';
                    content += '</tr>';
                    $(".imbox").append(content);
                    i++;
                }); 
                $(".pagination_imbox").html("");
                pagination = '';
                pagination += '1-'+i+'/'+data.pagination+' ';
                pagination += '<div class="btn-group">';
                if(data.previus_page != 'false'){
                    pagination += '<button type="button" class="previus btn btn-default btn-sm" data-page="'+data.previus_page+'"><i class="fa fa-chevron-left"></i></button>';
                }
                if(data.next_page != 'false'){  
                    pagination += '<button type="button" class="next btn btn-default btn-sm" data-page="'+data.next_page+'"> <i class="fa fa-chevron-right"></i></button>';
                }
                pagination += '</div>';
                $(".pagination_imbox").append(pagination);
            });
        });
    }

}

$(document).ready(function(){
    objReq.init();
});