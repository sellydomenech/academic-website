import AppForm from '../app-components/Form/AppForm';

Vue.component('teacher-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                first_name:  '' ,
                last_name:  '' ,
                nik:  '' ,
                date_of_birth:  '' ,
                phone_number:  '' ,
                address:  '' ,
                email:  '' ,
                registration_date:  '' ,
                enabled:  false ,
                
            }
        }
    }

});