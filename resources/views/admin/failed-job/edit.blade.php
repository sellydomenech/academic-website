@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.failed-job.actions.edit', ['name' => $failedJob->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <failed-job-form
                :action="'{{ $failedJob->resource_url }}'"
                :data="{{ $failedJob->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.failed-job.actions.edit', ['name' => $failedJob->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.failed-job.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </failed-job-form>

        </div>
    
</div>

@endsection