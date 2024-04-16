import AppForm from '../app-components/Form/AppForm';

Vue.component('raport-has-mark-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                raport_id:  '' ,
                subject_id:  '' ,
                mark:  '' ,
                note:  '' ,
                
            }
        }
    }

});