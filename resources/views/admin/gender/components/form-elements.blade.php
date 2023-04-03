<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_gender'), 'has-success': fields.name_gender && fields.name_gender.valid }">
    <label for="name_gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gender.columns.name_gender') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_gender" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_gender'), 'form-control-success': fields.name_gender && fields.name_gender.valid}" id="name_gender" name="name_gender" placeholder="{{ trans('admin.gender.columns.name_gender') }}">
        <div v-if="errors.has('name_gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_gender') }}</div>
    </div>
</div>


