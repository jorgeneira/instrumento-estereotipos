const rootVm = new Vue({

    el: '#mainContent',

    data: {

        section:1,

        running:false,

        accepted:false,

        timer:0,

        maxResponseTime:10,

        itemVisible:false,

        itemActive:0,

        itemTimestamp:0,

        itemText: '',

        response:'',

        responses:[],

        region:8,

        age:18,

        items: window.items

    },

    computed: {

        itemCounter: function () {

            return (this.itemActive + 1) + '/'+this.items.length;

        }

    },

    methods: {

        start: function () {

            if(!this.accepted){

                swal('Falta Consentimiento', 'Por favor marque la casilla de verificación antes de continuar.', 'error');

                return false;

            }

            this.section = 2;

            this.running = true;

            this.launchItem();

        },

        launchItem: function () {

            this.itemVisible = false;

            setTimeout(function () {

                this.showItem();

            }.bind(this), 1000);

        },

        showItem: function(){


            this.itemText = this.items[this.itemActive].text;

            this.response = '';

            this.itemVisible = true;

            this.itemTimestamp = Date.now();
            
            this.startTimer();

            setTimeout(function(){
                $('#item-response').focus();
            },250);

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
                item_id:this.items[this.itemActive].id,
                text: this.response,
                reaction_time: reactionTime > (this.maxResponseTime * 1000) ? this.maxResponseTime * 1000 : reactionTime
            });

            this.itemVisible = false;

            this.response = '';

            this.itemActive++;

            if(this.items[this.itemActive]){

                return this.launchItem();

            }

            return this.testCompleted();

        },

        testCompleted: function () {

            this.running = false;

            this.section = 3;

        },

        storeResponses: function(){

            const finalResponses = {

                participant: {
                    age: this.age,
                    region: this.region
                },
                responses: this.responses

            };

            $.post('/response', finalResponses, function (data) {

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

        }

    },

    ready: function () {

        window.timerInterval = '';

    }


});