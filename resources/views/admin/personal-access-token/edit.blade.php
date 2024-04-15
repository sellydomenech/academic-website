@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.personal-access-token.actions.edit', ['name' => $personalAccessToken->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <personal-access-token-form
                :action="'{{ $personalAccessToken->resource_url }}'"
                :data="{{ $personalAccessToken->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.personal-access-token.actions.edit', ['name' => $personalAccessToken->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.personal-access-token.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </personal-access-token-form>

        </div>
    
</div>

@endsection