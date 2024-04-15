import AppForm from '../app-components/Form/AppForm';

Vue.component('failed-job-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                uuid:  '' ,
                connection:  '' ,
                queue:  '' ,
                payload:  '' ,
                exception:  '' ,
                failed_at:  '' ,
                
            }
        }
    }

});