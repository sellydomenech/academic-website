@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.class-group.actions.edit', ['name' => $classGroup->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <class-group-form
                :action="'{{ $classGroup->resource_url }}'"
                :data="{{ $classGroup->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.class-group.actions.edit', ['name' => $classGroup->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.class-group.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </class-group-form>

        </div>
    
</div>

@endsection