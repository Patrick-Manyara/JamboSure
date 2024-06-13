<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="<?= logo_url ?>" style="width:100px;">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="color:#fff;">Admin</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item <?= $page == "dashboard" ? "active" : "" ?>">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-item <?= $page == "writer" ? "active" : "" ?>">
            <a href="view_writers" class="menu-link">
                <i class="menu-icon fa-solid fa-umbrella"></i>
                <div data-i18n="Underwriters">Underwriters</div>
            </a>
        </li>
        
             <li class="menu-item">
            <a href="view_benefits" class="menu-link">
                <i class="menu-icon fa-solid fa-credit-card"></i>
                <div data-i18n="Benefits">Benefits</div>
            </a>
        </li>
   
        
        <li class="menu-item">
            <a href="view_prods" class="menu-link">
                <i class="menu-icon fa-solid fa-credit-card"></i>
                <div data-i18n="Products">Products</div>
            </a>
        </li>
        
        

        <li class="menu-item">
            <a href="view_claims" class="menu-link">
                <i class="menu-icon fa-regular fa-clipboard"></i>
                <div data-i18n="Claims">Claims</div>
            </a>
        </li>
        
      

        <li class="menu-item">
            <a href="view_users" class="menu-link">
                <i class="menu-icon fa-solid fa-user-group"></i>
                <div data-i18n="Customers">Customers</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="view_invoices" class="menu-link">
                <i class="menu-icon fa-solid fa-receipt"></i>
                <div data-i18n="Invoices">Invoices</div>
            </a>
        </li>

        <!-- <li class="menu-item">
            <a href="#" class="menu-link">
                <i class="menu-icon fa-solid fa-file-csv"></i>
                <div data-i18n="Reports">Reports</div>
            </a>
        </li> -->

        <li class="menu-item">
            <a href="test" class="menu-link">
                <i class="menu-icon fa-solid fa-users"></i>
                <div data-i18n="User Test">User Test</div>
            </a>
        </li>

        <!-- E-Registry -->
        <li class="menu-header small text-uppercase">
            <!-- <span class="menu-header-text">Users</span> -->
        </li>
        <li class="menu-item">
            <a href="edit_profile" class="menu-link">
                <i class="menu-icon fa-solid fa-gear"></i>
                <div data-i18n="Settings">Settings</div>
            </a>
        </li>

        <!--<li class="menu-item">-->
        <!--    <a href="#" class="menu-link">-->
        <!--        <i class="menu-icon fa-solid fa-circle-info"></i>-->
        <!--        <div data-i18n="Support">Support</div>-->
        <!--    </a>-->
        <!--</li>-->

        <li class="menu-item">
            <a href="?logout" class="menu-link">
                <i class="menu-icon fa-solid fa-right-from-bracket"></i>
                <div data-i18n="Logout">Logout</div>
            </a>
        </li>

    </ul>
</aside>