<template>
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <div class="sb-sidenav-menu-heading ">Profile</div>
              <a class="nav-link text-secondary" href="index.html">
                <img style="height: 100px;display:block;margin-left: auto;margin-right: auto" class="rounded-circle border-info img-thumbnail" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="profile photo"> 
              </a>
            <span style="text-align:center" class="text-center">
                <router-link to="/jobber/profile" class="nav-link" href="#">Name</router-link>
            </span>

              <div class="sb-sidenav-menu-heading ">Add</div>
              <router-link to="/offers/create" class="nav-link text-secondary" href="index.html">
                <div class="sb-nav-link-icon">
                  <span class="text-info">
                    <i class="fas fa-plus-square fa-2x"></i>
                  </span>
                </div>New Offer
              </router-link>
              <div class="sb-sidenav-menu-heading">General</div>
              <a class="nav-link text-secondary" href="charts.html">
                <div class="sb-nav-link-icon">
                    <span class="text-info">
                        <i class="fas fa-align-justify"></i>
                    </span>
                </div>My offers
              </a>
              <router-link to="/jobber/settings" class="nav-link text-secondary" href="tables.html">
                <div class="sb-nav-link-icon text-info">
                  <i class="fas fa-cog"></i>
                </div>Account settings
              </router-link>
            </div>
          </div>
          
        </nav>
      </div>
    
  
</template>
<script>
export default {
    name: 'JobberSidebar',
}
</script>