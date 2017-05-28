let generator = (function ($) {

    let items;

    let imageNames = [
        'F0',
        'F1',
        'F2',
        'F3',
        'F4',
        'F5',
        'F6',
        'M0',
        'M1',
        'M2',
        'M3',
        'M4',
        'M5',
        'M6'
    ];

    let places = [
        {x: -245, y: -225.20},
        {x: -245, y: 3.80},
        {x: -75, y: -324.2},
        {x: -75, y: -100.20},
        {x: -75, y: 124.80},
        {x: 95, y: -225.20},
        {x: 95, y: 3.80}
    ];

    let faces = [];

    let numLoaded     = 0;
    let numToLoad     = 0;
    let percentLoaded = 0;

    let imageList = {};

    let setItems = function (i) {
        items = i;
    };

    let getItems = function () {
        return items;
    };

    let checkProgress = function () {
        percentLoaded = Math.round(numLoaded * 100 / numToLoad);

        if (numLoaded >= numToLoad) {
            generate();
        }
    };


    let preload = function () {

        numToLoad = imageNames.length;

        imageNames.forEach(function (img) {

            imageList[img] = $("<img>").on('load', function () {
                numLoaded++;
                checkProgress();
            }).on('error', function () {
                numLoaded++;
                checkProgress();
            }).get(0);

            imageList[img].src = '/images/faces/' + img + '.png';

        });

    };

    let init = function () {

        preload();
    };


    let drawItem = function (item, context) {


        for (let place in item) {

            if (item.hasOwnProperty(place)) {

                let keyData = item[place].split('_');

                let image = keyData[0] + keyData[1];

                place = parseInt(place);

                context.drawImage(imageList[image], places[place - 1].x, places[place - 1].y, 150, 199.45);

                if (keyData[2] === 'O') {

                    context.fillRect(places[place - 1].x, places[place - 1].y + 60.25, 150, 45);

                }

                if (keyData[2] === 'B') {

                    context.fillRect(places[place - 1].x, places[place - 1].y + 135.25, 150, 45);

                }

            }

        }


    };

    let generate = function () {

        let wrap = $('#items');

        items.forEach(function (item) {

            let canvas  = $('<canvas>').attr({width: 500, height: 680}).appendTo(wrap).get(0);
            let context = canvas.getContext('2d');

            context.fillStyle = "black";
            context.fillRect(0, 0, canvas.width, canvas.height);
            context.translate(canvas.width * 0.5, canvas.height * 0.5);


            drawItem(item, context);

        });

    };

    let storeSingle = function (index, canvas) {

        let data = {
            name:(index+1),
            img:canvas.toDataURL('image/png')
        };

        $.post('/reconocimiento-emociones/generator', data, function () {

            if(faces[index+1]){

                storeSingle(index+1, faces[index+1]);

            }else{

                alert('Terminado!');

            }

        }).fail(function () {

            alert('Fuuuuck!!');

        });

    };

    let store = function () {

        faces = document.getElementsByTagName('canvas');

        storeSingle(0, faces[0]);

    };

    return {

        setItems: setItems,
        getItems: getItems,
        store   : store,
        init    : init
    };


})(jQuery);