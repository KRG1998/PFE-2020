<template>
<main>
  <div class="card mb-4">
    <div class="card-header">
      <i class="fas fa-table mr-1"></i>My offers
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr >
              <th>Project Name</th>
              <th>Amount</th>
              <th>State</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="offer in offers" v-if="offer.client_id == user.id">
              <td class="font-weight-bold text-capitalize">{{offer.title}}</td>
              <td>{{offer.amount}}</td>
              <td>
                <span v-if="offer.state == 'pending'" class="bg-secondary rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'in progress'" class="bg-info rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'finished'" class="bg-success rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'cancelled'" class="bg-danger rounded text-white pl-2 pr-2">{{offer.state}}</span>
                <span v-if="offer.state == 'affected'" class="bg-warning rounded text-white pl-2 pr-2">{{offer.state}}</span>
              </td>
 
              <td class="text-center">
                <a v-on:click="showOfferDetailsModal(offer.id)" href="#" class="text-secondary m-2">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="#" class="text-primary m-2">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="#" class="text-danger m-2" v-on:click="deleteOffer(offer.id) ">
                  <i class="fas fa-ban"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <b-modal size="lg" class="my-modal" ref="offer-details" hide-footer hide-header>
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
      ad:{},
      id:null,
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
      deleteOffer(id) {
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
          axios.delete("/api/offers/" + id).then(response => {
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