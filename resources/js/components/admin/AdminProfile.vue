<template>
  <main>
    <h1 class="mt-4 text-secondary">Profile</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Profile</li>
    </ol>
    <div class="row">
      <div class="col text-center">
        <div class="col ml-5 mr-5">
          <CompleteAdminProfile v-if="admin == 0" :user="user" />
          <EditAdminProfile v-else :user="user" :id="admin.id" />
        </div>
      </div>

      <div class="col">
        <div class="row">
          <div class="col ml-5 mr-5 main-section border-0 shadow text-center rounded">
            <div class="row border-0">
              <div class="col-lg-12 col-sm-12 col-12 profile-header bg-light rounded"></div>
            </div>
            <div class="row user-detail">
              <div class="col-lg-12 col-sm-12 col-12">
                <img
                  v-if="admin.photo"
                  :src="'../storage/admins_photos/'+admin.photo"
                  class="rounded-circle img-thumbnail"
                />
                <img
                  v-else
                  class="rounded-circle img-thumbnail"
                  src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                  alt="profile photo"
                />
                <h5 class="text-capitalize">{{user.first_name}} {{user.last_name}}</h5>

                <div class="row">
                  <div class="col" v-if="admin.address">
                    <span class="text-secondary mr-2">
                      <i class="fas fa-user-shield"></i>
                    </span>
                    Admin
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col text-center">
                    <span class="text-secondary mr-2">
                      <i class="fas fa-envelope"></i>
                    </span>
                    {{user.email}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script>
import CompleteAdminProfile from "./CompleteAdminProfile";
import EditAdminProfile from "./EditAdminProfile";
export default {
  components: {
    CompleteAdminProfile,
    EditAdminProfile
  },
  props: ["user"],
  data() {
    return {
      ads: [],
      cancelled: 0,
      completed: 0,
      assigned: 0,
      inprogress: 0,
      admin: 0,
      admins: [],
      cExist: 0
    };
  },
  created() {
    this.profileCompleted();
    //this.getAds();
  },

  methods: {
    async profileCompleted() {
      try {
        const response = await axios.get("/api/admins");
        this.admins = response.data.data;
        console.log(this.admins);
        for (let i = 0; i < this.admins.length; i++) {
          if (this.admins[i].user_id == this.user.id) {
            this.admin = this.admins[i];
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    }
  }
};
</script>
<style scoped>
.main-section {
  border: 1px solid #138496;
  background-color: #fff;
  width: 100%;
}
.profile-header {
  background-image: url("../../assets/images/bgprofile.png");
  background-size: cover;
  background-position: center;

  height: 150px;
}
.user-detail {
  margin: -50px 0px 30px 0px;
}
.user-detail img {
  height: 100px;
  width: 100px;
}
.user-detail h5 {
  margin: 15px 0px 5px 0px;
}
.user-social-detail {
  padding: 15px 0px;
}
.user-social-detail a i {
  font-size: 23px;
  padding: 0px 5px;
}
</style>