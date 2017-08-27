import Vue from 'vue';
export default Vue.component('e-visa-application-form', {
    props: ['returning_to_country', 'denied_entry_before', 'denied_entry_others',
        'convicted_before', 'other_recent_visits', 'recent_visits', 'places_to_visit',
        'form_errors', 'travel_reason', 'arrival_by'],
    data: function(){
        return {
            returningToCountry: this.returning_to_country,
            deniedEntryBefore: this.denied_entry_before,
            deniedEntryOthers: this.denied_entry_others,
            convictedBefore: this.convicted_before,
            otherRecentVisits: this.other_recent_visits || [],
            recentVisits: this.recent_visits || [],
            placesToVisit: this.places_to_visit || [],
            travelReason: this.travel_reason,
            arrivalBy: this.arrival_by
        }
    }
});