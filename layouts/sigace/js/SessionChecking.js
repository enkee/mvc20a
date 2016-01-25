function session_checking()
{
    $.post(_root_ + "usuarios/sessionCount/", function( data ) {
       var texto = JSON.stringify(data);
       var res = texto.replace(/["']/g,"");
       var res = res.substring(5);
       var res = res.trim();
       if(res === 'termino')
       {
           clearInterval(validateSession);
           $('#login').dialog({
               title: "Login",
               modal: true,
               closeOnEscape: false,
               show: {
                   effect: 'slide',
               },
               open: function(){ $(".ui-dialog-titlebar-close").hide();},
               buttons:{
                   "Ok": function(){
                               $.ajax({
                                   url: _root_ + "usuarios/login2/",
                                   type: "post",
                                   data: { usuario2: $("#usuario").val(), pass2: $("#pass").val() },
                                   //success: function(response) { alert(response); }
                               });
                               validateSession = setInterval(session_checking, 1000);
                               $( this ).dialog( "close")
                          },

                   "Cancel": function(){
                               $.cookie("dcjq-accordion-1", "",  { expires: -1, path: "/" });
                               //$.removeCookie("dcjq-accordion-1", { path: '/' });
                               window.location.replace(_root_ + "usuarios/login");
                          }
               }
           });
       }
   });
 }

var validateSession = setInterval(session_checking, 1000);

