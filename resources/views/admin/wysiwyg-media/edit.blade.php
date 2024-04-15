@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.wysiwyg-media.actions.edit', ['name' => $wysiwygMedia->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <wysiwyg-media-form
                :action="'{{ $wysiwygMedia->resource_url }}'"
                :data="{{ $wysiwygMedia->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.wysiwyg-media.actions.edit', ['name' => $wysiwygMedia->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.wysiwyg-media.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </wysiwyg-media-form>

        </div>
    
</div>

@endsection