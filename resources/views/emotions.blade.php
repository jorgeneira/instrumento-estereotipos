<!doctype html>
<html lang="{{ config('app.locale') }}" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proyecto Final - Perspectivas 2017-1</title>

    <link rel="stylesheet" href="{{ elixir('css/all-emotions.css') }}">

</head>
<body>

<div id="mainContent" class="mainContent">

    <div class="counter" v-if="itemVisible" v-cloak>
        <div class="item-counter" v-text="itemCounter"></div>
    </div>

    <div v-if="itemVisible" v-cloak style="position:absolute; bottom: 50px; left: 10px">
        <div class="item-counter" v-text="leftKey"></div>
    </div>

    <div v-if="itemVisible" v-cloak style="position:absolute; bottom: 50px; right: 10px">
        <div class="item-counter" v-text="rightKey"></div>
    </div>

    <div class="section" v-if="section === 0">
        <h2>Cargando...</h2>
        <h3 v-text="percentLoaded"></h3>
    </div>


    <div class="section" v-if="section === 1" v-cloak>

        <h1>¡Gracias por Participar!</h1>

        <p>
            A continuación se le presentaran una serie de imagenes con 7 rostros. <br> <br> Ud debe responder SI en caso de que
            encuentre un rostro que exprese una emoción distinta a los demás. <br><br>

            Si no encuentra un rostro que exprese una emoción diferente, responda NO.
        </p>
        <p>Por favor seleccione:</p>
        <div>
            <label>
                <input type="radio" name="zurdo" v-model="zurdo" value="0" number> Soy Diestro
            </label> <br>
            <label>
                <input type="radio" name="zurdo" v-model="zurdo" value="1" number> Soy Zurdo
            </label>
        </div>
        <p>
            Para responder deberá utilizar las Letras A y L de su teclado:
        </p>
        <p v-text="rightKey"></p>
        <p v-text="leftKey"></p>
        <p>
            No hay tiempo límite, pero deberá responder lo antes posible.
        </p>
        <p>
            Recuerde, para responder simplemente presione la tecla correspondiente en cualquier momento.
        </p>


        <hr>
        <br>
        <div>
            <label for="age">Edad</label>
            <input type="number" min="18" max="45" v-model="age">
        </div>
        <br>
        <label>
            <input type="checkbox" v-model="accepted"> He leído y acepto el <a
                    href="/reconocimiento-emociones/consentimiento-informado">Consentimiento Informado</a>
        </label> <br> <br>
        <button type="button" class="btn-primary" v-on:click="start">Comenzar</button>

    </div>

    <div class="section" v-if="section === 2 && itemVisible" v-cloak v-html="activeImg"
         style="background: #000; border:none">


    </div>

    <div class="section" v-if="section === 3" v-cloak>

        <p>Haga click en el botón para Terminar</p>

        <div class="item-controls">
            <button type="button" class="btn-primary" v-on:click="storeResponses">Guardar Respuestas</button>
        </div>

    </div>

    <div class="section" v-if="section === 4" v-cloak>

        <h1>Respuestas Guardadas!</h1>

        <p>Gracias por su participación. Sí desea más información de este estudio, puede escribir a <a
                    href="mailto:jeneiraa@unal.edu.co">jeneiraa@unal.edu.co</a></p>

        <p>Perspectivas Contemporaneas en Psicología Social - 2017-1</p>

    </div>

</div>

<script type="text/javascript">


</script>

<script type="text/javascript" src="{{ elixir('js/all-emotions.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>
</html>
