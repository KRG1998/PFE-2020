<template>
<main>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table mr-1"></i>Affected projects
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr >
              <th>Project Name</th>
              <th>Description</th>
              <th>Amount</th>
              <th>State</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="offer in offers" v-if="offer.state == 'affected'">
              <td class="font-weight-bold text-capitalize">{{offer.title}}</td>
              <td>{{offer.description}}</td>
              <td>{{offer.amount}}</td>
              <td>
                <span class="bg-warning rounded text-white pl-2 pr-2">{{offer.state}}</span>
              </td>
 
              <td class="text-center">
                <a v-on:click="showOfferDetailsModal(offer.id)" href="#" class="text-secondary m-2">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="text-primary m-2">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="text-danger m-2" v-on:click="deleteAd(ad.id)">
                  <i class="fas fa-ban"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <b-modal ref="offer-details" hide-footer hide-header>
      <OfferDetails :user="user" :id="id"></OfferDetails>
    </b-modal>
</main>
</template>
<script>
import OfferDetails from './OfferDetails';
export default {
  components:{
    OfferDetails
  },
  props: ["user"],
  data() {
    return {
      offers: {},
      id:null
    };
  },
  created() {
    this.getOffers();
  },
  methods: {
    async getOffers() {
      try {
        const response = await axios.get("/api/offers");
        this.offers = response.data.data;
        //console.log(this.offers);
      } catch (e) {
        // handle the authentication error here
      }
    },
    showOfferDetailsModal(id) {
        this.$refs['offer-details'].show();
        this.id=id;
        //console.log(x);
      },
      hideOfferDetailsModal() {
        this.$refs['offer-details'].hide()
      },
  }
};
</script>