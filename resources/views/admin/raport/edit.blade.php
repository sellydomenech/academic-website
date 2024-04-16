@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.raport.actions.edit', ['name' => $raport->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <raport-form
                :action="'{{ $raport->resource_url }}'"
                :data="{{ $raport->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.raport.actions.edit', ['name' => $raport->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.raport.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </raport-form>

        </div>
    
</div>

@endsection