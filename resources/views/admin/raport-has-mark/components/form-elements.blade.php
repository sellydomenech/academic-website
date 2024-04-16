<div class="form-group row align-items-center" :class="{'has-danger': errors.has('raport_id'), 'has-success': fields.raport_id && fields.raport_id.valid }">
    <label for="raport_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport-has-mark.columns.raport_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.raport_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('raport_id'), 'form-control-success': fields.raport_id && fields.raport_id.valid}" id="raport_id" name="raport_id" placeholder="{{ trans('admin.raport-has-mark.columns.raport_id') }}">
        <div v-if="errors.has('raport_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('raport_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_id'), 'has-success': fields.subject_id && fields.subject_id.valid }">
    <label for="subject_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.raport-has-mark.columns.subject_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.subject_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('subject_id'), 'form-control-success': fields.subject_id && fields.subject_id.valid}" id="subject_id" name="subject_id" placeholder="{{ trans('admin.raport-has-mark.columns.subject_id') }}">
        <div v-if="errors.has('subject_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_id') }}</div>
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


