  <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>members/dashboard">
              <i class="ti-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-help-concept" aria-expanded="false" aria-controls="ui-help-concept">
              <i class="ti-layout-grid2-thumb menu-icon"></i>
              <span class="menu-title">Help Concept</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-help-concept">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>dashboard/help_concept">Manage Help Customers</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>dashboard/help_concept/add_help_concept">Add New Help Customer</a></li>
               
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-customers" aria-expanded="false" aria-controls="ui-customers">
              <i class="ti-comments-smiley menu-icon"></i>
              <span class="menu-title">Customers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-customers">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>customers/manage_customers">Manage Customers</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>customers/manage_defaulters">Manage Defaulters</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>customers/add_new_customer">Add New Customer</a></li>
               
              </ul>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-guarantors" aria-expanded="false" aria-controls="ui-guarantors">
              <i class="ti-star menu-icon"></i>
              <span class="menu-title">Guarantors</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-guarantors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>guarantors/manage_guarantors">Manage Guarantors</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>guarantors/add_new_guarantor">Add New Guarantor</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-personal" aria-expanded="false" aria-controls="ui-personal">
              <i class="ti-view-list menu-icon"></i>
              <span class="menu-title">Personal Loans </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-personal">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>personal_loans/manage_personal_loans"> Manage Personal Loans</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>personal_loans/new_personal_loans"> New Personal Loans</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-vehicle" aria-expanded="false" aria-controls="form-vehicle">
              <i class="ti-clipboard menu-icon"></i>
              <span class="menu-title">Vehicle Loans </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-vehicle">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>vehicle_loans/manage_vehicle_loans"> Manage Vehicle Loans</a></li>                
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>vehicle_loans/new_vehicle_loans"> New Vehicle Loans</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#expenses" aria-expanded="false" aria-controls="expenses">
              <i class="ti-eraser menu-icon"></i>
              <span class="menu-title"> Expenses </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="expenses">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>expenses/manage_expenses"> Manage Expenses</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>expenses/add_expenses"> Add Expenses</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#branches" aria-expanded="false" aria-controls="branches">
              <i class="ti-layout-accordion-list menu-icon"></i>
              <span class="menu-title"> Branches</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="branches">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>branches/manage_branches">  Manage Branches</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>branches/add_branch">  Add Branch</a></li>
               
              </ul>
            </div>
          </li> 

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="false" aria-controls="roles">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title"> Roles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>roles/roles_new">  New</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>roles/list">  List</a></li>
               
              </ul>
            </div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>login/logout">
              <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
                 
        </ul>
      </nav>