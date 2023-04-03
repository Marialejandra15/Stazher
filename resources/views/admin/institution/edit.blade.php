@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.institution.actions.edit', ['name' => $institution->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <institution-form
                :action="'{{ $institution->resource_url }}'"
                :data="{{ $institution->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.institution.actions.edit', ['name' => $institution->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.institution.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </institution-form>

        </div>
    
</div>

@endsection