import AppForm from '../app-components/Form/AppForm';

Vue.component('admin-password-reset-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                email:  '' ,
                token:  '' ,
                
            }
        }
    }

});