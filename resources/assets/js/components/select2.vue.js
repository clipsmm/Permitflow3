import Vue from 'vue';

Vue.component('select-2-input', {
    template: `
    <select v-if="multiple" multiple :name="name+'[]'">
        <option v-for="(key, val) in options" :value="val">{{key}}</option>
    </select>
    <select v-else :name="name">
        <option v-for="(key, val) in options" :value="val">{{key}}</option>
    </select>
    `,
    props: ['name', 'options', 'multiple', 'selected'],
    mounted: function(){
        let $select = $(this.$el);
        $select.select2({
            closeOnSelect: false,
            width: '100%'
        });
        $select.val(this.selected).trigger('change');
    }
});