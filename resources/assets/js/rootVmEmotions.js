const rootVm = new Vue({

    el: '#mainContent',

    data: {

        section:0,

        running:false,

        accepted:false,

        timer:0,

        maxResponseTime:60,

        itemVisible:false,

        itemActive:1,

        itemTimestamp:0,

        responses:[],

        age:18,

        zurdo:false,

        items: 54,

        itemsLoaded:0,

        images:{},

        response:2

    },

    computed: {

        itemCounter: function () {

            return (this.itemActive ) + '/'+this.items;

        },
        percentLoaded: function () {

            return Math.round(this.itemsLoaded / this.items * 100) + '%';

        },

        activeImg:function () {

            return this.images[this.itemActive].outerHTML;

        },

        leftKey: function () {

            return this.zurdo ? 'A: SI' : 'A: NO';

        },
        rightKey: function () {

            return this.zurdo ? 'L: NO' : 'L: SI';

        }


    },

    methods: {

        start: function () {

            if(!this.accepted){

                swal('Falta Consentimiento', 'Por favor marque la casilla de verificación antes de continuar.', 'error');

                return false;

            }

            $('body').css({background:'url(/images/fixPoint.png) no-repeat center center #000'});

            this.section = 2;

            this.running = true;

            setTimeout(function(){

                this.launchItem();

            }.bind(this), 2000);


        },

        showHome: function () {

            this.section = 1;

        },

        launchItem: function () {

            this.itemVisible = false;

            setTimeout(function () {

                this.showItem();

            }.bind(this), 1000);

        },

        showItem: function(){


            this.response = 2;

            this.itemVisible = true;

            this.itemTimestamp = Date.now();
            
            this.startTimer();


        },

        startTimer:function () {
            
            this.timer = this.maxResponseTime;

            window.timerInterval = setInterval(function () {
                
                this.timer--;
                
                if(this.timer <= 0){
                    
                    this.timeIsOver();
                    
                }
                
            }.bind(this), 1000);

        },
        
        timeIsOver:function () {
            
            this.saveResponse();
            
        },

        saveResponse: function () {

            clearInterval(window.timerInterval);

            const reactionTime = Date.now() - this.itemTimestamp;

            this.responses.push({
                item_id:this.itemActive,
                value: this.response,
                reaction_time: reactionTime > (this.maxResponseTime * 1000) ? this.maxResponseTime * 1000 : reactionTime
            });

            this.itemVisible = false;

            this.response = 2;

            this.itemActive++;

            if(this.itemActive <= this.items){

                return this.launchItem();

            }

            return this.testCompleted();

        },

        testCompleted: function () {

            this.running = false;

            this.section = 3;

            $('body').css({background:'#e2e2e2'});


        },

        storeResponses: function(){

            const finalResponses = {

                participant: {
                    age: this.age,
                    zurdo: this.zurdo
                },
                responses: this.responses

            };

            $.post('/response-emotions', finalResponses, function (data) {

                if(data.status === 'ok'){

                    swal('Guardado!', 'Sus respuestas han sido guardadas.', 'success');

                    this.finish();
                }else{
                    swal('Error!', 'Ha ocurrido un error. Verifique su Conexión a Internet', 'error');
                }

            }.bind(this));

        },

        finish: function () {

            this.section = 4;

        },

        preload: function () {

            for(let i = 1; i<= this.items;i++){

                this.images[i] = $("<img>").on('load', function () {

                    this.itemsLoaded++;

                    if(this.itemsLoaded >= this.items){

                        this.showHome();

                    }


                }.bind(this)).on('error', function () {

                    swal('Error al Cargar', 'No se ha podido cargar el instrumento. Actualice la Página.', 'error')

                }).get(0);

                this.images[i].src = '/images/final/' + i + '.jpg';


            }

        }

    },

    ready: function () {

        window.timerInterval = '';

        this.preload();

        window.addEventListener('keyup', function(event) {


            if(this.itemVisible && event.keyCode === 65){

                this.response = this.zurdo ? 1 : 0;

                this.saveResponse();

            }

            if(this.itemVisible && event.keyCode === 76){

                this.response = this.zurdo ? 0 : 1;

                this.saveResponse();

            }

        }.bind(this));

    }


});