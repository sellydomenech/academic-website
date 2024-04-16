<div class="form-group row align-items-center" :class="{'has-danger': errors.has('student_id'), 'has-success': fields.student_id && fields.student_id.valid }">
    <label for="student_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.student_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.student_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('student_id'), 'form-control-success': fields.student_id && fields.student_id.valid}" id="student_id" name="student_id" placeholder="{{ trans('admin.raport.columns.student_id') }}">
        <div v-if="errors.has('student_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('student_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_group_id'), 'has-success': fields.class_group_id && fields.class_group_id.valid }">
    <label for="class_group_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.class_group_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.class_group_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('class_group_id'), 'form-control-success': fields.class_group_id && fields.class_group_id.valid}" id="class_group_id" name="class_group_id" placeholder="{{ trans('admin.raport.columns.class_group_id') }}">
        <div v-if="errors.has('class_group_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_group_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('given_in'), 'has-success': fields.given_in && fields.given_in.valid }">
    <label for="given_in" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.given_in') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.given_in" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('given_in'), 'form-control-success': fields.given_in && fields.given_in.valid}" id="given_in" name="given_in" placeholder="{{ trans('admin.raport.columns.given_in') }}">
        <div v-if="errors.has('given_in')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('given_in') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('signed_at'), 'has-success': fields.signed_at && fields.signed_at.valid }">
    <label for="signed_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.signed_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.signed_at" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('signed_at'), 'form-control-success': fields.signed_at && fields.signed_at.valid}" id="signed_at" name="signed_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('signed_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('signed_at') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('published'), 'has-success': fields.published && fields.published.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="published" type="checkbox" v-model="form.published" v-validate="''" data-vv-name="published"  name="published_fake_element">
        <label class="form-check-label" for="published">
            {{ trans('admin.raport.columns.published') }}
        </label>
        <input type="hidden" name="published" :value="form.published">
        <div v-if="errors.has('published')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('published') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('moral_religious'), 'has-success': fields.moral_religious && fields.moral_religious.valid }">
    <label for="moral_religious" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.moral_religious') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.moral_religious" v-validate="''" id="moral_religious" name="moral_religious"></textarea>
        </div>
        <div v-if="errors.has('moral_religious')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('moral_religious') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('social_emotion'), 'has-success': fields.social_emotion && fields.social_emotion.valid }">
    <label for="social_emotion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.social_emotion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.social_emotion" v-validate="''" id="social_emotion" name="social_emotion"></textarea>
        </div>
        <div v-if="errors.has('social_emotion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('social_emotion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('speaking'), 'has-success': fields.speaking && fields.speaking.valid }">
    <label for="speaking" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.speaking') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.speaking" v-validate="''" id="speaking" name="speaking"></textarea>
        </div>
        <div v-if="errors.has('speaking')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('speaking') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cognitive'), 'has-success': fields.cognitive && fields.cognitive.valid }">
    <label for="cognitive" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.cognitive') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.cognitive" v-validate="''" id="cognitive" name="cognitive"></textarea>
        </div>
        <div v-if="errors.has('cognitive')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cognitive') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('physical'), 'has-success': fields.physical && fields.physical.valid }">
    <label for="physical" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.physical') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.physical" v-validate="''" id="physical" name="physical"></textarea>
        </div>
        <div v-if="errors.has('physical')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('physical') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('art'), 'has-success': fields.art && fields.art.valid }">
    <label for="art" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.art') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.art" v-validate="''" id="art" name="art"></textarea>
        </div>
        <div v-if="errors.has('art')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('art') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sick'), 'has-success': fields.sick && fields.sick.valid }">
    <label for="sick" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.sick') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sick" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sick'), 'form-control-success': fields.sick && fields.sick.valid}" id="sick" name="sick" placeholder="{{ trans('admin.raport.columns.sick') }}">
        <div v-if="errors.has('sick')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sick') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('permission'), 'has-success': fields.permission && fields.permission.valid }">
    <label for="permission" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.permission') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.permission" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('permission'), 'form-control-success': fields.permission && fields.permission.valid}" id="permission" name="permission" placeholder="{{ trans('admin.raport.columns.permission') }}">
        <div v-if="errors.has('permission')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('permission') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('absence'), 'has-success': fields.absence && fields.absence.valid }">
    <label for="absence" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.absence') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.absence" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('absence'), 'form-control-success': fields.absence && fields.absence.valid}" id="absence" name="absence" placeholder="{{ trans('admin.raport.columns.absence') }}">
        <div v-if="errors.has('absence')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('absence') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('note'), 'has-success': fields.note && fields.note.valid }">
    <label for="note" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport.columns.note') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.note" v-validate="''" id="note" name="note"></textarea>
        </div>
        <div v-if="errors.has('note')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('note') }}</div>
    </div>
</div>


