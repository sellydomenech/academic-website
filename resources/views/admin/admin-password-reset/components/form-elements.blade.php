<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-password-reset.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.admin-password-reset.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('token'), 'has-success': fields.token && fields.token.valid }">
    <label for="token" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin-password-reset.columns.token') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.token" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('token'), 'form-control-success': fields.token && fields.token.valid}" id="token" name="token" placeholder="{{ trans('admin.admin-password-reset.columns.token') }}">
        <div v-if="errors.has('token')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('token') }}</div>
    </div>
</div>


