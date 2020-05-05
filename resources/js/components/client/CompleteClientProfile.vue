<template>
  <div class="container">
    <div class="card shadow border-0">
      <div class="card-header bg-white">
        <h4 class="float-left">Complete your profile</h4>
      </div>
      <div class="card-body">
        <form @submit.prevent="postClient" enctype="multipart/form-data">
          <div class="form-group">
            <label class="float-left">Photo</label>
            <div class="col-md-3" v-if="photo">
              <img :src="photo" style="height:150px;width:150px" class="img-thumbnail rounded mb-2" />
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
              </div>
              <div class="custom-file">
                <input
                  type="file"
                  class="custom-file-input"
                  id="inputGroupFile01"
                  v-on:change="onImageChange"
                  v-bind:class="{ 'is-invalid ': errors.photo}"
                  aria-describedby="inputGroupFileAddon01"
                />
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
            <span class="text-danger" role="alert" v-if="errors.photo">
              <i class="fas fa-exclamation-triangle"></i>
              {{errors.photo[0]}}
            </span>
          </div>
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
                    v-model="birthday"
                    type="date"
                    class="form-control"
                    v-bind:class="{ 'is-invalid ': errors.birthday}"
                  />
                  <span class="text-danger" role="alert" v-if="errors.birthday">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{errors.birthday[0]}}
                  </span>
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
                      v-bind:class="{ 'is-invalid ': errors.gender}"
                      value="male"
                      v-model="gender"
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
                      v-bind:class="{ 'is-invalid ': errors.gender}"
                      value="female" v-model="gender"
                    />
                    <label class="custom-control-label" for="customRadio2">
                      <span style="color:#ff1e9b">
                        <i class="fas fa-venus"></i>
                      </span>
                    </label>
                  </div>
                  <span class="text-danger" role="alert" v-if="errors.gender">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{errors.gender[0]}}
                  </span>
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
                    v-model="phone"
                    type="tel"
                    class="form-control"
                    placeholder="Phone"
                    
                    aria-describedby="basic-addon1"
                    v-bind:class="{ 'is-invalid ': errors.phone}"
                  />
                  <span class="text-danger" role="alert" v-if="errors.phone">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{errors.phone[0]}}
                  </span>
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
                    v-bind:class="{ 'is-invalid ': errors.address}"
                    v-model="address"
                    type="text"
                    class="form-control"
                    placeholder="Address"
                    aria-label="Username"
                    aria-describedby="basic-addon1"
                  />
                  <span class="text-danger" role="alert" v-if="errors.address">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{errors.address[0]}}
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="float-left" for="exampleInputPassword1">Description</label>

            <textarea
              v-model="description"
              class="form-control form-control-sm"
              v-bind:class="{ 'is-invalid ': errors.description}"
            ></textarea>
            <span class="text-danger" role="alert" v-if="errors.description">
              <i class="fas fa-exclamation-triangle"></i>
              {{errors.description[0]}}
            </span>
          </div>

          <button class="btn btn-info text-white float-right">
            <i class="fas fa-check"></i> Save
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "CompleteClientProfile",
  props: ["user"],
  data() {
    return {
      user_id: "",
      description: "",
      address: "",
      gender: "",
      birthday: "",
      phone: "",
      photo: null,
      errors: "",
      isLoading: false,
      errors: {}
    };
  },
  methods: {
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      reader.onload = e => {
        this.photo = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    async postClient() {
      this.user_id = this.user.id;
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post("http://localhost:8000/api/clients", this.$data)
        .then(response => {
          this.description = "";
          this.address = "";
          this.gender = "";
          this.birthday = "";
          this.phone = "";
          this.photo = "";
          config;
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Profile completed successfully!",
                time: 2000
              })
              .then(result => {
                window.location.reload();
              });
          }
        })
        .catch(error => {
          // handle authentication and validation errors here
          this.errors = error.response.data.errors;
          console.log(this.errors.photo);
          this.isLoading = false;
        });
    }
  }
};
</script>