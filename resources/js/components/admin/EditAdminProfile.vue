<template>
  <div class="container">
    <div class="card shadow border-0">
      <div class="card-header bg-white">
        <h4 class="float-left">Edit your profile</h4>
      </div>
      <div class="card-body">
        <form @submit.prevent="updateProfile" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="float-left">Birthday</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-birthday-cake"></i>
                    </span>
                  </div>
                  <input v-model="admin.birthday" type="date" class="form-control" />
                </div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <div class="row">
                  <label class="float-left">Gender</label>
                </div>
                <div class="row">
                  <div class="custom-control custom-radio">
                    <input
                      type="radio"
                      id="customRadio1"
                      name="customRadio"
                      class="custom-control-input"
                      value="male"
                      v-model="admin.gender"
                    />
                    <label class="custom-control-label" for="customRadio1">
                      <span style="color: Dodgerblue;">
                        <i class="fas fa-mars"></i>
                      </span>
                    </label>
                  </div>
                  <div class="custom-control custom-radio ml-5">
                    <input
                      type="radio"
                      id="customRadio2"
                      name="customRadio"
                      class="custom-control-input"
                      value="female"
                      v-model="admin.gender"
                    />
                    <label class="custom-control-label" for="customRadio2">
                      <span style="color:#ff1e9b">
                        <i class="fas fa-venus"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <button class="btn btn-info text-white float-right">
            <i class="fas fa-check"></i> Edit
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "EditClientProfile",
  props: ["user", "id"],

  data() {
    return {
      admin: {}
    };
  },
  async created() {
    try {
      const response = await axios.get("/api/admins/" + this.id);
      this.admin = response.data.data;
      console.log(this.admin);
    } catch (e) {
      // handle the authentication error here
    }
  },
  methods: {
    updateProfile() {
      axios.put("/api/admins/" + this.id, this.admin).then(response => {
        if (response.status === 200) {
          this.$swal
            .fire({
              icon: "success",
              title: "Success",
              text: "Profile Edited successfully!",
              time: 2000
            })
            .then(result => {
              window.location.reload();
            });
        }
      });
    }
  }
};
</script>