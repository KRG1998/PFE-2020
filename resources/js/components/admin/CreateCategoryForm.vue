<template>
  <main>
    <div class="row  text-secondary pr-2">
      <div class="col text-center">
        <span class="p-2"><i class="fas fa-th fa-3x"></i></span> <i class="fas fa-plus"></i>
      </div>
    </div>
    <hr>
    <form @submit.prevent="postCategory" enctype="multipart/form-data">
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
      <div class="form-group row">
        <label class="float-left col-2">Photo</label>
        <div class="col-md-3" v-if="photo">
          <img :src="photo" style="height:150px;width:150px" class="img-thumbnail rounded mb-2" />
        </div>
        <div class="input-group col-10">
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
        <div class="col-2"></div>
        <span class="text-danger col-10" role="alert" v-if="errors.photo">
          <i class="fas fa-exclamation-triangle"></i>
          {{errors.photo[0]}}
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

  name: "CreateCategoryForm",
  props: ["user"],
  data() {
    return {
        user_id: this.user.id,
      name: "",
      photo: "",
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
    async postCategory() {
      this.user_id = this.user.id;
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post("http://localhost:8000/api/categories/", this.$data)
        .then(response => {
          this.name = "";
          this.photo = "";
          this.user_id="";
          config;
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Category added successfully!",
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