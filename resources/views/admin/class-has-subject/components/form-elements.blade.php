<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_group_id'), 'has-success': fields.class_group_id && fields.class_group_id.valid }">
    <label for="class_group_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-has-subject.columns.class_group_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.class_group_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('class_group_id'), 'form-control-success': fields.class_group_id && fields.class_group_id.valid}" id="class_group_id" name="class_group_id" placeholder="{{ trans('admin.class-has-subject.columns.class_group_id') }}">
        <div v-if="errors.has('class_group_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_group_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_id'), 'has-success': fields.subject_id && fields.subject_id.valid }">
    <label for="subject_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-has-subject.columns.subject_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.subject_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('subject_id'), 'form-control-success': fields.subject_id && fields.subject_id.valid}" id="subject_id" name="subject_id" placeholder="{{ trans('admin.class-has-subject.columns.subject_id') }}">
        <div v-if="errors.has('subject_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('day'), 'has-success': fields.day && fields.day.valid }">
    <label for="day" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-has-subject.columns.day') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.day" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('day'), 'form-control-success': fields.day && fields.day.valid}" id="day" name="day" placeholder="{{ trans('admin.class-has-subject.columns.day') }}">
        <div v-if="errors.has('day')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('day') }}</div>
    </div>
</div>


