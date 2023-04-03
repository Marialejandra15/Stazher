import AppForm from '../app-components/Form/AppForm';

Vue.component('typeinstitution-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                typeinstitution:  '' ,
                
            }
        }
    }

});