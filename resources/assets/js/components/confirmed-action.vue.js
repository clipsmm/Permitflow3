import Vue from 'vue';

export default Vue.component('confirmed-action', {
    template: `
<form :action="action" method="post">
       <input type="hidden" name="_method" :value="method">
       <input type="hidden" name="_token" :value="token">
        <a :href="action" @click.prevent="submit">
        <span :class="icon+'  text-'+color"></span>
        {{label}}
        </a>
</form>    `,
    props: ['label', 'action', 'method', 'icon', 'confirm', 'title', 'color', 'token'],
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
                                window.location.href = component.action;
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
