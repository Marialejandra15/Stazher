import AppForm from '../app-components/Form/AppForm';

Vue.component('institution-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                name_institution:  '' ,
                address_institution:  '' ,
                phone_institution:  '' ,
                
            }
        }
    }

});