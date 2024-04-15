import AppForm from '../app-components/Form/AppForm';

Vue.component('personal-access-token-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tokenable_type:  '' ,
                tokenable_id:  '' ,
                name:  '' ,
                token:  '' ,
                abilities:  '' ,
                last_used_at:  '' ,
                expires_at:  '' ,
                
            }
        }
    }

});