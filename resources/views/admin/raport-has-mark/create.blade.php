@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.raport-has-mark.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <raport-has-mark-form
            :action="'{{ url('admin/raport-has-marks') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.raport-has-mark.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.raport-has-mark.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </raport-has-mark-form>

        </div>

        </div>

    
@endsection