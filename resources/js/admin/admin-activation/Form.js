import AppForm from '../app-components/Form/AppForm';

Vue.component('admin-activation-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                email:  '' ,
                token:  '' ,
                used:  false ,
                
            }
        }
    }

});