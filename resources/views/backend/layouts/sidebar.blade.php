<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink">
            </i>
        </div>
        <div class="sidebar-brand-text mx-3">AuraPay <sup>0.1</sup>
        </div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt">
            </i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading"> Operations </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true"
            aria-controls="users">
            <i class="fas fa-fw fa-users">
            </i>
            <span>Users</span>
        </a>
        <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">all auth user:</h6>
                <a class="collapse-item" href="{{ route('admin.admin') }}">Admin</a>
                <a class="collapse-item" href="#">Sub Admin</a>
                <a class="collapse-item" href="#">Users</a>
                <a class="collapse-item" href="#">Registration Request</a>
                <a class="collapse-item" href="#">All Profiles</a>
                {{-- <a class="collapse-item" href="#">Distributor</a>
                <a class="collapse-item" href="#">Agent</a> --}}
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#company_var"
            aria-expanded="true" aria-controls="company_var">
            <i class="fas fa-fw fa-cog">
            </i>
            <span>Company Variables</span>
        </a>
        <div id="company_var" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Required Parameters:</h6>
                <a class="collapse-item" href="buttons.html">Services</a>
                <a class="collapse-item" href="buttons.html">Operator </a>
                <a class="collapse-item" href="buttons.html">Imp. Driver Links</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#operationreports"
            aria-expanded="true" aria-controls="operationreports">
            <i class="fas fa-fw fa-wrench">
            </i>
            <span>Reports</span>
        </a>
        <div id="operationreports" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Reports:</h6>
                <a class="collapse-item" href="#">Users Report</a>
                <a class="collapse-item" href="#">Services Response Report</a>
                <a class="collapse-item" href="#">Service Usages Report</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading"> Website Content </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#allpages" aria-expanded="true"
            aria-controls="allpages">
            <i class="fas fa-fw fa-users">
            </i>
            <span>Pages</span>
        </a>
        <div id="allpages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Pages:</h6>
                <a class="collapse-item" href="#">Add New</a>
                <a class="collapse-item" href="#">All Pages</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menulocation"
            aria-expanded="true" aria-controls="menulocation">
            <i class="fas fa-fw fa-cog">
            </i>
            <span>Menu</span>
        </a>
        <div id="menulocation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Menu Area:</h6>
                <a class="collapse-item" href="buttons.html">All Location </a>
                <a class="collapse-item" href="buttons.html">All Menu </a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#generalsetting"
            aria-expanded="true" aria-controls="generalsetting">
            <i class="fas fa-fw fa-wrench">
            </i>
            <span>General Setting</span>
        </a>
        <div id="generalsetting" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Website Required Setting:</h6>
                <a class="collapse-item" href="#">Front Page</a>
                <a class="collapse-item" href="#">Social Media Links</a>
                <a class="collapse-item" href="#">Setting</a>
                <a class="collapse-item" href="#">SEO</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading"> Setup API & Tools </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#allapi"
            aria-expanded="true" aria-controls="allapi">
            <i class="fas fa-fw fa-users">
            </i>
            <span>All API</span>
        </a>
        <div id="allapi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">API Setting:</h6>
                <a class="collapse-item" href="#">API Manager</a>
                <a class="collapse-item" href="#">All API Response</a>
                <a class="collapse-item" href="#">Portal Setting</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#funds"
            aria-expanded="true" aria-controls="funds">
            <i class="fas fa-fw fa-cog">
            </i>
            <span>Funds</span>
        </a>
        <div id="funds" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Funding Services:</h6>
                <a class="collapse-item" href="buttons.html">Fund Request</a>
                <a class="collapse-item" href="buttons.html">Transfer/Return</a>
                <a class="collapse-item" href="buttons.html">Transaction Reports </a>
                <a class="collapse-item" href="buttons.html">Payment Gateways</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#comp_ticket"
            aria-expanded="true" aria-controls="comp_ticket">
            <i class="fas fa-fw fa-wrench">
            </i>
            <span>Complaint & Tickets</span>
        </a>
        <div id="comp_ticket" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Notification:</h6>
                <a class="collapse-item" href="#">All Tickets</a>
                <a class="collapse-item" href="#">Complaints </a>
                <a class="collapse-item" href="#">Feedback</a>
                <a class="collapse-item" href="#">Notice Board</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle">
        </button>
    </div>
    <!-- Sidebar Message -->

</ul>
