import Vue from 'vue';

Vue.component('select-input', {
    template: `
    <select :data-placeholder="placeholder" v-if="multiple" multiple :name="name+'[]'">
        <option v-for="(key, val) in options" :value="val">{{key}}</option>
    </select>
    <select :data-placeholder="placeholder" v-else :name="name">
        <option v-for="(key, val) in options" :value="val">{{key}}</option>
    </select>
    `,
    props: ['name', 'options', 'multiple', 'selected', 'placeholder'],
    mounted: function(){
        let $select = $(this.$el);
        $select.chosen({
            width: "100%",
            allow_single_deselect: true,
            hide_results_on_select: false
        });
        $select.val(this.selected).trigger('chosen:updated');
    }
});