<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_modality'), 'has-success': fields.name_modality && fields.name_modality.valid }">
    <label for="name_modality" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.modality.columns.name_modality') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_modality" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_modality'), 'form-control-success': fields.name_modality && fields.name_modality.valid}" id="name_modality" name="name_modality" placeholder="{{ trans('admin.modality.columns.name_modality') }}">
        <div v-if="errors.has('name_modality')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_modality') }}</div>
    </div>
</div>


