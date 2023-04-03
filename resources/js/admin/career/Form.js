import AppForm from '../app-components/Form/AppForm';

Vue.component('career-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_career:  '' ,
                
            }
        }
    }

});