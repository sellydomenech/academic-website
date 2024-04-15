import AppForm from '../app-components/Form/AppForm';

Vue.component('wysiwyg-media-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                file_path:  '' ,
                wysiwygable_id:  '' ,
                wysiwygable_type:  '' ,
                
            }
        }
    }

});