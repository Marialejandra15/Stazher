<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_career'), 'has-success': fields.name_career && fields.name_career.valid }">
    <label for="name_career" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.career.columns.name_career') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_career" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_career'), 'form-control-success': fields.name_career && fields.name_career.valid}" id="name_career" name="name_career" placeholder="{{ trans('admin.career.columns.name_career') }}">
        <div v-if="errors.has('name_career')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_career') }}</div>
    </div>
</div>


