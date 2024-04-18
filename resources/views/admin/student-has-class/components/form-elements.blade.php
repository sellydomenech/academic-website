<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_selected'), 'has-success': fields.student_selected && fields.student_selected.valid }">
    <label for="student_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student_selected.columns.student_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.student_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfStudents->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('student_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_selected') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_group_selected'), 'has-success': fields.class_group_selected && fields.class_group_selected.valid }">
    <label for="class_group_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.class_group_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.class_group_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfClasses->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('class_group_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_group_selected') }}</div>
    </div>
</div>