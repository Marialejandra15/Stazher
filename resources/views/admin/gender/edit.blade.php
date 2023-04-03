@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.gender.actions.edit', ['name' => $gender->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <gender-form
                :action="'{{ $gender->resource_url }}'"
                :data="{{ $gender->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.gender.actions.edit', ['name' => $gender->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.gender.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </gender-form>

        </div>
    
</div>

@endsection