@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.raport-has-mark.actions.edit', ['name' => $raportHasMark->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <raport-has-mark-form
                :action="'{{ $raportHasMark->resource_url }}'"
                :data="{{ $raportHasMark->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.raport-has-mark.actions.edit', ['name' => $raportHasMark->id]) }}
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