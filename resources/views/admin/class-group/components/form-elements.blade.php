<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_name'), 'has-success': fields.class_name && fields.class_name.valid }">
    <label for="class_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.class_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.class_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('class_name'), 'form-control-success': fields.class_name && fields.class_name.valid}" id="class_name" name="class_name" placeholder="{{ trans('admin.class-group.columns.class_name') }}">
        <div v-if="errors.has('class_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_date'), 'has-success': fields.start_date && fields.start_date.valid }">
    <label for="start_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.start_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd'" class="flatpickr" :class="{'form-control-danger': errors.has('start_date'), 'form-control-success': fields.start_date && fields.start_date.valid}" id="start_date" name="start_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('start_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_date'), 'has-success': fields.end_date && fields.end_date.valid }">
    <label for="end_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.end_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_date" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd'" class="flatpickr" :class="{'form-control-danger': errors.has('end_date'), 'form-control-success': fields.end_date && fields.end_date.valid}" id="end_date" name="end_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('end_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('semester'), 'has-success': fields.semester && fields.semester.valid }">
    <label for="semester" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.semester') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.semester" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('semester'), 'form-control-success': fields.semester && fields.semester.valid}" id="semester" name="semester" placeholder="{{ trans('admin.class-group.columns.semester') }}">
        <div v-if="errors.has('semester')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('semester') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('year_of_study'), 'has-success': fields.year_of_study && fields.year_of_study.valid }">
    <label for="year_of_study" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.year_of_study') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.year_of_study" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('year_of_study'), 'form-control-success': fields.year_of_study && fields.year_of_study.valid}" id="year_of_study" name="year_of_study" placeholder="{{ trans('admin.class-group.columns.year_of_study') }}">
        <div v-if="errors.has('year_of_study')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('year_of_study') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('teacher_id'), 'has-success': fields.teacher_id && fields.teacher_id.valid }">
    <label for="teacher_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.teacher_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.teacher_id" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $teachers->toJson() }}" :multiple="false" :searchable="true"  track-by="teacher_id" :value="{{ $teacher_id }}" :selected="{{ $teacher_id}}" open-direction="bottom"></multiselect>
        <pre class="language-json"><code>{{ $teacher_id }}</code></pre>
        <div v-if="errors.has('teacher_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('teacher_id') }}</div>
    </div>
</div>


