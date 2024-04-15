import AppForm from '../app-components/Form/AppForm';

Vue.component('model-has-permission-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                permission_id:  '' ,
                model_type:  '' ,
                model_id:  '' ,
                
            }
        }
    }

});