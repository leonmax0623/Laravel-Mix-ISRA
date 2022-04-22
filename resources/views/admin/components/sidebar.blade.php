<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->image->getThumbUrl(32, 32) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <div class="d-block text-white">{{ auth()->user()->full_name }}</div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <x-admin.sidebar.nav-tree title="{{ __('Orders') }}" icon="fas fa-tags" :items="$orders_items->toArray()"/>

                <x-admin.sidebar.nav-item title="{{ __('Callbacks') }}" route="admin.callbacks.index" icon="fas fa-phone"/>
                <x-admin.sidebar.nav-item title="{{ __('Task manager') }}" route="admin.task-manager" icon="fas fa-calendar-check"/>

                <x-admin.sidebar.nav-tree title="{{ __('Blog') }}" icon="fas fa-newspaper" :items="[
                    new \App\View\Components\Admin\Sidebar\NavItem('Articles', 'admin.blog.list', 'fas fa-chevron-right')
                ]"/>

                <x-admin.sidebar.nav-tree title="{{ __('Pages') }}" icon="fas fa-book" :items="[
                    new \App\View\Components\Admin\Sidebar\NavItem('Home', 'admin.pages.home', 'fas fa-chevron-right'),
                    new \App\View\Components\Admin\Sidebar\NavItem('FAQ', 'admin.pages.faq', 'fas fa-chevron-right'),
                    new \App\View\Components\Admin\Sidebar\NavItem('Testimonials', 'admin.pages.testimonials', 'fas fa-chevron-right')
                ]"/>

                <x-admin.sidebar.nav-tree title="{{ __('Users') }}" icon="fas fa-users" :items="[
                    new \App\View\Components\Admin\Sidebar\NavItem('All users', 'admin.users.list', 'fas fa-chevron-right')
                ]"/>

                <x-admin.sidebar.nav-tree title="{{ __('Catalog') }}" icon="fas fa-tags" :items="[
                    new \App\View\Components\Admin\Sidebar\NavItem('Services', 'admin.services.list', 'fas fa-chevron-right'),
                    new \App\View\Components\Admin\Sidebar\NavItem('Products', 'admin.order.products.list', 'fas fa-chevron-right'),
                    new \App\View\Components\Admin\Sidebar\NavItem('Virtual boxes', 'admin.virtual-box.list', 'fas fa-chevron-right'),
                    new \App\View\Components\Admin\Sidebar\NavItem('Branches', 'admin.branches.index', 'fas fa-chevron-right'),
                    new \App\View\Components\Admin\Sidebar\NavItem('Web Pages', 'admin.web-pages.index', 'fas fa-chevron-right')
                ]"/>

                <x-admin.sidebar.nav-item title="{{ __('Settings') }}" route="admin.settings" icon="fas fas fa-cogs"/>
                <x-admin.sidebar.nav-item title="{{ __('Prices') }}" route="admin.prices" icon="fas fas fa-coins"/>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
