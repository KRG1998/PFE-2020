<template>
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light border-right shadow-sm" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading">Profile</div>
          <router-link to="/client/profile" class="nav-link text-secondary">
            <img
              style="height: 70px;width:70px;display:block;margin-left: auto;margin-right:auto"
              class="rounded-circle border-info img-thumbnail"
              :src="'../storage/clients_photos/'+client.photo"
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
                <router-link to="/client/profile" class="text-info" style="text-decoration:none;">
                  <h6 class="text-capitalize">{{user.first_name}} {{user.last_name}}</h6>
                </router-link>
              </span>
            </div>
          </div>
          <div class="sb-sidenav-menu-heading">Core</div>
          <a class="nav-link" href="index.html">
            <div class="sb-nav-link-icon text-info">
              <i class="fas fa-tachometer-alt"></i>
            </div>Dashboard
          </a>
          <div class="sb-sidenav-menu-heading">Add</div>
          <router-link to="/ads/create" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-plus-square fa-2x"></i>
              </span>
            </div>New ad
          </router-link>
          <div class="sb-sidenav-menu-heading">General</div>

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
              <i class="fas fa-align-justify"></i>
            </div>My ads
          </router-link>

          <router-link to="/ads/create" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-clipboard-check"></i>
              </span>
            </div>My evaluations
          </router-link>
          <router-link to="/ads/create" class="nav-link" href="index.html">
            <div class="sb-nav-link-icon">
              <span class="text-info">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
            </div>My Litigations
          </router-link>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  props: ["user"],
  name: "ClientSidebar",
  data() {
    return {
      exist: 0,
      client: {}
    };
  },
  created() {
    this.getClient();
    //console.log(this.client)
  },
  methods: {
    async getClient() {
      try {
        const response = await axios.get("/api/clients");
        this.clients = response.data.data;
        //console.log(this.clients)
        for (let i = 0; i < this.clients.length; i++) {
          if (this.clients[i].user_id == this.user.id) {
            this.client = this.clients[i];
            this.exist = 1;
            //console.log(this.client)
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    }
  }
};
</script>