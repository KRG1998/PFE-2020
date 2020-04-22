<template>
  <main>
    <div class="card border-0 mb-4">
      <div class="card-body">
        <div class="card bg-white border-0 w-100 m-2">
          <div class="row no-gutters w-100">
            <div class="col-auto">
              <img :src="'../storage/ads_photos/'+ad.photos" style="height:200px;width:200px" />
            </div>
            <div class="col-auto">
              <div class="card-block px-2 pl-4 pt-3">
                <div class="row">
                  <h4 class="card-title text-secondary">{{ad.title}}</h4>
                  <p class="font-weight-light ml-2 text-success">{{ad.category}}</p>
                  <p class="font-weight-light ml-2 text-success">{{ad.subcategory}}</p>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-map-marker-alt"></i>
                  </h6>
                  <h6 class="ml-3 font-weight-light text-secondary">{{ad.address}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="far fa-calendar-alt"></i>
                  </h6>
                  <h6 class="ml-3 font-weight-light text-secondary">{{ad.date}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-clock"></i>
                  </h6>
                  <h6 class="ml-3 font-weight-light text-secondary">{{ad.hour}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-users"></i>
                  </h6>
                  <h6 class="ml-3 font-weight-light text-secondary">{{ad.jobbers_number}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-coins"></i>
                  </h6>
                  <h6 class="ml-3 font-weight-light text-secondary">{{ad.amount}}</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row no-gutters w-100 text-secondary">Description</div>
          <div class="row no-gutters w-100">{{ad.description}}</div>
        </div>
      </div>
      <div class="card border-0 m-2">
        <div class="row no-gutters w-100">
          <div class="col-4 ml-3">
            <h6 class="text-secondary">Estimated duration</h6>
          </div>
          <div class="col-6">{{offer.duration}}</div>
        </div>
        <div class="row no-gutters w-100">
          <div class="col-4 ml-3">
            <h6 class="text-secondary">Amount</h6>
          </div>
          <div class="col-6">{{offer.amount}}</div>
        </div>
        <div class="row no-gutters w-100">
          <div class="col-4 ml-3">
            <h6 class="text-secondary">Cover letter</h6>
          </div>
          <div class="col-6">{{offer.cover_letter}}</div>
        </div>
        <div class="row no-gutters w-100">
          <div class="col-4 ml-3">
            <h6 class="text-secondary">State</h6>
          </div>
          <div class="col-6">
              <span v-if="offer.state == 'pending'" class="bg-secondary rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'in progress'" class="bg-info rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'finished'" class="bg-success rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'cancelled'" class="bg-danger rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'affected'" class="bg-warning rounded text-white pl-2 pr-2">{{offer.state}}</span>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>
<script>
export default {
  props: ["user", "id"],
  data() {
    return {
      offer: {},
      ad: {},
      adId: null
    };
  },
  created() {
    this.getOffer();
    //this.getad();
  },
  methods: {
    async getOffer() {
      try {
        const response = await axios.get("/api/offers/" + this.id);
        this.offer = response.data.data;
        //console.log(this.offers);
        this.adId = this.offer.ad_id;
        this.getad(this.adId);
      } catch (e) {
        // handle the authentication error here
      }
    },
    async getad(id) {
      try {
        const response = await axios.get("/api/ads/" + id);
        this.ad = response.data.data;
        //console.log(this.offers);
      } catch (e) {
        // handle the authentication error here
      }
    }
  }
};
</script>