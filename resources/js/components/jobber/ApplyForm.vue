<template>
  <main>
    <form @submit.prevent="postOffer" class="mt-5">
      <div class="row">
        <div class="col">
          <h5 class="text-secondary">Project Title</h5>
        </div>
        <div class="col">
          <h6 class="text-danger">{{ads.title}}</h6>
        </div>
      </div>

      <div class="row mt-2">
        <div class="col">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-hourglass-start"></i>
              </div>
            </div>
            <input
              type="text"
              class="form-control"
              id="inlineFormInputGroup"
              placeholder="Duration"
              v-model="duration"
            />
          </div>
          <div class="row ml-2">
            <span class="text-danger" role="alert" v-if="errors.duration">
              <i class="fas fa-exclamation-triangle"></i>
              {{errors.duration[0]}}
            </span>
          </div>
        </div>
        <div class="col">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-coins"></i>
              </div>
            </div>
            <input
              type="text"
              class="form-control"
              id="inlineFormInputGroup"
              placeholder="Amount"
              v-model="amount"
            />
          </div>
          <div class="row ml-2">
            <span class="text-danger" role="alert" v-if="errors.amount">
              <i class="fas fa-exclamation-triangle"></i>
              {{errors.amount[0]}}
            </span>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label text-secondary">Cover letter</label>
        <div class="col-sm-10">
          <textarea class="form-control" placeholder="Cover letter" v-model="cover_letter"></textarea>
          <div class="row ml-2">
            <span class="text-danger" role="alert" v-if="errors.description">
              <i class="fas fa-exclamation-triangle"></i>
              {{errors.description[0]}}
            </span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="float-right">
            <button class="btn btn-primary">Send</button>
          </div>
        </div>
      </div>
    </form>
  </main>
</template>
<script>
export default {
  props: ["user", "id"],
  data() {
    return {
      errors: [],
      ads: [],
      idClient: "",
      clients: [],
      ad_id: this.id,
      client_id: this.user.id,
      title: "",
      duration: "",
      amount: "",
      description: "",
      cover_letter: "",
      //state:"",
    };
  },
  created() {
    this.getAds();
    //this.getClient();
    //console.log(this.ads.id);
  },
  methods: {
    async getAds() {
      try {
        const response = await axios.get("/api/ads/" + this.id);
        this.ads = response.data.data;
        console.log(this.ads);
        this.title = this.ads.title;
        this.description = this.ads.description;
      } catch (e) {
        // handle the authentication error here
      }
    },
    async postOffer() {
      axios
        .post("http://localhost:8000/api/offers", this.$data)
        .then(response => {
          this.ad_id = "";
          this.client_id = "";
          this.title = "";
          this.duration = "";
          this.amount = "";
          this.cover_letter = "";
          //this.state = "";
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Offer sent successfully!",
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
          //console.log(this.errors.photo);
          this.isLoading = false;
        });
    }
  }
};
</script>