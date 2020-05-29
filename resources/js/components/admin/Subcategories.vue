<template>
  <main>
    <div class="row">
      <div class="col">
        <h3 class="text-secondary">Sub-Categories</h3>
      </div>
    </div>
    <table class="table">
      <thead class="border-0 bg-info text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col text-center"><span>Action</span></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="subcategory in subcategories" v-if="subcategory.category_id == categoryid">
          <th scope="row text-info">{{subcategory.id}}</th>
          <td class="text-capitalize">{{subcategory.name}}</td>
          <td>
            <a href="#" class="col text-danger" v-on:click="deleteSubcategory(subcategory.id)">
              <i class="far fa-trash-alt"></i>
            </a>
          </td>
        </tr>
      </tbody>
    </table>

  </main>
</template>
<script>
import CreateSubcategoryForm from './CreateSubcategoryForm'

export default {
  props: ["user", "id"],
  data() {
    return {
      categoryid: 0,
      subcategories: {}
    };
  },
  created() {
    this.getSubcategories();
  },
  methods: {
    async getSubcategories() {
      this.categoryid = this.id;
      try {
        const response = await axios.get("/api/subcategories");
        this.subcategories = response.data.data;
        console.log(this.subcategories);
      } catch (e) {
        // handle the authentication error here
      }
    },
    deleteSubcategory(id) {
      
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
          axios.delete("api/subcategories/" + id).then(response => {
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
     
    },

  }
};
</script>