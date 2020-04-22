<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <div class="card shadow border-0">
          <div class="card-header">
            <h4 class="text-secondary">
              <i class="far fa-id-badge"></i> Complete your profile
            </h4>
          </div>
          <div class="card-body">
            <form @submit.prevent="postJobber" enctype="multipart/form-data">
              <div class="form-group">
                
                <label class="text-secondary" for="exampleInputPassword1">Photo</label><br>
                <span class="text-danger" role="alert" v-if="errors.photo">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.photo[0]}}
                      </span>
                <div class="col-md-3" v-if="photo">
                  <img :src="photo" style="height:150px;width:150px" class="img-thumbnail rounded mb-2"  />
                </div>
                <input
                  type="file"
                  v-on:change="onImageChange"
                  class="form-control"
                  v-bind:class="{ 'is-invalid ': errors.photo}"
                />
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="text-secondary" for="exampleInputPassword1">Birthday</label><br>
                    <span class="text-danger" role="alert" v-if="errors.birthday">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.birthday[0]}}
                      </span>
                    <input v-model="birthday" type="date" class="form-control form-control-sm" v-bind:class="{ 'is-invalid ': errors.birthday}" />
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="text-secondary" for="exampleInputPassword1">Gender</label><br>
                    <span class="text-danger" role="alert" v-if="errors.gender">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.gender[0]}}
                      </span>
                    <div class="row ml-4">
                      <div class="form-check col">
                        <input
                          v-model="gender"
                          class="form-check-input"
                          type="radio"
                          name="exampleRadios"
                          id="exampleRadios1"
                          value="male"
                          checked v-bind:class="{ 'is-invalid ': errors.gender}"
                        />
                        <label class="form-check-label" for="exampleRadios1">
                          <span style="color: Dodgerblue;">
                            <i class="fas fa-mars"></i>
                          </span>
                        </label>
                      </div>
                      <div class="form-check col">
                        <input
                          v-model="gender"
                          class="form-check-input"
                          type="radio"
                          name="exampleRadios"
                          id="exampleRadios2"
                          value="female" v-bind:class="{ 'is-invalid ': errors.gender}"
                        />
                        <label class="form-check-label" for="exampleRadios2">
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
                    <label class="text-secondary" for="exampleInputPassword1">Phone</label><br>
                    <span class="text-danger" role="alert" v-if="errors.phone">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.phone[0]}}
                      </span>
                    <input v-model="phone" type="tel" class="form-control form-control-sm" v-bind:class="{ 'is-invalid ': errors.phone}"/>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="text-secondary" for="exampleInputPassword1">Address</label><br>
                    <span class="text-danger" role="alert" v-if="errors.address">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.address[0]}}
                      </span>
                    <input v-model="address" type="text" class="form-control form-control-sm" v-bind:class="{ 'is-invalid ': errors.address}"/>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Description</label><br>
                <span class="text-danger" role="alert" v-if="errors.description">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.description[0]}}
                      </span>
                <textarea v-model="description" class="form-control form-control-sm" v-bind:class="{ 'is-invalid ': errors.description}"></textarea>
                <div class="invalid-feedback"></div>
              </div>

              <button class="btn btn-success float-right">
                <i class="fas fa-check"></i> Save
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col">
        <img
          class="img-thumbnail shadow rounded float-left bg-white"
          src="../../assets/images/profile.png"
          alt
        />
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["user"],
  data() {
    return {
      user_id: this.user.id,
      description: "",
      address: "",
      gender: "",
      birthday: "",
      phone: "",
      photo: null,
      errors: "",
      isLoading: false,
      errors:{},
    };
  },
  methods: {
    
        onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.photo = e.target.result;
                };
                reader.readAsDataURL(file);
            },
    async postJobber() {
      
      const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
      axios
        .post("http://localhost:8000/api/jobbers", this.$data)
        .then(response => {
          this.description = ''
          this.address = ''
          this.gender = ''
          this.birthday = ''
          this.phone = ''
          this.photo = ''
          config
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal.fire({
              icon: "success",
              title: "Success",
              text: "Profile completed successfully!",
              time:2000
            }).then(result => {
              this.$router.push({ path : '/client/profile' });
            });
          }
        })
        .catch(error => {
           
          // handle authentication and validation errors here
          this.errors = error.response.data.errors;
          console.log(this.errors.photo)
          this.isLoading = false;
        });
    }
  }
};
</script>