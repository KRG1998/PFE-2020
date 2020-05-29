<template>
  <main>
    <div class="container text-center">
      <div class="row align-items-center my-5">
        <div class="col-lg-7">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="../assets/images/slide-1.png" alt="First slide" />
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/images/slide-2.png" alt="Second slide" />
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../assets/images/slide-3.png" alt="Third slide" />
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="prev"
            >
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="next"
            >
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        <div class="col-lg-5">
          <h1 class="font-weight-light">Business Name or Tagline</h1>
          <p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
          <router-link
            to="/login"
            v-on:click="reloadPage()"
            class="btn btn-info text-white"
            href="#"
          >Join us!</router-link>
        </div>
      </div>
      <div class="row bg-secondary text-white rounded m-5 p-3">
        <div class="col text-center">
          <h1 class="font-weight-light">Categories</h1>
          <p
            class="mb-5"
          >Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
        </div>
      </div>
      <div class="container text-center">
        <div class="row w-100">
          <div class="col w-25">
            <div class="row">
              <div class="col text-center ">
                <img class="w-25" src="../assets/images/categories/farm.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Gardening</div>
              </div>
            </div>
          </div>
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/diy.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Bricolage</div>
              </div>
            </div>
          </div>
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/plumber.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Plombing</div>
              </div>
            </div>
          </div>
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/car.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Carpooling</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row w-100">
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/handyman.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Electricity</div>
              </div>
            </div>
          </div>
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/fork.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Restoration</div>
              </div>
            </div>
          </div>
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/outdoor.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Household</div>
              </div>
            </div>
          </div>
          <div class="col w-25">
            <div class="row">
              <div class="col text-center">
                <img class="w-25" src="../assets/images/categories/feeder.png" alt />
              </div>
            </div>
            <div class="row">
              <div class="col text-center">
                <div class="m-2 text-secondary font-weight-bold">Daycare</div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <img class="mt-4" style="height:50px;" src="../assets/images/categories/more.png" alt />
          </div>
        </div>
      </div>

      <div class="row align-items-center my-5">
        <div class="col-lg-7">
          <div class="card p-5 border-0 shadow-sm">
            <h3 class="font-weight-light mb-5">Select a category</h3>
            <div class="row">
              <div class="col">
                <select class="form-control" aria-placeholder="category">
                  <option value>Category</option>
                  <option value="it">IT</option>
                </select>
              </div>
              <div class="col">
                <select class="form-control">
                  <option value>Sub-category</option>
                  <option value="it">IT</option>
                </select>
              </div>
              <div class="col">
                <button class="btn btn-info text-white">
                  Search
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <img class="img-fluid rounded mb-4 mb-lg-0 w-100" src="../assets/images/search.png" alt />
        </div>
      </div>
      <div class="card bg-secondary text-white rounded text-center mt-5 mb-5 p-3">
        <h1 class="font-weight-light">Lastest offers</h1>
      </div>
      <div class="row align-items-center my-5">
        <div class="col-lg-7">
          <div class="row w-100" v-for="ad in ads">
            <div class="card bg-white border-0 shadow-sm w-100 m-2">
              <div class="row no-gutters w-100">
                <div class="col-auto">
                  <img
                    :src="'../storage/ads_photos/'+ad.photos"
                    style="height:150px;width:150px"
                    class="img-fluid"
                    alt
                  />
                </div>
                <div class="col-auto">
                  <div class="card-block px-2 pl-4 pt-3">
                    <div class="row">
                      <h4 class="card-title text-secondary">{{ad.title}}</h4>
                      <p class="font-weight-light ml-2 text-success">{{ad.category}}</p>
                    </div>
                    <div class="row">
                      <h6 class="text-info">
                        <i class="fas fa-map-marker-alt"></i>
                      </h6>
                      <h6 class="ml-3 font-weight-light text-secondary">{{ad.address}}</h6>
                    </div>
                    <div class="row">
                      <h6 class="text-info">
                        <i class="far fa-calendar-alt"></i>
                      </h6>
                      <h6 class="ml-3 font-weight-light text-secondary">{{ad.date}}</h6>
                    </div>
                    <div class="row">
                      <h6 class="text-info">
                        <i class="fas fa-users"></i>
                      </h6>
                      <h6 class="ml-3 font-weight-light text-secondary">{{ad.jobbers_number}}</h6>
                    </div>
                    <div class="row">
                      <h6 class="text-info">
                        <i class="fas fa-coins"></i>
                      </h6>
                      <h6 class="ml-3 font-weight-light text-secondary">{{ad.amount}}</h6>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="col">
                    <div class="float-right w-25">
                      <div class="w-100 text-center mt-3">
                        <a v-on:click="showDetailsModal(ad.id)" href="#" class="text-secondary">
                          <i class="fas fa-eye"></i> View
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <img class="img-fluid rounded mb-4 mb-lg-0" src="../assets/images/slide-4.png" alt />
        </div>
      </div>
    </div>
    <b-modal ref="detailsModal" hide-footer hide-header>
      <AdDetails :id="adId"></AdDetails>
      <div class="row no-gutters w-100">
        <div class="col">
          <div class="float-right">
            <button class="btn btn-info text-white" v-on:click="showApplyModal(adId)">Apply</button>
          </div>
        </div>
      </div>
    </b-modal>

    <b-modal ref="applyModal" hide-footer hide-header>
      <ApplyForm :user="user" :id="adId1"></ApplyForm>
    </b-modal>
  </main>
</template>

<script>
import AdDetails from "./AdDetails";
import ApplyForm from "./jobber/ApplyForm";
export default {
  components: {
    AdDetails,
    ApplyForm
  },
  props: ["user"],
  data() {
    return {
      adId: "",
      adId1: "",
      ads: []
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
        //console.log(this.ads);
      } catch (e) {
        // handle the authentication error here
      }
    },
    async showDetailsModal(id) {
      this.$refs["detailsModal"].show();
      this.adId = id;
      //console.log(this.adId);
    },
    hideDetailsModal() {
      this.$refs["detailsModal"].hide();
    },
    showApplyModal(id) {
      this.$refs["detailsModal"].hide();
      this.$refs["applyModal"].show();
      this.adId1 = id;
    },
    hideApplyModal() {
      this.$refs["applyModal"].hide();
    },
    reloadPage() {
      //location.reload();
      window.location.reload();
    }
  }
};
</script>
<style scoped>
.float-right {
  float: right !important;
}
</style>
