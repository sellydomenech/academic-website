import AppForm from '../app-components/Form/AppForm';

Vue.component('model-has-role-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                role_id:  '' ,
                model_type:  '' ,
                model_id:  '' ,
                
            }
        }
    }

});