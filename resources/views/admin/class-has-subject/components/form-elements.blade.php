<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_group_selected'), 'has-success': fields.class_group_selected && fields.class_group_selected.valid }">
    <label for="class_group_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.class_group_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.class_group_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfClasses->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('class_group_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_group_selected') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_selected'), 'has-success': fields.subject_selected && fields.subject_selected.valid }">
    <label for="subject_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.subject_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.subject_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfSubjects->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('subject_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_selected') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('day'), 'has-success': fields.day && fields.day.valid }">
    <label for="day" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.day') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.day" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" :options="{{ $listOfDays }}" :multiple="false" :searchable="true" open-direction="bottom"></multiselect>
        <div v-if="errors.has('day')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('day') }}</div>
    </div>
</div>


