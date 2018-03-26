import Vue from 'vue';
import $ from 'jquery';

export default Vue.component('date-picker', {
    template: `
    <input :value="value" :name="name" type="text" class="form-control input-sm">
    `,
    props: ['name', 'value', 'classes', 'start_date', 'end_date'],
    mounted: function () {
        let component = this;
        let el =
            $(this.$el).datepicker({
                startDate: this.start_date,
                endDate: this.end_date,
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayBtn: 'linked'
            }).on('changeDate', function(e){
                component.$emit('input', moment(e.date).format('YYYY-MM-DD'));
            });
    }
});