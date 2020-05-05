<template>
  <div class="container">

     
        <div class="card shadow border-0">
          <div class="card-header bg-white">
            <h4 class="float-left">
              Edit your profile
            </h4>
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
                  <input
                    v-model="client.birthday"
                    type="date"
                    class="form-control"
                  />
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
                      v-model="client.gender"
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
                      value="female" v-model="client.gender"
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
              <div class="row">
                <div class="col">
                  <div class="form-group">
                <label class="float-left" for="exampleInputPassword1">Phone</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-phone"></i>
                    </span>
                  </div>
                  <input
                    v-model="client.phone"
                    type="tel"
                    class="form-control"
                    placeholder="Phone"
                    
                    aria-describedby="basic-addon1"
                    
                  />
                 
                </div>
              </div>
                </div>
                <div class="col">
                  <div class="form-group">
                <label class="float-left" for="exampleInputPassword1">Address</label>
                <br />

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                      <i class="fas fa-home"></i>
                    </span>
                  </div>
                  <input
                    v-model="client.address"
                    type="text"
                    class="form-control"
                    placeholder="Address"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                  />
                </div>
              </div>
                </div>
              </div>
              <div class="form-group">
                <label class="float-left">Description</label>
                <textarea v-model="client.description" class="form-control form-control-sm"></textarea>
                <div class="invalid-feedback"></div>
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
  name:"EditClientProfile",
  props: ["user","id"],

  data() {
    return {
      client: {}
    };
  },
  async created() {
    try {
      const response = await axios.get("/api/clients/" + this.id);
      this.client = response.data.data;
      console.log(this.client);
    } catch (e) {
      // handle the authentication error here
    }
  },
  methods: {
    updateProfile() {
      axios
        .put("/api/clients/" + this.id, this.client)
        .then(response => {
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