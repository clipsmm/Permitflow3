import Vue from 'vue';
let $ = require('jquery');

export default Vue.component('guest-resend-email', {
    props: ['url', 'method'],
    data: function(){
        return {
            sending: false,
            sent: false
        };
    },
    methods: {
        resend: function () {
            if(this.sending){
                return false;
            }
            
            this.sending = true;
            $.ajax({
                url: this.url,
                method: this.method,
                complete: () => {
                    this.sent = true;
                    this.sending = false;
                }
            });
        },
        hasResent: function(){
            if(this.sent){
                this.sent = false;
            }
        }
    }
});