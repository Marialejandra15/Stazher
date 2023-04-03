<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/areas') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.area.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/careers') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.career.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/genders') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.gender.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/institutions') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.institution.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/typeinstitutions') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.typeinstitution.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/modalities') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.modality.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
