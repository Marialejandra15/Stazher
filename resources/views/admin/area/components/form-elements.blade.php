<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name_area'), 'has-success': fields.name_area && fields.name_area.valid }">
    <label for="name_area" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.area.columns.name_area') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name_area" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name_area'), 'form-control-success': fields.name_area && fields.name_area.valid}" id="name_area" name="name_area" placeholder="{{ trans('admin.area.columns.name_area') }}">
        <div v-if="errors.has('name_area')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name_area') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('manager'), 'has-success': fields.manager && fields.manager.valid }">
    <label for="manager" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.area.columns.manager') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.manager" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('manager'), 'form-control-success': fields.manager && fields.manager.valid}" id="manager" name="manager" placeholder="{{ trans('admin.area.columns.manager') }}">
        <div v-if="errors.has('manager')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('manager') }}</div>
    </div>
</div>


