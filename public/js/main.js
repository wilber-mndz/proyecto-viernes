// (function(){

    // Establecemos el tamaño de la ventana
    
    if (screen.width < 768) {
        var height = $(window).height();
        // var chat = document.getElementById("chat-container");
        // chat.height = height;
        $('#chat-container').height(height);
    }


    function send_keyboard(e){
        var keyboard = (document.all) ? e.keyCode : e.which;
        if (keyboard == 13) {
            send();
        }
    }

    //  Función para enviar el mensaje
    function send() {

        // Obtenemos la fecha

        var today =  new Date();
        var time = document.createTextNode(today.getHours() + ':' + today.getMinutes());
        
        var message =  document.getElementById('message-form');
        // Accedemos al chat-list
        var message_list = document.getElementById('chat-message-list');
        // Creamos nuestro message-row
        var message_row = document.createElement('div');
        message_row.setAttribute('class', 'message-row you-message');

        var message_content = document.createElement('div');
        message_content.setAttribute('class', 'message-content');

        var message_text = document.createElement('div');
        message_text.setAttribute('class', 'message-text');

        var message_time = document.createElement('div');
        message_time.setAttribute('class', 'message-time');

        
        var text = document.createTextNode(message.value);

        message_text.appendChild(text);
        message_time.appendChild(time);
        message_content.appendChild(message_text);
        message_content.appendChild(message_time);
        message_row.appendChild(message_content);

        // Agregamos el nuevo mensaje
        message_list.appendChild(message_row);

        // Hacemos scroll en el message_list

        message_list.scrollTop = message_list.scrollHeight - message_list.clientHeight;

        message.value = '';



    }
// }())