@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.model-has-role.actions.edit', ['name' => $modelHasRole->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <model-has-role-form
                :action="'{{ $modelHasRole->resource_url }}'"
                :data="{{ $modelHasRole->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.model-has-role.actions.edit', ['name' => $modelHasRole->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.model-has-role.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </model-has-role-form>

        </div>
    
</div>

@endsection