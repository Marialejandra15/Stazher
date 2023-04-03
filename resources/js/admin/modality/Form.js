import AppForm from '../app-components/Form/AppForm';

Vue.component('modality-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_modality:  '' ,
                
            }
        }
    }

});