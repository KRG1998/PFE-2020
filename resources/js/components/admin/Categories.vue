<template>
  <main>
    <h1 class="mt-4 text-secondary">Categories</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Categories</li>
    </ol>
<div class="row">
      <div class="col-2 w-25">
        <a href="#" v-on:click="showCreateModal()">
          <div
            id="button"
            style="background-color: #dae0e580;border-color:#dee2e6;height:200px;"
            class="card  text-center mb-2 shadow-sm"
          >
            <span style="color:#adb5bd;margin-top:55px">
              <i class="fas fa-plus fa-5x"></i>
            </span>
          </div>
        </a>
      </div>
       <div v-for="category in categories" :key="category.id" class="col-2">
        <div id="category" class="card shadow-sm" style="border-color:#dee2e6;height:200px">
          <div class="card-body p-0">
            <a href="#" v-on:click="showSubcategoriesModal(category.id)"><img class="w-100 h-100" :src="'../storage/categories_photos/'+category.photo" alt /></a>
                            <div class="text-secondary text-center text-capitalize"><em><strong>{{category.name}}</strong></em></div>

          </div>
          <div id="button" class="card-footer" style="background-color: #dae0e580;">
            <div class="row">
              <div class="col text-center">
                <div class="row">
                  <a href="#" class="col btn btn text-primary" v-on:click="showEditModal(category.id)">
                    <i class="far fa-edit"></i>
                  </a>
                  <a href="#" class="col btn text-danger" v-on:click="deleteCategory(category.id)">
                    <i class="far fa-trash-alt"></i>
                  </a>
                  <a href="#" class="col btn text-success" v-on:click="showCreateSubcategoryModal(category.id)">
                    <i class="fas fa-plus"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
    <b-modal ref="CreateCategorymodal" hide-footer hide-header>
      <CreateCategoryForm :user="user"></CreateCategoryForm>
    </b-modal>
    <b-modal ref="EditCategorymodal" hide-footer hide-header>
      <EditCategoryForm :user="user" :id="categoryid"></EditCategoryForm>
    </b-modal>
    <b-modal ref="Createsubcategorymodal" hide-footer hide-header>
      <CreateSubcategoryForm  :user="user" :id="categoryid"></CreateSubcategoryForm>
    </b-modal>
    <b-modal ref="Subcategoriesmodal" hide-footer hide-header>
      <Subcategories :user="user" :id="categoryid"></Subcategories>
    </b-modal>
  </main>
</template>
<script>
import CreateCategoryForm from "./CreateCategoryForm";
import EditCategoryForm from "./EditCategoryForm";
import CreateSubcategoryForm from './CreateSubcategoryForm'
import Subcategories from './Subcategories'
export default {
  props: ["user"],
  data() {
    return {
      categories: [],
      categoryid:"",
    };
  },
  components: {
    CreateCategoryForm,
    EditCategoryForm,
    CreateSubcategoryForm,
    Subcategories

  },
  created() {
    this.getCategories()
  },
  methods: {
    showCreateModal() {
      this.$refs["CreateCategorymodal"].show();
    },
    showEditModal(id) {
      this.categoryid=id;
      this.$refs["EditCategorymodal"].show();
    },
    showCreateSubcategoryModal(id) {
      this.categoryid=id;
      this.$refs["Createsubcategorymodal"].show();
    },
    showSubcategoriesModal(id) {
      this.categoryid=id;
      this.$refs["Subcategoriesmodal"].show();
    },
    async getCategories() {
      try {
        const response = await axios.get("/api/categories");
        this.categories = response.data.data;
        console.log(this.categories);
      } catch (e) {
        // handle the authentication error here
      }
    },
    deleteCategory(id) {
      
      this.$swal({
        title: "Are you sure?",

        text: "You won't be able to revert this!",

        type: "warning",
        icon: "warning",
        showCancelButton: true,

        confirmButtonColor: "#3085d6",

        cancelButtonColor: "#d33",

        confirmButtonText: "Yes, delete it!"
      }).then(result => {
        if (result.value) {
          axios.delete("api/categories/" + id).then(response => {
            this.result.splice(id, 1);
          });
          this.$swal(
            "Deleted!",

            "Your ad has been deleted.",

            "success"
          ).then(result => {
            location.reload();
          });
        }
        
      });
     
    }
  }
};
</script>
<style>
#button:hover {
  background-color: #6cb2eb38 !important;
}
</style>
