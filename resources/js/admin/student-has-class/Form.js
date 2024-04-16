import AppForm from '../app-components/Form/AppForm';

Vue.component('student-has-class-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                student_id:  '' ,
                class_group_id:  '' ,
                
            }
        }
    }

});