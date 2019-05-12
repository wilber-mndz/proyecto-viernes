<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="fa/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Chat</title>
</head>

<body>
    <div class="chat-container" id="chat-container">
        <div class="bot-name">
            <!-- <i class="fas fa-search"></i> -->
            <h4>Psicóloga Virtual</h4>
        </div>
        <div class="bot-info">
            <!-- Diseño de bot   -->
            <div class="picture">
                hola
            </div>
        </div>
        <div class="chat-title">
            <span>Viernes</span>
            <i class="fas fa-bars"></i>
        </div>
        <div class="chat-message-list" id="chat-message-list">
            <div class="message-row other-message">
                <div class="message-content">
                    <img src="img/01.jpg" alt="Juan Pérez">
                    <div class="message-text">Hola, ¿Como estás?</div>
                    <div class="message-time">Abr 15</div>
                </div>
            </div>
            <div class="message-row you-message">
                <div class="message-content">
                    <div class="message-text">Muy bien, ¿y tu?</div>
                    <div class="message-time">Abr 15</div>
                </div>
            </div>
            <div class="message-row other-message">
                <div class="message-content">
                    <img src="img/01.jpg" alt="Juan Pérez">
                    <div class="message-text">Trabajando en el proyecto de bases de datos </div>
                    <div class="message-time">Abr 15</div>
                </div>
            </div>
            <div class="message-row you-message">
                <div class="message-content">
                    <div class="message-text">y como vas?</div>
                    <div class="message-time">Abr 15</div>
                </div>
            </div>
            <div class="message-row other-message">
                <div class="message-content">
                    <img src="img/01.jpg" alt="Juan Pérez">
                    <div class="message-text">Pues muy mal</div>
                    <div class="message-time">Abr 15</div>
                </div>
            </div>
            <div class="message-row you-message">
                <div class="message-content">
                    <div class="message-text">que triste</div>
                    <div class="message-time">Abr 15</div>
                </div>
            </div>
        </div>
        <div class="chat-form">
            <input type="text" onkeypress="send_keyboard(event)" id="message-form" placeholder="Escribe un mensaje">
            <i class="fas fa-paper-plane" onclick="send()"></i>
        </div>
    </div>

    <!-- Archivos JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>