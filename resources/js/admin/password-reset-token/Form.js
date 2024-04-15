import AppForm from '../app-components/Form/AppForm';

Vue.component('password-reset-token-form', {
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