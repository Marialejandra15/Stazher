<div class="form-group row align-items-center" :class="{'has-danger': errors.has('typeinstitution'), 'has-success': fields.typeinstitution && fields.typeinstitution.valid }">
    <label for="typeinstitution" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.typeinstitution.columns.typeinstitution') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.typeinstitution" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('typeinstitution'), 'form-control-success': fields.typeinstitution && fields.typeinstitution.valid}" id="typeinstitution" name="typeinstitution" placeholder="{{ trans('admin.typeinstitution.columns.typeinstitution') }}">
        <div v-if="errors.has('typeinstitution')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('typeinstitution') }}</div>
    </div>
</div>


