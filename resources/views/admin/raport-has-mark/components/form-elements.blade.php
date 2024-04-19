<div class="form-group row align-items-center" :class="{'has-danger': errors.has('raport_selected'), 'has-success': fields.raport_selected && fields.raport_selected.valid }">
    <label for="raport_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport_selected.columns.raport_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.raport_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfRaports }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('raport_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('raport_selected') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_selected'), 'has-success': fields.subject_selected && fields.subject_selected.valid }">
    <label for="subject_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.subject.columns.subject_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.subject_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfSubjects->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('subject_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_selected') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mark'), 'has-success': fields.mark && fields.mark.valid }">
    <label for="mark" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport-has-mark.columns.mark') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mark" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mark'), 'form-control-success': fields.mark && fields.mark.valid}" id="mark" name="mark" placeholder="{{ trans('admin.raport-has-mark.columns.mark') }}">
        <div v-if="errors.has('mark')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mark') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': fields.note && fields.note.valid }">
    <label for="note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport-has-mark.columns.note') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.note" v-validate="'required'" id="note" name="note"></textarea>
        </div>
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>


