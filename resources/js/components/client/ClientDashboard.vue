<template>
  <div class="container-fluid">
   
    <div class="row">
      <div class="col-xl-3 col-md-6">
        <div class="card shadow   mb-4">
          <div class="card-body">
            <div class="row">
              
              <div class="col-8">
                <div class="row"><div class="col text-center">Assigned</div></div>
                <div class="row"><div class="col text-center">{{assigned}}</div></div>
              </div>
              <div class="col-1">
                <span class="text-warning">
                  <i class="fab fa-creative-commons-by fa-3x"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small stretched-link" href="#">View Details</a>
            <div class="small">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card  mb-4 shadow ">
          <div class="row">
            <div class="card-body">
              <div class="row">
                
                <div class="col-8">
                <div class="row"><div class="col text-center">In progress</div></div>
                <div class="row"><div class="col text-center">{{inprogress}}</div></div>
              </div>
              <div class="col-1">
                  <span class="text-info">
                    <i class="fas fa-spinner fa-3x"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small stretched-link" href="#">View Details</a>
            <div class="small">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card shadow   mb-4">
          <div class="card-body">
            <div class="row">
              
              <div class="col-8">
                <div class="row"><div class="col text-center">Completed</div></div>
                <div class="row"><div class="col text-center">{{completed}}</div></div>
              </div>
              <div class="col-1">
                <span class="text-success">
                  <i class="fas fa-clipboard-check fa-3x"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small  stretched-link" href="#">View Details</a>
            <div class="small ">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="row">
              
              <div class="col-8">
                <div class="row"><div class="col text-center">Cancelled</div></div>
                <div class="row"><div class="col text-center">{{cancelled}}</div></div>
              </div>
              <div class="col-1">
                <span style="color: Tomato;">
                  <i class="fas fa-ban fa-3x"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-center justify-content-between">
            <a class="small stretched-link" href="#">View Details</a>
            <div class="small">
              <i class="fas fa-angle-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</template>
<script>
export default {
  name:"ClientDashbooard",
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