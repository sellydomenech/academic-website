import AppForm from '../app-components/Form/AppForm';

Vue.component('class-group-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                class_name:  '' ,
                start_date:  '' ,
                end_date:  '' ,
                semester:  '' ,
                year_of_study:  '' ,
                teacher_id:  '' ,
                
            }
        }
    }

});