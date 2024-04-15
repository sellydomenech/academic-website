import AppForm from '../app-components/Form/AppForm';

Vue.component('activation-form', {
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