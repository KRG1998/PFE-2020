<template>
  <div class="container">
    <div class="row">
      <div class="col-8">
        <div class="card shadow-sm border-0">
          <div class="card-header">
            <h4 class="text-secondary">
              <i class="far fa-id-badge"></i> Edit your profile
            </h4>
          </div>
          <div class="card-body">
            <form @submit.prevent="updateProfile" enctype="multipart/form-data">
              
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label class="text-secondary" for="exampleInputPassword1">Birthday</label>
                    <input
                      v-model="client.birthday"
                      type="date"
                      class="form-control form-control-sm"
                    />
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="text-secondary" for="exampleInputPassword1">Gender</label>
                    <div class="row ml-4">
                      <div class="form-check col">
                        <input
                          v-model="client.gender"
                          class="form-check-input"
                          type="radio"
                          name="exampleRadios"
                          id="exampleRadios1"
                          value="male"
                          checked
                        />
                        <label class="form-check-label" for="exampleRadios1">
                          <span style="color: Dodgerblue;">
                            <i class="fas fa-mars"></i>
                          </span>
                        </label>
                      </div>
                      <div class="form-check col">
                        <input
                          v-model="client.gender"
                          class="form-check-input"
                          type="radio"
                          name="exampleRadios"
                          id="exampleRadios2"
                          value="female"
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
                    <label class="text-secondary" for="exampleInputPassword1">Phone</label>
                    <input v-model="client.phone" type="tel" class="form-control form-control-sm" />
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label class="text-secondary" for="exampleInputPassword1">Address</label>
                    <input
                      v-model="client.address"
                      type="text"
                      class="form-control form-control-sm"
                    />
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Description</label>
                <textarea v-model="client.description" class="form-control form-control-sm"></textarea>
                <div class="invalid-feedback"></div>
              </div>

              <button class="btn btn-success float-right">
                <i class="fas fa-check"></i> Edit
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="col">
        <img
          class="img-thumbnail shadow-sm rounded float-left bg-white"
          src="../../assets/images/Edit.png"
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
      client: {}
    };
  },
  async created() {
    try {
      const response = await axios.get("/api/clients/" + this.$route.params.id);
      this.client = response.data.data;
      console.log(this.client);
    } catch (e) {
      // handle the authentication error here
    }
  },
  methods: {
    updateProfile() {
      axios
        .put("/api/clients/" + this.$route.params.id, this.client)
        .then(response => {
          this.$router.push({ name: "ClientProfile" });
        });
    }
  }
};
</script>