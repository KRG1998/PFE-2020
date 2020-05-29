<template>
  <main>
    <div class="row text-secondary pr-2">
      <div class="col text-center">
        <span class="p-2">
          <i class="fas fa-th fa-3x"></i>
        </span>
        <i class="fas fa-plus"></i>
      </div>
    </div>
    <hr />
    <form @submit.prevent="postSubcategory" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input v-model="name" type="text" class="form-control" id="inputPassword" />
        </div>
        <div class="col-2"></div>
        <span class="text-danger col-10" role="alert" v-if="errors.name">
          <i class="fas fa-exclamation-triangle"></i>
          {{errors.name[0]}}
        </span>
      </div>

      <div class="row">
        <div class="col">
          <button class="btn btn-info text-white float-right">
            <i class="fas fa-check"></i> Save
          </button>
        </div>
      </div>
    </form>
  </main>
</template>
<script>
export default {
  name: "CreateSubcategoryForm",
  props: ["user", "id"],
  data() {
    return {
      user_id: this.user.id,
      category_id: this.id,
      name: "",
      errors: {}
    };
  },
  methods: {
    async postSubcategory() {
      this.category_id = this.id;
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post("http://localhost:8000/api/subcategories/", this.$data)
        .then(response => {
          this.name = "";
          this.user_id = "";
          this.category_id = "";
          config;
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Sub-category added successfully!",
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