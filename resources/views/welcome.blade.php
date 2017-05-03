<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CPERC - Perspectivas 2017-1</title>

    <link rel="stylesheet" href="{{ elixir('css/all.css') }}">

</head>
<body>

<div id="mainContent" class="mainContent">

    <div class="counter" v-if="itemVisible" v-cloak>
        <div class="item-counter" v-text="itemCounter"></div>
        <div class="counter-time">
            <i class="fa fa-clock-o counter-icon"></i>
            <span v-text="timer+'s'"></span>
        </div>
    </div>


    <div class="section" v-if="section === 1">

        <h1>¡Gracias por Participar!</h1>

        <p>
            A continuación se le presentaran una serie de enunciados que usted debe completar con la respuesta que mejor
            le parezca.
        </p>
        <p>
            La respuesta es abierta, siéntase libre de escribir lo primero que se le ocurra.
        </p>
        <p>
            Solo dispone de 10 segundos por pregunta para responder, si no responde se pasará automaticamente a la
            siguiente pregunta.
        </p>
        <p>
            Para responder, simplemente escriba en el campo de texto y presione la tecla ENTER
        </p>


        <hr>
        <br>
        <div>
            <label for="age">Edad</label>
            <input type="number" min="18" max="45" v-model="age">
        </div>
        <br>
        <label>
            <input type="checkbox" v-model="accepted"> He leído y acepto el <a href="/estudio-perspectivas-2017/consentimiento-informado">Consentimiento Informado</a>
        </label> <br> <br>
        <button type="button" class="btn-primary" v-on:click="start">Comenzar</button>

    </div>

    <div class="section" v-if="section === 2 && itemVisible" v-cloak>

        <p class="item-text" v-html="itemText"></p>

        <div class="item-controls">
            <input type="text" v-on:keyup.enter="saveResponse" title="response" id="item-response" class="item-response" v-model="response">
        </div>

    </div>

    <div class="section" v-if="section === 3" v-cloak>

        <p class="item-text">Considero que soy:</p>

        <div class="region-control">
            <label>
                <input type="radio" v-model="region" value="1"> Paisa
            </label>
            <label>
                <input type="radio" v-model="region" value="2"> Bogotano
            </label>
            <label>
                <input type="radio" v-model="region" value="3"> Costeño
            </label>
            <label>
                <input type="radio" v-model="region" value="4"> Valluno
            </label>
            <label>
                <input type="radio" v-model="region" value="5"> Boyacense
            </label>
            <label>
                <input type="radio" v-model="region" value="6"> Santandereano
            </label>
            <label>
                <input type="radio" v-model="region" value="7"> Llanero
            </label>
            <label>
                <input type="radio" v-model="region" value="8"> Ninguno de los Anteriores
            </label>
            <br>
        </div>

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

    window.items = {!! $items->toJson() !!} ;

</script>

<script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>
</html>
