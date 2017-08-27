import Vue from 'vue';

export default Vue.component('confirmed-action', {
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
                        if (component.method === 'post') {
                            component.$el.submit();
                        } else {
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
