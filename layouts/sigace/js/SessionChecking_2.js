// Toquen: Checa el estado de la Session
    (function() {
        //INICIALIZA
        var countKeyType =0;
        var mousePos = {x: -1,
                        y: -1};
        var intervalo = 1000;
        var tiempo = 10 * (1000 * 60);
        var timeSession = tiempo;
        var timeCheckSession = tiempo;


        document.onkeypress = countKeyPress;
        document.onmousemove = checkMouseMove;

        var validateTime = setInterval(checkTime, intervalo);
        var validateSession = setInterval(checkSession, timeCheckSession);

        //PROCESA
        function countKeyPress(){
            countKeyType = countKeyType + 1;
            document.onkeypress = null;
        }

        function checkMouseMove(event) {
            event = event || document.event; // IE-ism
            mousePos = {
                x: event.clientX,
                y: event.clientY}
            document.onmousemove = null;
        }
        //CHECA
        function checkTime() {
            if (mousePos.x == -1 && mousePos.y == -1 && countKeyType == 0) {
                timeSession = timeSession - intervalo;
            }
            else {
                mousePos = {
                        x: -1,
                        y: -1};
                countKeyType = 0;
                timeSession = tiempo;
                document.onkeypress = countKeyPress;
                document.onmousemove = checkMouseMove;
            }
        }

        function checkSession() {
            if (timeSession <= 0) {
                clearInterval(validateTime);
                clearInterval(validateSession);
                //Termina Session
                $.post(_root_ + "usuarios/cerrar2",
                function() {
                    $('#pass').val("");
                    //Se habre el cuadro de dialogo para reiniciar session o salir
                    $('#login').dialog({
                        title: "Login",
                        modal: true,
                        closeOnEscape: false,
                        show: {
                            effect: 'slide'
                        },
                        open: function(){ $(".ui-dialog-titlebar-close").hide();
                                          $("button:eq(1)").css({"background":"#D3ECFA", "border-color":"#4BB1E9", "color":"#105C85"});
                                          $("#login").keypress(function(e) {
                                            if (e.keyCode === $.ui.keyCode.ENTER) {
                                              $("button:eq(1)").click();
                                            }
                                          });
                                      },

                        buttons:{
                            "Continuar": function(){
                                        $.ajax({
                                            url: _root_ + "usuarios/login2",
                                            type: "post",
                                            data: { usuario2: _user_ , pass2: $("#pass").val() },
                                            success: function(response) {
                                                        var texto = JSON.stringify(response);
                                                        var res = texto.replace(/["']/g,"");
                                                        res = res.substring(5);
                                                        res = res.trim();
                                                        if(res === "ok"){
                                                            timeSession = tiempo;
                                                            timeCheckSession = tiempo;
                                                            validateTime = setInterval(checkTime, intervalo);
                                                            validateSession = setInterval(checkSession, timeCheckSession);
                                                            $('#login').dialog( "close");
                                                            $("#login").off("keypress");
                                                        }else{
                                                            $("#mensaje").text( "Password Incorrecto" );
                                                            $('#pass').val("");
                                                        }
                                                     }
                                        });
                                   },

                            "Salir": function(){
                                        $.cookie("dcjq-accordion-1", "",  { expires: -1, path: "/" });
                                        //$.removeCookie("dcjq-accordion-1", { path: '/' });
                                        window.location.replace(_root_ + "usuarios/login");
                                   }
                        }
                    });
                });
            }
            else {
                clearInterval(validateTime);
                clearInterval(validateSession);
                //Restablece el tiempo de session
                $.post(_root_ + "usuarios/resetTimeSession",
                function() {
                    timeCheckSession = timeSession;
                    validateTime = setInterval(checkTime, intervalo);
                    validateSession = setInterval(checkSession, timeCheckSession);
                });
            }
        }
})();


