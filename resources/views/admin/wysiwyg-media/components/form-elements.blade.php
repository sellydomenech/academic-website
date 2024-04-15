<div class="form-group row align-items-center" :class="{'has-danger': errors.has('file_path'), 'has-success': fields.file_path && fields.file_path.valid }">
    <label for="file_path" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wysiwyg-media.columns.file_path') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.file_path" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('file_path'), 'form-control-success': fields.file_path && fields.file_path.valid}" id="file_path" name="file_path" placeholder="{{ trans('admin.wysiwyg-media.columns.file_path') }}">
        <div v-if="errors.has('file_path')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('file_path') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wysiwygable_id'), 'has-success': fields.wysiwygable_id && fields.wysiwygable_id.valid }">
    <label for="wysiwygable_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wysiwyg-media.columns.wysiwygable_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wysiwygable_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wysiwygable_id'), 'form-control-success': fields.wysiwygable_id && fields.wysiwygable_id.valid}" id="wysiwygable_id" name="wysiwygable_id" placeholder="{{ trans('admin.wysiwyg-media.columns.wysiwygable_id') }}">
        <div v-if="errors.has('wysiwygable_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wysiwygable_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('wysiwygable_type'), 'has-success': fields.wysiwygable_type && fields.wysiwygable_type.valid }">
    <label for="wysiwygable_type" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.wysiwyg-media.columns.wysiwygable_type') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.wysiwygable_type" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('wysiwygable_type'), 'form-control-success': fields.wysiwygable_type && fields.wysiwygable_type.valid}" id="wysiwygable_type" name="wysiwygable_type" placeholder="{{ trans('admin.wysiwyg-media.columns.wysiwygable_type') }}">
        <div v-if="errors.has('wysiwygable_type')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('wysiwygable_type') }}</div>
    </div>
</div>


