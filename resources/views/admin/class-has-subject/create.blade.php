@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.class-has-subject.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <class-has-subject-form
            :action="'{{ url('admin/class-has-subjects') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.class-has-subject.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.class-has-subject.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </class-has-subject-form>

        </div>

        </div>

    
@endsection