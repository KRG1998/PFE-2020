<template>
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light border-right bg-white" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Profile</div>
          <router-link to="/admin/profile" class="nav-link text-secondary">
            <img
              style="height: 70px;width:70px;display:block;margin-left: auto;margin-right:auto"
              class="rounded-circle border-info img-thumbnail"
              :src="'../storage/admins_photos/'+admin.photo"
              v-if="exist==1"
              alt="profile photo"
            />
            <img
              v-else
              style="height: 70px;width:70px;display:block;margin-left: auto;margin-right:auto"
              class="rounded-circle border-info img-thumbnail"
              src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
              alt="profile photo"
            />
          </router-link>
          <div class="row w-100">
            <div class="col">

              <span class="text-center text-secondary " style="display:block;margin-left: auto;margin-right: auto">
                Welcome, 
                <router-link to="/admin/profile" class="text-info" style="text-decoration:none;">
                  <h6 class="text-capitalize">{{user.first_name}} {{user.last_name}}</h6>
                </router-link>
              </span>
            </div>
          </div>
          <div class="ml-2 mt-4">
          <router-link to="/" class="nav-link " >
            <div class="sb-nav-link-icon text-info ">
              <i class="fas fa-tachometer-alt"></i>
            </div>Dashboard
          </router-link>
          <router-link
            to="/ads"
            class="nav-link collapsed"
            href="#"
            data-toggle="collapse"
            data-target="#collapseLayouts"
            aria-expanded="false"
            aria-controls="collapseLayouts"
          >
            <div class="sb-nav-link-icon text-info">
              <i class="fas fa-users"></i>
            </div>Users
          </router-link>
          <router-link to="/" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-credit-card"></i>
              </span>
            </div>Subscriptions
          </router-link>
          <router-link to="/categories" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-th"></i>
              </span>
            </div>Categories
          </router-link>
           <router-link to="/" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-ad"></i>
              </span>
            </div>Ads
          </router-link>
           <router-link to="/" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-hand-holding"></i>
              </span>
            </div>Offers
          </router-link>
          <router-link to="/" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-clipboard-check"></i>
              </span>
            </div>Evaluations
          </router-link>
          <router-link to="/" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            </div>Litigations
          </router-link>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  props: ["user"],
  name: "AdminSidebar",
  data() {
    return {
      exist: 0,
      admin: {}
    };
  },
  created() {
    this.getAdmin();
    //console.log(this.admin)
  },
  methods: {
    async getAdmin() {
      try {
        const response = await axios.get("/api/admins");
        this.admins = response.data.data;
        //console.log(this.admins)
        for (let i = 0; i < this.admins.length; i++) {
          if (this.admins[i].user_id == this.user.id) {
            this.admin = this.admins[i];
            this.exist = 1;
            //console.log(this.admin)
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    }
  }
};
</script>