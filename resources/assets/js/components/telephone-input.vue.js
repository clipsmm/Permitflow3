import Vue from 'vue';

Vue.component('intl-telephone-input', {
    template: `
    <input :value="value" type="tel" class="form-control input-sm">
`,
    props: ['value'],
    mounted: function () {
        $(this.$el).intlTelInput({
            nationalMode: false,
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                    let countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            separateDialCode: false,
            autoPlaceholder: "aggressive",
            formatOnDisplay: false,
            utilsScript: "/js/intl-tel-input-util.js"
        });
    }
});