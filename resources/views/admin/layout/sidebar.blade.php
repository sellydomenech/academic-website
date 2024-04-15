<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/teachers') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.teacher.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/activations') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.activation.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-activations') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.admin-activation.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-password-resets') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.admin-password-reset.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/failed-jobs') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.failed-job.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/media') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.medium.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/migrations') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.migration.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/model-has-permissions') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.model-has-permission.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/model-has-roles') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.model-has-role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/password-reset-tokens') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.password-reset-token.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/personal-access-tokens') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.personal-access-token.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/role-has-permissions') }}"><i class="nav-icon icon-globe"></i> {{ trans('admin.role-has-permission.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/users') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.user.title') }}</a></li>
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
