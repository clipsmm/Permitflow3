import Vue from 'vue';

module.exports = Vue.component('file-upload', {
    template: `
  <div>
  <template v-if="isInvalid()">
    <input type="hidden" :name="field" value="remove">
    <input :name="field" type="file" class="form-control-file form-control input-sm">
  </template>
  <template v-else>
    <input type="hidden" :name="field" :value="JSON.stringify(value)">
    <p class="form-control-static">{{ value.file_name }} (<a href="#" @click.prevent="value = \'remove\'">{{ label }}</a>)</p>\
  </template>
  </div>
  `,
    props: ["field", "_value", "removeLabel", "val"],
    data: function () {
        return {
            value: this._value || this.val,
            label: this.removeLabel || "Remove"
        }
    },
    methods: {
        /*
         * Whether the value is invalid
         *
         * When an error is returned by the server, the value will contain an empty string or an object with
         * path, filename and content_type
         */
        isInvalid: function () {
            return !this.value || (this.value && (this.value == 'remove' || !!this.value.path))
        }
    }
});
