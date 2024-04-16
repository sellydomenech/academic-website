@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.class-has-subject.actions.edit', ['name' => $classHasSubject->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <class-has-subject-form
                :action="'{{ $classHasSubject->resource_url }}'"
                :data="{{ $classHasSubject->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.class-has-subject.actions.edit', ['name' => $classHasSubject->id]) }}
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