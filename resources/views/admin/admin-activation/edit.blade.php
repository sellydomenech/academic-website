@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.admin-activation.actions.edit', ['name' => $adminActivation->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <admin-activation-form
                :action="'{{ $adminActivation->resource_url }}'"
                :data="{{ $adminActivation->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.admin-activation.actions.edit', ['name' => $adminActivation->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.admin-activation.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </admin-activation-form>

        </div>
    
</div>

@endsection