<template>
  <div class="container-fluid">
    <h1 class="mt-4">My Ads</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="card bg-primary shadow border-0 text-white mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-1">
                <h4>
                  <i class="fab fa-creative-commons-by"></i>
                </h4>
              </div>
              <div class="col-8">
                <h5>Assigned</h5>
              </div>
              <div class="col-2">
                <h4>{{assigned}}</h4>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4 shadow border-0">
          <div class="row">
            <div class="card-body">
              <div class="row">
                <div class="col-1">
                  <h4>
                    <i class="fas fa-spinner"></i>
                  </h4>
                </div>
                <div class="col-8">
                  <h5>In progress</h5>
                </div>
                <div class="col-2">
                  <h4>{{inprogress}}</h4>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-success shadow border-0 text-white mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-1">
                <h4>
                  <i class="fas fa-clipboard-check"></i>
                </h4>
              </div>
              <div class="col-8">
                <h5>Completed</h5>
              </div>
              <div class="col-2">
                <h4>{{completed}}</h4>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card bg-danger shadow borser-0 text-white mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-1">
                <h4>
                  <i class="fas fa-ban"></i>
                </h4>
              </div>
              <div class="col-8">
                <h5>Cancelled</h5>
              </div>
              <div class="col-2">
                <h4>{{cancelled}}</h4>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small text-white stretched-link" href="#">View Details</a>
            <div class="small text-white">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card mb-4">
      <div class="card-header">
        <i class="fas fa-table mr-1"></i>Ad's Table
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>Title</th>
                <th>Category</th>
                <th>Sub-category</th>
                <th>Description</th>
                <th>date</th>
                <th>Amount</th>
                <th>State</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="ad in ads" v-if="ad.client_id == user.id">
                <td>{{ad.title}}</td>
                <td>{{ad.category}}</td>
                <td>{{ad.subcategory}}</td>
                <td>{{ad.description}}</td>
                <td>{{ad.date}}</td>
                <td>{{ad.amount}}</td>
                <td class="text-center">
                  <span class="btn btn-primary" v-if="ad.state == 'assigned'">{{ad.state}}</span>
                  <span class="btn btn-canceled" v-if="ads.state == 'completed'">{{ad.state}}</span>
                  <span class="btn btn-danger" v-if="ad.state == 'canceled'">{{ad.state}}</span>
                  <span class="btn btn-warning" v-if="ad.state == 'inprogress'">{{ad.state}}</span>
                  <span class="btn btn-secondary" v-if="ad.state == 'published'">{{ad.state}}</span>
                </td>
                <td class="text-center">
                  <a href="#" class="text-secondary m-2">
                    <i class="fas fa-eye"></i>
                  </a>
                  <a href="#" class="text-primary m-2">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="#" class="text-danger m-2" v-on:click="deleteAd(ad.id)">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["user"],
  data() {
    return {
      ads: [],
      clientAds: [],
      pagination: {},
      cancelled: 0,
      completed: 0,
      assigned: 0,
      inprogress: 0
    };
  },

  created() {
    this.getAds();
  },

  methods: {
    async getAds() {
      try {
        const response = await axios.get("/api/ads");
        this.ads = response.data.data;
        for (let i = 0; i < this.ads.length; i++) {
          if (this.ads[i].client_id == this.user.id) {
            this.clientAds = this.ads[i];
            console.log(this.clientAds);
          }
        }
        for (let i = 0; i < this.ads.length; i++) {
          if (this.ads[i].state == "cancelled") {
            this.cancelled++;
            console.log(this.cancelled);
          }
          if (this.ads[i].state == "assigned") {
            this.assigned++;
            console.log(this.assigned);
          }
          if (this.ads[i].state == "completed") {
            this.completed++;
            console.log(this.completed);
          }
          if (this.ads[i].state == "inprogress") {
            this.inprogress++;
            console.log(this.inprogress);
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    },

    deleteAd(id) {
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
          axios.delete("api/ads/" + id).then(response => {
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