<template>
  <main>
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light pr-5 border-bottom shadow-sm">
      <router-link to="/" class="navbar-brand" href="index.html">Logo</router-link>
      <button
        v-if="this.user.role == 'client'"
        class="btn btn-link btn-sm order-1 order-lg-0"
        id="sidebarToggle"
        href="#"
      >
        <i class="fas fa-bars"></i>
      </button>
      <!-- Navbar Search-->
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input
            class="form-control"
            type="text"
            placeholder="Search for..."
            aria-label="Search"
            aria-describedby="basic-addon2"
          />
          <div class="input-group-append">
            <button class="btn bg-primary text-white" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
      <!-- Navbar-->
      <router-link v-if="this.user.role == 'jobber'"
        to="/jobber/profile"
        class="navbar-nav ml-4 mr-4 text-secondary font-weight-bold nav-link"
        href="index.html"
      >Profile</router-link>
      <router-link
        to="/"
        class="navbar-nav ml-4 mr-4 text-secondary font-weight-bold nav-link"
        href="index.html"
      >Home</router-link>
      
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="userDropdown"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-comment"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.html">Logout</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="userDropdown"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-bell fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.html">Logout</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto ml-md-0 mr-5">
        <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            id="userDropdown"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fas fa-user fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="login.html">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
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
  methods: {
    UserRole: function() {
      return this.user.role;
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
</script>