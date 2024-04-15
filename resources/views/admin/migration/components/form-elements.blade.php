<div class="form-group row align-items-center" :class="{'has-danger': errors.has('migration'), 'has-success': fields.migration && fields.migration.valid }">
    <label for="migration" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.migration.columns.migration') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.migration" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('migration'), 'form-control-success': fields.migration && fields.migration.valid}" id="migration" name="migration" placeholder="{{ trans('admin.migration.columns.migration') }}">
        <div v-if="errors.has('migration')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('migration') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('batch'), 'has-success': fields.batch && fields.batch.valid }">
    <label for="batch" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.migration.columns.batch') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.batch" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('batch'), 'form-control-success': fields.batch && fields.batch.valid}" id="batch" name="batch" placeholder="{{ trans('admin.migration.columns.batch') }}">
        <div v-if="errors.has('batch')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('batch') }}</div>
    </div>
</div>


