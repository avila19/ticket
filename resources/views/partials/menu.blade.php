<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @can('dashboard_access')
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-tachometer-alt text-light"></i>
                        Dashboard
                    </a>
                </li>
            @endcan
            @can('ticket_access')
                <li class="nav-item">
                    <a href="{{ route("admin.tickets.index") }}"
                       class="nav-link {{ request()->is('admin/tickets') || request()->is('admin/tickets/*') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt nav-icon text-danger"></i>
                        Solicitudes
                    </a>
                </li>
            @endcan
            @can('department_access')
                <li class="nav-item">
                    <a href="{{ route("admin.departments.index") }}"
                       class="nav-link {{ request()->is('admin/departments') || request()->is('admin/departments/*') ? 'active': ''}}">
                        <i class="fa-fw fas fa-building nav-icon text-muted"></i>
                        Dirección/Depart
                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon text-white"></i>
                        Admin Usuarios
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}"
                                   class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon"></i>
                                    Permisos
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}"
                                   class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon"></i>
                                    Roles
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}"
                                   class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon"></i>
                                    Usuarios
                                </a>
                            </li>
                        @endcan
                        @can('audit_log_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.audit-logs.index") }}"
                                   class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-file-alt nav-icon"></i>
                                    Auditoria Logs
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('status_access')
                <li class="nav-item">
                    <a href="{{ route("admin.statuses.index") }}"
                       class="nav-link {{ request()->is('admin/statuses') || request()->is('admin/statuses/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon"></i>
                        Estados
                    </a>
                </li>
            @endcan
            @can('priority_access')
                <li class="nav-item">
                    <a href="{{ route("admin.priorities.index") }}"
                       class="nav-link {{ request()->is('admin/priorities') || request()->is('admin/priorities/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon"></i>
                        Prioridades
                    </a>
                </li>
            @endcan
            @can('category_access')
                <li class="nav-item">
                    <a href="{{ route("admin.categories.index") }}"
                       class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-tags nav-icon"></i>
                        Categorías
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
</div>
