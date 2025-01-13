<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <form method="GET">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#property-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Property</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="property-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="aaddproperty.php">
              <i class="bi bi-circle"></i><span>Add Property</span>
            </a>
          </li>
          <li>
            <a href="property.php">
              <i class="bi bi-circle"></i><span>Manage Property</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#appointment-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="appointment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="viewappointment.php">
              <i class="bi bi-circle"></i><span>View Appointments</span>
            </a>
          </li>
          <li>
            <a href="yourappointment.php">
              <i class="bi bi-circle"></i><span>Manage Appointment</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#city-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>City</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="city-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="viewcity.php">
              <i class="bi bi-circle"></i><span>View City</span>
            </a>
          </li>
          <li>
            <a href="addcity.php">
              <i class="bi bi-circle"></i><span>Add City</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="viewcategory.php">
              <i class="bi bi-circle"></i><span>View Category</span>
            </a>
          </li>
          <li>
            <a href="addcategory.php">
              <i class="bi bi-circle"></i><span>Add Category</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a href="user.php ? id=seller ">
              <i class="bi bi-circle"></i><span>Seller</span>
            </a>
          </li>
          <li>
          <a href="user.php ? id=buyer ">
              <i class="bi bi-circle"></i><span>Buyer</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="contactus.php">
        <i class='bx bxs-message-detail'></i>
                  <span>Contact us</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" href="history.php">
          <i class="bi bi-grid"></i>
          <span>History</span>
        </a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      </form>
    </ul>
  </aside><!-- End Sidebar-->
