<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tokenable_type'), 'has-success': fields.tokenable_type && fields.tokenable_type.valid }">
    <label for="tokenable_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.tokenable_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tokenable_type" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tokenable_type'), 'form-control-success': fields.tokenable_type && fields.tokenable_type.valid}" id="tokenable_type" name="tokenable_type" placeholder="{{ trans('admin.personal-access-token.columns.tokenable_type') }}">
        <div v-if="errors.has('tokenable_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tokenable_type') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tokenable_id'), 'has-success': fields.tokenable_id && fields.tokenable_id.valid }">
    <label for="tokenable_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.tokenable_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tokenable_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tokenable_id'), 'form-control-success': fields.tokenable_id && fields.tokenable_id.valid}" id="tokenable_id" name="tokenable_id" placeholder="{{ trans('admin.personal-access-token.columns.tokenable_id') }}">
        <div v-if="errors.has('tokenable_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tokenable_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.personal-access-token.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('token'), 'has-success': fields.token && fields.token.valid }">
    <label for="token" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.token') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.token" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('token'), 'form-control-success': fields.token && fields.token.valid}" id="token" name="token" placeholder="{{ trans('admin.personal-access-token.columns.token') }}">
        <div v-if="errors.has('token')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('token') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('abilities'), 'has-success': fields.abilities && fields.abilities.valid }">
    <label for="abilities" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.abilities') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.abilities" v-validate="''" id="abilities" name="abilities"></textarea>
        </div>
        <div v-if="errors.has('abilities')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('abilities') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_used_at'), 'has-success': fields.last_used_at && fields.last_used_at.valid }">
    <label for="last_used_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.last_used_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.last_used_at" :config="datetimePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('last_used_at'), 'form-control-success': fields.last_used_at && fields.last_used_at.valid}" id="last_used_at" name="last_used_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('last_used_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_used_at') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('expires_at'), 'has-success': fields.expires_at && fields.expires_at.valid }">
    <label for="expires_at" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.personal-access-token.columns.expires_at') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.expires_at" :config="datetimePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('expires_at'), 'form-control-success': fields.expires_at && fields.expires_at.valid}" id="expires_at" name="expires_at" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('expires_at')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('expires_at') }}</div>
    </div>
</div>


