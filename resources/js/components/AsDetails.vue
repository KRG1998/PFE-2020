<template>
  <main>
    <div class="card bg-white border-0 w-100 m-2">
      <div class="row no-gutters w-100">
        <div class="col-auto">
          <img :src="'../storage/ads_photos/'+ads.photos"
            style="height:200px;width:200px" />
        </div>
        <div class="col-auto">
          <div class="card-block px-2 pl-4 pt-3">
            <div class="row">
              <h4 class="card-title text-secondary">{{ads.title}}</h4>
              <p class="font-weight-light ml-2 text-success">{{ads.category}}</p>
              <p class="font-weight-light ml-2 text-success">{{ads.subcategory}}</p>
            </div>
            <div class="row">
              <h6 class="text-primary">
                <i class="fas fa-map-marker-alt"></i>
              </h6>
              <h6 class="ml-3 font-weight-light text-secondary">{{ads.address}}</h6>
            </div>
            <div class="row">
              <h6 class="text-primary">
                <i class="far fa-calendar-alt"></i>
              </h6>
              <h6 class="ml-3 font-weight-light text-secondary">{{ads.date}}</h6>
            </div>
            <div class="row">
              <h6 class="text-primary">
                <i class="fas fa-clock"></i>
              </h6>
              <h6 class="ml-3 font-weight-light text-secondary">{{ads.hour}}</h6>
            </div>
            <div class="row">
              <h6 class="text-primary">
                <i class="fas fa-users"></i>
              </h6>
              <h6 class="ml-3 font-weight-light text-secondary">{{ads.jobbers_number}}</h6>
            </div>
            <div class="row">
              <h6 class="text-primary">
                <i class="fas fa-coins"></i>
              </h6>
              <h6 class="ml-3 font-weight-light text-secondary">{{ads.amount}}</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="row no-gutters w-100 text-secondary">Description</div>
      <div class="row no-gutters w-100">{{ads.description}}</div>
    </div>
    <b-modal ref="applyModal" hide-footer hide-header></b-modal>
  </main>
</template>
<script>
export default {
  props: ["id"],
  data() {
    return {
      ads: [],
      idClient: "",
      clients: []
    };
  },
  created() {
    this.getAds();
    //this.getClient();
    console.log(this.ads.id);
  },
  methods: {
    async getAds() {
      try {
        const response = await axios.get("/api/ads/" + this.id);
        this.ads = response.data.data;
        //console.log(this.ads);
      } catch (e) {
        // handle the authentication error here
      }
    },
    async getClient() {
      try {
        const response = await axios.get("/api/clients/" + this.ads.client_id);
        this.Clients = response.data.data;
        //console.log(this.clients);
      } catch (e) {
        // handle the authentication error here
      }
    },
    showApplyModal() {
      this.$refs["applyModal"].show();
    },
    hideApplyModal() {
      this.$refs["applyModal"].hide();
    }
  }
};
</script>
<style scoped>
</style>