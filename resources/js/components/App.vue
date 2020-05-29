<template>
  <main>
    <nav
      class="sb-topnav navbar navbar-expand navbar-light bg-info pr-5 border-bottom  border-0"
    >
      <router-link to="/" class="navbar-brand text-white" href="index.html">Logo</router-link>
      <button class="btn btn-link btn-sm order-1 order-lg-0 text-white" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <div class="col">
        <div class="float-right mr-5">
          <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item ml-3 mr-2">
              <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item mt-3 mr-3">
                  <a
                    class="nav-link text-white"
                    id="userDropdown"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="far fa-bell"></i>
                  </a>
                </li>
                <li class="nav-item mt-3 mr-3">
                  <a
                    class="nav-link text-white"
                    id="userDropdown"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="far fa-comment"></i>
                  </a>
                </li>
                <li class="nav-item mt-2">
                  <form
                    class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"
                  >
                    <div class="input-group my-2">
                      <input
                        class="form-control border-white"
                        type="text"
                        placeholder="Search for..."
                        aria-label="Search"
                        aria-describedby="basic-addon2"
                      />
                      <div class="input-group-append">
                        <button class="btn bg-secondary text-white border-white" type="button">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="nav-item mr-5">
                  <a
                    v-if="user.role == 'client'"
                    class="nav-link text-white"
                    id="userDropdown"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <img
                    style="height:25px;width:25px"
                      class="rounded-circle"
                      v-if="exist == 1"
                      :src="'../storage/clients_photos/'+client.photo"
                      alt
                    />
                    <img
                    style="height:25px;width:25px"
                      class="rounded-circle"
                      v-else
                      src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                      alt
                    />
                    {{user.first_name}} {{user.last_name}}
                    <b-dropdown id="dropdown-left" variant="primary" class="m-2 text-white">
                      <b-dropdown-item href="#" ><i class="fas fa-cog"></i> Account seetings</b-dropdown-item>
                      <b-dropdown-item href="#"><i class="fas fa-sign-out-alt"></i> Logout</b-dropdown-item>
                    </b-dropdown>
                  </a>
                  
                  <a
                    v-if="user.role == 'jobber'"
                    class="nav-link text-white text-capitalize"
                    id="userDropdown"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <img
                    style="height:25px;width:25px"
                      class="rounded-circle"
                      v-if="exist == 1"
                      :src="'../storage/clients_photos/'+jobber.photo"
                      alt
                    />
                    <img
                    style="height:25px;width:25px"
                      class="rounded-circle"
                      v-else
                      src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                      alt
                    />
                    {{user.first_name}} {{user.last_name}}
                    <b-dropdown id="dropdown-left" variant="primary" class="m-2 text-white">
                      <b-dropdown-item href="#" ><i class="fas fa-cog"></i> Account seetings</b-dropdown-item>
                      <b-dropdown-item href="#"><i class="fas fa-sign-out-alt"></i> Logout</b-dropdown-item>
                    </b-dropdown>
                  </a>
                  
                  <a
                    v-if="user.role == 'admin'"
                    class="nav-link text-white text-capitalize"
                    id="userDropdown"
                    href="#"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <img
                      style="height:25px;width:25px"
                      class="rounded-circle"
                      v-if="exist == 1"
                      :src="'../storage/admins_photos/'+admin.photo"
                      alt
                    />
                    <img
                      style="height:25px;width:25px"
                      class="rounded-circle"
                      v-else
                      src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                      alt
                    />
                    {{user.first_name}} {{user.last_name}}
                    <b-dropdown id="dropdown-left" variant="primary" class="m-2 text-white">
                      <b-dropdown-item href="#" ><i class="fas fa-cog"></i> Account seetings</b-dropdown-item>
                      <b-dropdown-item href="#"><i class="fas fa-sign-out-alt"></i> Logout</b-dropdown-item>
                    </b-dropdown>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div v-if="this.user.role == 'admin'" id="layoutSidenav">
      <ClientSidebar :user="this.user" v-if="this.user.role == 'client' "></ClientSidebar>
      <AdminSidebar :user="this.user" v-if="this.user.role == 'admin'"></AdminSidebar>
      <div class id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <router-view :user="this.user"></router-view>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; Your Website 2019</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <div v-if="this.user.role == 'client'" id="layoutSidenav">
      <ClientSidebar :user="this.user" v-if="this.user.role == 'client' "></ClientSidebar>
      <AdminSidebar :user="this.user" v-if="this.user.role == 'admin'"></AdminSidebar>
      <div class id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <router-view :user="this.user"></router-view>
          </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
              <div class="text-muted">Copyright &copy; Your Website 2019</div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <router-view v-if="this.user.role == 'jobber'" :user="this.user"></router-view>
  </main>
</template>
<script>
import ClientSidebar from "./client/ClientSidebar";
import JobberSidebar from "./jobber/JobberSidebar";
import AdminSidebar from "./admin/AdminSidebar";
export default {
  name: "App",
  props: ["user"],
  data() {
    return {
      exist: 0
    };
  },
    created() {
    this.getClient();
    this.getAdmin();
    //console.log(this.client)
  },
  methods: {
    UserRole: function() {
      return this.user.role;
    },
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
    },
    async getAdmin() {
      try {
        const response = await axios.get("/api/admins");
        this.admins = response.data.data;
        //console.log(this.admins)
        for (let i = 0; i < this.clients.length; i++) {
          if (this.admins[i].user_id == this.user.id) {
            this.admin = this.admins[i];
            this.exist = 1;
            //console.log(this.client)
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    }
  },
  mounted() {
    window.axios.interceptors.request.use(config => {
      config.data = {
        ...config.data,
        api_token: this.user.api_token
      };
      return config;
    });
  },
  components: {
    ClientSidebar,
    JobberSidebar,
    AdminSidebar
  }
};
$(".dropdown-toggle").dropdown();
</script>