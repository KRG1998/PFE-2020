<template>
  <main>
    <div class="col text-center">
      <div class="row">
        <div class="col ml-5 text-secondary">
          <i class="fas fa-plus"></i>
        </div>
      </div>
      <div class="row text-secondary pr-2">
        <div class="col">
          <span class="p-2">
            <i class="fas fa-credit-card fa-3x"></i>
          </span>
        </div>
      </div>
    </div>
    <hr />
    <form @submit.prevent="postSubscription">
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label text-secondary">Name</label>
        <div class="col-sm-10">
          <input
            v-model="name"
            type="text"
            id="name"
            class="form-control"
            placeholder="Subscription name"
            v-bind:class="{ 'border-danger': errors.name}"
          />
          <div class="row">
            <div class="col-2"></div>
            <div class="col">
              <span class="text-danger" role="alert" v-if="errors.name">
                <i class="fas fa-exclamation-triangle"></i>
                {{errors.name[0]}}
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label text-secondary">Type</label>
        <div class="col-sm-10">
          <select class="custom-select" v-model="type" v-bind:class="{ 'is-invalid': errors.type}">
            <option selected>Select a type</option>
            <option value="basic">Basic</option>
            <option value="standart">Standart</option>
            <option value="premium">Premium</option>
          </select>
          <div class="row">
            <div class="col-2"></div>
            <div class="col">
              <span class="text-danger" role="alert" v-if="errors.type">
                <i class="fas fa-exclamation-triangle"></i>
                {{errors.type[0]}}
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="duration" class="col-sm-2 col-form-label text-secondary">Duration</label>
        <div class="col-sm-10">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="far fa-hourglass"></i>
              </div>
            </div>
            <input
              v-model="duration"
              type="text"
              class="form-control"
              id="duration"
              placeholder="Subscription duration"
              v-bind:class="{ 'is-invalid': errors.duration}"
            />
            
          </div>
          <div class="row">
              <div class="col-2"></div>
              <div class="col">
                <span class="text-danger" role="alert" v-if="errors.duration">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.duration[0]}}
                </span>
              </div>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="price" class="col-sm-2 col-form-label text-secondary">Price</label>
        <div class="col-sm-10">
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-euro-sign"></i>
              </div>
            </div>
            <input
              v-model="price"
              type="text"
              class="form-control"
              id="price"
              placeholder="Subscription price"
              v-bind:class="{ 'is-invalid': errors.price}"
            />
            
          </div>
          <div class="row">
              <div class="col-2"></div>
              <div class="col">
                <span class="text-danger" role="alert" v-if="errors.price">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.price[0]}}
                </span>
              </div>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="description" class="col-sm-2 col-form-label text-secondary">Description</label>
        <div class="col-sm-10">
          <textarea
            v-model="description"
            type="text"
            id="description"
            class="form-control"
            placeholder="Subscription description"
            v-bind:class="{ 'is-invalid': errors.description}"
          />
          <div class="row">
            <div class="col-2"></div>
            <div class="col">
              <span class="text-danger" role="alert" v-if="errors.description">
                <i class="fas fa-exclamation-triangle"></i>
                {{errors.description[0]}}
              </span>
            </div>
          </div>
        </div>
      </div>

      <button class="btn btn-info text-white float-right m-2">Add</button>
      <button type="reset" class="btn btn-secondary text-white float-right m-2">Cancel</button>
    </form>
  </main>
</template>
<script>
export default {
  props: ["user"],
  name: "CreateSubscriptionForm",
  data() {
    return {
      user_id: this.user.id,
      name: "",
      type: "",
      duration: "",
      price: "",
      price: "",
      description: "",
      errors: {}
    };
  },
  methods: {
    async postSubscription() {
      const config = {};
      axios
        .post("http://localhost:8000/api/subscriptions/", this.$data)
        .then(response => {
          this.name = "";
          this.user_id = "";
          this.type = "";
          this.duration = "";
          this.price = "";
          this.description = "";
          config;
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Subscription added successfully!",
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