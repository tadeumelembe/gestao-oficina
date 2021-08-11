<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>


            <li>
                <a href="/home" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span>Resumo</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-user-fill"></i>
                    <span>Clientes</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('customers.singulars')}}">Sigular</a></li>
                    <li><a href="{{route('customers.companies')}}">Instituição</a></li>
                </ul>
            </li>

            <li>
                <a href="/cars" class=" waves-effect">
                    <i class="ri-car-fill"></i>
                    <span>Veículos</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-tools-fill"></i>
                    <span>Job Cards</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('jobs.create')}}">Novo job</a></li>
                    <li><a href="/jobs">Jobs</a></li>
                </ul>
            </li>


            @role('Admin')

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-account-group"></i>
                    <span>Funcionários</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('employees')}}">Todos</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('users.index')}}" class=" waves-effect">
                    <i class="ri-group-fill"></i>
                    <span>Usuários</span>
                </a>
            </li>

            <li>
                <a href="{{route('roles.index')}}" class=" waves-effect">
                    <i class="ri-lock-fill"></i>
                    <span>Previlégios</span>
                </a>
            </li>

           @endrole


        </ul>
    </div>
    <!-- Sidebar -->
</div>
