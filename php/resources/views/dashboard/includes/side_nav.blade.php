 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link " href="{{ url('/manage') }}">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->

         @if (Auth::user()->user_role == 2)
             <li class="nav-item">
                 <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-menu-button-wide"></i><span>Management Options</span><i
                         class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                     <li>
                         <a href="components-alerts.html">
                             <i class="bi bi-circle"></i><span>Manage Rewards</span>
                         </a>
                     </li>
                     <li>
                         <a href="components-alerts.html">
                             <i class="bi bi-circle"></i><span>Manage Savings Accounts</span>
                         </a>
                     </li>
                     <li>
                         <a href="components-alerts.html">
                             <i class="bi bi-circle"></i><span>Manage Users</span>
                         </a>
                     </li>
                     {{-- <li>
                         <a href="components-alerts.html">
                             <i class="bi bi-circle"></i><span>Manage Goals</span>
                         </a>
                     </li> --}}

                     <li>
                         <a href="components-alerts.html">
                             <i class="bi bi-circle"></i><span>Manage Articles</span>
                         </a>
                     </li>
                     <li>
                         <a href="components-alerts.html">
                             <i class="bi bi-circle"></i><span>Manage Financial Tips</span>
                         </a>
                     </li>



                 </ul>
             </li><!-- End Components Nav -->
         @endif

         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/notifications') }}">
                 <i class="bi bi-question-circle"></i>
                 <span>Notifications</span>
             </a>
         </li><!-- End F.A.Q Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/my-savings-account') }}">
                 <i class="bi bi-envelope"></i>
                 <span>My Savings Account</span>
             </a>
         </li><!-- End Contact Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-goals') }}">
                 <i class="bi bi-envelope"></i>
                 <span>My Goals</span>
             </a>
         </li><!-- End Contact Page Nav -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-goal-savings-calculator') }}">
                 <i class="bi bi-envelope"></i>
                 <span>My Goals Savings Calculator</span>
             </a>
         </li><!-- End Contact Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-achievements') }}">
                 <i class="bi bi-card-list"></i>
                 <span>My Achievements</span>
             </a>
         </li><!-- End Register Page Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-rewards') }}">
                 <i class="bi bi-box-arrow-in-right"></i>
                 <span>My Rewards</span>
             </a>
         </li><!-- End Login Page Nav -->



         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-transactions') }}">
                 <i class="bi bi-file-earmark"></i>
                 <span>My Transactions</span>
             </a>
         </li><!-- End Blank Page Nav -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-articles') }}">
                 <i class="bi bi-file-earmark"></i>
                 <span>Articles</span>
             </a>
         </li>
         <li class="nav-item">
             <a class="nav-link collapsed" href="{{ url('/account-financial-tips') }}">
                 <i class="bi bi-dash-circle"></i>
                 <span>Financial Tips</span>
             </a>
         </li><!-- End Error 404 Page Nav -->

     </ul>

 </aside><!-- End Sidebar-->
