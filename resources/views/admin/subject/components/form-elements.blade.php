<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_name'), 'has-success': fields.subject_name && fields.subject_name.valid }">
    <label for="subject_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.subject.columns.subject_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.subject_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('subject_name'), 'form-control-success': fields.subject_name && fields.subject_name.valid}" id="subject_name" name="subject_name" placeholder="{{ trans('admin.subject.columns.subject_name') }}">
        <div v-if="errors.has('subject_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_name') }}</div>
    </div>
</div>


