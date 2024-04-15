@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.password-reset-token.actions.edit', ['name' => $passwordResetToken->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <password-reset-token-form
                :action="'{{ $passwordResetToken->resource_url }}'"
                :data="{{ $passwordResetToken->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.password-reset-token.actions.edit', ['name' => $passwordResetToken->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.password-reset-token.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </password-reset-token-form>

        </div>
    
</div>

@endsection