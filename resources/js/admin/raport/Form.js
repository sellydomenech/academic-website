import AppForm from '../app-components/Form/AppForm';

Vue.component('raport-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                student_id:  '' ,
                class_group_id:  '' ,
                given_in:  '' ,
                signed_at:  '' ,
                published:  false ,
                moral_religious:  '' ,
                social_emotion:  '' ,
                speaking:  '' ,
                cognitive:  '' ,
                physical:  '' ,
                art:  '' ,
                sick:  '' ,
                permission:  '' ,
                absence:  '' ,
                note:  '' ,
                
            }
        }
    }

});