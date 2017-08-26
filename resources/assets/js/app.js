/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('../../../modules');


Vue.component('confirmed-action', {
    template: `
        <form :action="action" :method="method">
        <a :href="action" @click.prevent="submit">
        <span :class="icon"></span>
        {{label}}
        </a>
</form>
    `,
    props: ['label', 'action', 'method', 'icon', 'confirm', 'title'],
    data: function () {
        return {};
    },
    methods: {
        submit: function () {
            let component = this;
            $.confirm({
                closeIcon: true,
                theme: 'bootstrap',
                animation: 'opacity',
                closeAnimation: 'opacity',
                animateFromElement: false,
                title: this.title,
                content: this.confirm,
                buttons: {
                    Confirm: function () {
                        if(component.method === 'post'){
                            component.$el.submit();
                        }else{
                            window.location.href = component.action;
                        }
                    },
                    Cancel: function () {
                        this.close();
                    }
                }

            });
        },
    }
});
const app = new Vue({
    el: '#app'
});
