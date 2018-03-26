import Vue from 'vue';

export default Vue.component('confirmed-action', {
    template: `
<form :action="action" method="post" style="display: inline !important;">
       <input type="hidden" name="_method" :value="method">
       <input type="hidden" name="_token" :value="token">
       <input v-for="(value, field) in request_data" type="hidden" :name="field" :value="value">
        <a :class="classes" :href="action" @click.prevent="submit">
        <span :class="icon+'  text-'+color"></span>
        {{label}}
        </a>
</form>    `,
    props: ['label', 'action', 'method', 'icon', 'confirm', 'title', 'color', 'token', 'classes', 'form_data'],
    data: function () {
        return {
            request_data: this.form_data || {}
        };
    },
    computed: {
        submit_url: function () {
            // console.log(window.location.href);
            // let url = new URL(this.action || window.location.href);
            // for (let key in this.request_data) {
            //     url.addQuery(key, this.request_data[key]);
            // }
            return this.action || window.location.href ;
        }
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
                    Confirm: {
                        btnClass: 'btn-success',
                        action: function () {
                            let m = (component.method || 'get').toLowerCase();
                            if (m !== 'get') {
                                component.$el.submit();
                            } else {
                                window.location.href = this.submit_url;
                            }
                        }
                    },
                    Cancel: {
                        btnClass: 'btn-danger',
                        action: function () {
                            this.close();
                        }
                    }
                }

            });
        },
    }
});
