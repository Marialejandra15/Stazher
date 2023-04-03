import AppForm from '../app-components/Form/AppForm';

Vue.component('gender-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_gender:  '' ,
                
            }
        }
    }

});