<template>
  <main>
    <div class="container">
      <div class="card m-4" v-for="ad in ads" v-bind:key="ad.id">
        <div class="card-header">
          <h5>{{ad.title}}</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-2">
              <h6>Description</h6>
            </div>
            <div class="col-8">{{ ad.description}}</div>
          </div>
          <div class="row">
            <div class="col-2">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="col-8">{{ ad.date }}</div>
          </div>
          <div class="row">
            <div class="col-2">
              <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="col-8">{{ ad.duration}}</div>
          </div>
          <div class="row">
            <div class="col-2">
              <i class="fas fa-hand-holding-usd"></i>
            </div>
            <div class="col-8">{{ ad.amount }}</div>
          </div>
        </div>
        <div class="card-footer">
          <button type="button" @click="deleteAd(ad.id)" class="btn btn-secondary">Delete</button>
          <button type="button" class="btn btn-success">Update</button>
        </div>
      </div>
      <nav>
        <ul class="pagination justify-content-center">
          <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item">
            <a class="page-link" href="#" @click="getAds(pagination.prev_page_url)">Previous</a>
          </li>
          <li class="page-item disabled">
            <a
              class="page-link"
              href="#"
            >{{ pagination.current_page }} of {{ pagination.last_page }}</a>
          </li>
          <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
            <a class="page-link" href="#" @click="getAds(pagination.next_page_url)">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </main>
</template>


<script>
export default {
  data() {
    return {
      step: 1,
      totalsteps: 4,
      ads: [],
      pagination: {},
      form: {
        id: "",
        client_id: "1",
        category: "",
        subcategory: "",
        title: "",
        photos: "",
        description: "",
        jobbers_number: "",
        date: "",
        hour: "",
        address: "",
        phone: "",
        duration: "",
        hour_wage: "",
        amount: ""
      },
      update: false,
      ad_id: ""
    };
  },

  created() {
    this.getAds();
  },

  methods: {
    getAds(api_url) {
      let vm = this;
      api_url = api_url || "/api/ads";
      fetch(api_url)
        .then(response => response.json())
        .then(response => {
          this.ads = response.data;
          vm.paginator(response.meta, response.links);
        })
        .catch(err => console.log(err));
    },

    paginator(meta, links) {
      this.pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
    },

    deleteAd(id) {
      fetch("/api/ad/" + id, {
        method: "delete"
      })
        .then(response => response.json())
        .then(data => {
          this.getAds();
        })
        .catch(err => console.log(err));
    },

    updateAd(ad) {
      this.update = true;
      this.ad.id = ad.id;
      this.ad.title = ad.title;
      this.ad.description = ad.description;
      this.ad.category = ad.category;
      this.ad.subcategory = ad.subcategory;
      this.ad.jobbers_number = ad.jobbers_number;
      this.ad.photos = ad.photos;
      this.ad.date = ad.date;
      this.ad.hour = ad.hour;
      this.ad.address = ad.address;
      this.ad.phone = ad.phone;
      this.ad.duration = ad.duration;
      this.ad.hour_wage = ad.hour_wage;
      this.ad.amount = ad.amount;
    },
    nextStep: function() {
      this.step++;
    },
    prevStep: function() {
      this.step--;
    },
    createAd() {
      fetch("/api/ad", {
        method: "post",
        body: JSON.stringify(this.form),
        headers: {
          "content-type": "application/json"
        }
      }).catch(err => console.log(err));
    }
  }
};
</script>