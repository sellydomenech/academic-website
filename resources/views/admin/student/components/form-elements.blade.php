<div class="form-group row align-items-center" :class="{'has-danger': errors.has('first_name'), 'has-success': fields.first_name && fields.first_name.valid }">
    <label for="first_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.first_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.first_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('first_name'), 'form-control-success': fields.first_name && fields.first_name.valid}" id="first_name" name="first_name" placeholder="{{ trans('admin.student.columns.first_name') }}">
        <div v-if="errors.has('first_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('first_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('last_name'), 'has-success': fields.last_name && fields.last_name.valid }">
    <label for="last_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.last_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.last_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('last_name'), 'form-control-success': fields.last_name && fields.last_name.valid}" id="last_name" name="last_name" placeholder="{{ trans('admin.student.columns.last_name') }}">
        <div v-if="errors.has('last_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('last_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nick_name'), 'has-success': fields.nick_name && fields.nick_name.valid }">
    <label for="nick_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.nick_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nick_name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nick_name'), 'form-control-success': fields.nick_name && fields.nick_name.valid}" id="nick_name" name="nick_name" placeholder="{{ trans('admin.student.columns.nick_name') }}">
        <div v-if="errors.has('nick_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nick_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('registration_number'), 'has-success': fields.registration_number && fields.registration_number.valid }">
    <label for="registration_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.registration_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.registration_number" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('registration_number'), 'form-control-success': fields.registration_number && fields.registration_number.valid}" id="registration_number" name="registration_number" placeholder="{{ trans('admin.student.columns.registration_number') }}">
        <div v-if="errors.has('registration_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('registration_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gender'), 'has-success': fields.gender && fields.gender.valid }">
    <label for="gender" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.gender') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.gender" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gender'), 'form-control-success': fields.gender && fields.gender.valid}" id="gender" name="gender" placeholder="{{ trans('admin.student.columns.gender') }}">
        <div v-if="errors.has('gender')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gender') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('place_of_birth'), 'has-success': fields.place_of_birth && fields.place_of_birth.valid }">
    <label for="place_of_birth" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.place_of_birth') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.place_of_birth" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('place_of_birth'), 'form-control-success': fields.place_of_birth && fields.place_of_birth.valid}" id="place_of_birth" name="place_of_birth" placeholder="{{ trans('admin.student.columns.place_of_birth') }}">
        <div v-if="errors.has('place_of_birth')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('place_of_birth') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_of_birth'), 'has-success': fields.date_of_birth && fields.date_of_birth.valid }">
    <label for="date_of_birth" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.date_of_birth') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date_of_birth" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('date_of_birth'), 'form-control-success': fields.date_of_birth && fields.date_of_birth.valid}" id="date_of_birth" name="date_of_birth" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date_of_birth')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date_of_birth') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('address'), 'has-success': fields.address && fields.address.valid }">
    <label for="address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.address') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.address" v-validate="'required'" id="address" name="address"></textarea>
        </div>
        <div v-if="errors.has('address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.student.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <label for="status" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.status') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.status" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('status'), 'form-control-success': fields.status && fields.status.valid}" id="status" name="status" placeholder="{{ trans('admin.student.columns.status') }}">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('child'), 'has-success': fields.child && fields.child.valid }">
    <label for="child" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.child') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.child" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('child'), 'form-control-success': fields.child && fields.child.valid}" id="child" name="child" placeholder="{{ trans('admin.student.columns.child') }}">
        <div v-if="errors.has('child')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('child') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('number_of_children'), 'has-success': fields.number_of_children && fields.number_of_children.valid }">
    <label for="number_of_children" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.number_of_children') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.number_of_children" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('number_of_children'), 'form-control-success': fields.number_of_children && fields.number_of_children.valid}" id="number_of_children" name="number_of_children" placeholder="{{ trans('admin.student.columns.number_of_children') }}">
        <div v-if="errors.has('number_of_children')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('number_of_children') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('father_name'), 'has-success': fields.father_name && fields.father_name.valid }">
    <label for="father_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.father_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.father_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('father_name'), 'form-control-success': fields.father_name && fields.father_name.valid}" id="father_name" name="father_name" placeholder="{{ trans('admin.student.columns.father_name') }}">
        <div v-if="errors.has('father_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('father_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('father_occupation'), 'has-success': fields.father_occupation && fields.father_occupation.valid }">
    <label for="father_occupation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.father_occupation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.father_occupation" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('father_occupation'), 'form-control-success': fields.father_occupation && fields.father_occupation.valid}" id="father_occupation" name="father_occupation" placeholder="{{ trans('admin.student.columns.father_occupation') }}">
        <div v-if="errors.has('father_occupation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('father_occupation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('father_phone_number'), 'has-success': fields.father_phone_number && fields.father_phone_number.valid }">
    <label for="father_phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.father_phone_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.father_phone_number" v-validate="'numeric'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('father_phone_number'), 'form-control-success': fields.father_phone_number && fields.father_phone_number.valid}" id="father_phone_number" name="father_phone_number" placeholder="{{ trans('admin.student.columns.father_phone_number') }}">
        <div v-if="errors.has('father_phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('father_phone_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mother_name'), 'has-success': fields.mother_name && fields.mother_name.valid }">
    <label for="mother_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.mother_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mother_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mother_name'), 'form-control-success': fields.mother_name && fields.mother_name.valid}" id="mother_name" name="mother_name" placeholder="{{ trans('admin.student.columns.mother_name') }}">
        <div v-if="errors.has('mother_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mother_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mother_occupation'), 'has-success': fields.mother_occupation && fields.mother_occupation.valid }">
    <label for="mother_occupation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.mother_occupation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mother_occupation" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mother_occupation'), 'form-control-success': fields.mother_occupation && fields.mother_occupation.valid}" id="mother_occupation" name="mother_occupation" placeholder="{{ trans('admin.student.columns.mother_occupation') }}">
        <div v-if="errors.has('mother_occupation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mother_occupation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mother_phone_number'), 'has-success': fields.mother_phone_number && fields.mother_phone_number.valid }">
    <label for="mother_phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.mother_phone_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mother_phone_number" v-validate="'numeric'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mother_phone_number'), 'form-control-success': fields.mother_phone_number && fields.mother_phone_number.valid}" id="mother_phone_number" name="mother_phone_number" placeholder="{{ trans('admin.student.columns.mother_phone_number') }}">
        <div v-if="errors.has('mother_phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mother_phone_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('family_address'), 'has-success': fields.family_address && fields.family_address.valid }">
    <label for="family_address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.family_address') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.family_address" v-validate="''" id="family_address" name="family_address"></textarea>
        </div>
        <div v-if="errors.has('family_address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('family_address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('emergency_contact_name'), 'has-success': fields.emergency_contact_name && fields.emergency_contact_name.valid }">
    <label for="emergency_contact_name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.emergency_contact_name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.emergency_contact_name" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('emergency_contact_name'), 'form-control-success': fields.emergency_contact_name && fields.emergency_contact_name.valid}" id="emergency_contact_name" name="emergency_contact_name" placeholder="{{ trans('admin.student.columns.emergency_contact_name') }}">
        <div v-if="errors.has('emergency_contact_name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('emergency_contact_name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('emergency_contact_occupation'), 'has-success': fields.emergency_contact_occupation && fields.emergency_contact_occupation.valid }">
    <label for="emergency_contact_occupation" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.emergency_contact_occupation') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.emergency_contact_occupation" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('emergency_contact_occupation'), 'form-control-success': fields.emergency_contact_occupation && fields.emergency_contact_occupation.valid}" id="emergency_contact_occupation" name="emergency_contact_occupation" placeholder="{{ trans('admin.student.columns.emergency_contact_occupation') }}">
        <div v-if="errors.has('emergency_contact_occupation')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('emergency_contact_occupation') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('emergency_contact_phone_number'), 'has-success': fields.emergency_contact_phone_number && fields.emergency_contact_phone_number.valid }">
    <label for="emergency_contact_phone_number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.emergency_contact_phone_number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.emergency_contact_phone_number" v-validate="'numeric'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('emergency_contact_phone_number'), 'form-control-success': fields.emergency_contact_phone_number && fields.emergency_contact_phone_number.valid}" id="emergency_contact_phone_number" name="emergency_contact_phone_number" placeholder="{{ trans('admin.student.columns.emergency_contact_phone_number') }}">
        <div v-if="errors.has('emergency_contact_phone_number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('emergency_contact_phone_number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('emergency_contact_address'), 'has-success': fields.emergency_contact_address && fields.emergency_contact_address.valid }">
    <label for="emergency_contact_address" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.emergency_contact_address') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.emergency_contact_address" v-validate="''" id="emergency_contact_address" name="emergency_contact_address"></textarea>
        </div>
        <div v-if="errors.has('emergency_contact_address')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('emergency_contact_address') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('registration_date'), 'has-success': fields.registration_date && fields.registration_date.valid }">
    <label for="registration_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.registration_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.registration_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('registration_date'), 'form-control-success': fields.registration_date && fields.registration_date.valid}" id="registration_date" name="registration_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('registration_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('registration_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_date'), 'has-success': fields.start_date && fields.start_date.valid }">
    <label for="start_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.start_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.start_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('start_date'), 'form-control-success': fields.start_date && fields.start_date.valid}" id="start_date" name="start_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('start_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('end_date'), 'has-success': fields.end_date && fields.end_date.valid }">
    <label for="end_date" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.student.columns.end_date') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.end_date" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('end_date'), 'form-control-success': fields.end_date && fields.end_date.valid}" id="end_date" name="end_date" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('end_date')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('end_date') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('class_group_selected'), 'has-success': fields.class_group_selected && fields.class_group_selected.valid }">
    <label for="class_group_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.class-group.columns.class_group_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.class_group_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfClasses->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('class_group_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('class_group_selected') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('admin_user_selected'), 'has-success': fields.admin_user_selected && fields.admin_user_selected.valid }">
    <label for="admin_user_selected" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.admin_user_selected.columns.admin_user_selected') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect v-model="form.admin_user_selected" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}" label="name" :options="{{ $listOfAdminUsers->toJson() }}" :multiple="false" :searchable="true"  track-by="id" open-direction="bottom"></multiselect>
        <div v-if="errors.has('admin_user_selected')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('admin_user_selected') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.student.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


