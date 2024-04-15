<div class="form-group row align-items-center" :class="{'has-danger': errors.has('permission_id'), 'has-success': fields.permission_id && fields.permission_id.valid }">
    <label for="permission_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.model-has-permission.columns.permission_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.permission_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('permission_id'), 'form-control-success': fields.permission_id && fields.permission_id.valid}" id="permission_id" name="permission_id" placeholder="{{ trans('admin.model-has-permission.columns.permission_id') }}">
        <div v-if="errors.has('permission_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('permission_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('model_type'), 'has-success': fields.model_type && fields.model_type.valid }">
    <label for="model_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.model-has-permission.columns.model_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.model_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('model_type'), 'form-control-success': fields.model_type && fields.model_type.valid}" id="model_type" name="model_type" placeholder="{{ trans('admin.model-has-permission.columns.model_type') }}">
        <div v-if="errors.has('model_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('model_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('model_id'), 'has-success': fields.model_id && fields.model_id.valid }">
    <label for="model_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.model-has-permission.columns.model_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.model_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('model_id'), 'form-control-success': fields.model_id && fields.model_id.valid}" id="model_id" name="model_id" placeholder="{{ trans('admin.model-has-permission.columns.model_id') }}">
        <div v-if="errors.has('model_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('model_id') }}</div>
    </div>
</div>


