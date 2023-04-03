<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_institution'), 'has-success': fields.name_institution && fields.name_institution.valid }">
    <label for="name_institution" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.institution.columns.name_institution') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_institution" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_institution'), 'form-control-success': fields.name_institution && fields.name_institution.valid}" id="name_institution" name="name_institution" placeholder="{{ trans('admin.institution.columns.name_institution') }}">
        <div v-if="errors.has('name_institution')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_institution') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address_institution'), 'has-success': fields.address_institution && fields.address_institution.valid }">
    <label for="address_institution" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.institution.columns.address_institution') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.address_institution" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('address_institution'), 'form-control-success': fields.address_institution && fields.address_institution.valid}" id="address_institution" name="address_institution" placeholder="{{ trans('admin.institution.columns.address_institution') }}">
        <div v-if="errors.has('address_institution')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address_institution') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('phone_institution'), 'has-success': fields.phone_institution && fields.phone_institution.valid }">
    <label for="phone_institution" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.institution.columns.phone_institution') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.phone_institution" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('phone_institution'), 'form-control-success': fields.phone_institution && fields.phone_institution.valid}" id="phone_institution" name="phone_institution" placeholder="{{ trans('admin.institution.columns.phone_institution') }}">
        <div v-if="errors.has('phone_institution')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('phone_institution') }}</div>
    </div>
</div>


