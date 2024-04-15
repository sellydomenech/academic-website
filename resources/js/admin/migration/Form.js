import AppForm from '../app-components/Form/AppForm';

Vue.component('migration-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                migration:  '' ,
                batch:  '' ,
                
            }
        }
    }

});