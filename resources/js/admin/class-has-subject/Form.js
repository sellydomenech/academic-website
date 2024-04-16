import AppForm from '../app-components/Form/AppForm';

Vue.component('class-has-subject-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                class_group_id:  '' ,
                subject_id:  '' ,
                day:  '' ,
                
            }
        }
    }

});