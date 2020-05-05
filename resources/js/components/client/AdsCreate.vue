<template>
  <main>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="card shadow-sm bg-white rounded border-0">
            <div class="card-header">
              <h4 class="text-secondary">
                <i class="far fa-plus-square"></i>
                New ad
              </h4>
            </div>
            <div class="card-body">
              <form @submit.prevent="postAd" enctype="multipart/form-data">
                <section v-if="step == 1">
                  <span class="m-5">
                    <div class="row">
                      <div class="col text-center">
                        <img
                          style="height:30px;width:30px"
                          class
                          src="../../assets/images/one.png"
                          alt
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-center">
                        <h5 style="font-family: 'Quicksand'" class="text-center">Category</h5>
                      </div>
                    </div>
                  </span>
                  <div class="row ml-3 mr-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                      </div>
                      <select
                        class="custom-select"
                        id="inputGroupSelect01"
                        v-model="category"
                        v-bind:class="{ 'border-danger': errors.category}"
                      >
                        <option value selected>Choose a category...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      <select
                        class="custom-select"
                        id="inputGroupSelect01"
                        v-model="subcategory"
                        v-bind:class="{ 'border-danger': errors.subcategory}"
                      >
                        <option value selected>Choose a sub-category...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                   
                  </div>
                  <div class="row">
                      <div class="col w-50 ml-5">
                        <span class="text-danger ml-5" role="alert" v-if="errors.category">
                      <i class="fas fa-exclamation-triangle"></i>
                      {{errors.category[0]}}
                    </span>
                      </div>
                    <div class="col w-50 ml-3">
                      <span class="text-danger" role="alert" v-if="errors.subcategory">
                      <i class="fas fa-exclamation-triangle"></i>
                      {{errors.subcategory[0]}}
                    </span>
                    </div>
                   </div>
                </section>
                <section v-if="step == 2">
                  <span class="m-5">
                    <div class="row">
                      <div class="col text-center">
                        <img
                          style="height:30px;width:30px"
                          class
                          src="../../assets/images/two.png"
                          alt
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <h5 style="font-family: 'Quicksand'" class="text-center">Details</h5>
                      </div>
                    </div>
                  </span>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Title</label>
                      <input
                        v-model="title"
                        type="text"
                        class="form-control"
                        name="title"
                        label="Title"
                        placeholder="Title"
                        v-bind:class="{ 'is-invalid ': errors.title}"
                      />
                      <span class="text-danger" role="alert" v-if="errors.title">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.title[0]}}
                      </span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Description</label>
                      <textarea
                        v-model="description"
                        class="form-control"
                        placeholder="Description"
                        v-bind:class="{ 'is-invalid ': errors.description}"
                      />
                      <span class="text-danger" role="alert" v-if="errors.description">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.description[0]}}
                      </span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Jobber's number</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="fas fa-user-plus"></i>
                          </span>
                        </div>
                        <input
                          v-model="jobbers_number"
                          type="number"
                          class="form-control"
                          name="jobbers"
                          placeholder="Jobber's number"
                          v-bind:class="{ 'is-invalid ': errors.jobbers_number}"
                        />
                      </div>
                      <span class="text-danger" role="alert" v-if="errors.jobbers_number">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.jobbers_number[0]}}
                      </span>
                    </div>
                  </div>
                  <div class="input-group">
                    <label for="inputPassword4">Photos</label>
                  </div>
                  <div class="input-group mb-3" v-if="photos">
                    <img
                      :src="photos"
                      style="height:150px;width:150px"
                      class="img-thumbnail rounded mb-2"
                    />
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>

                    <div class="custom-file">
                      <input
                        v-on:change="onImageChange"
                        type="file"
                        class="custom-file-input"
                        id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01"
                        v-bind:class="{ 'is-invalid ': errors.photos}"
                        multiple
                      />
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  <span class="text-danger" role="alert" v-if="errors.photos">
                    <i class="fas fa-exclamation-triangle"></i>
                    {{errors.photos[0]}}
                  </span>
                </section>
                <section v-if="step == 3">
                  <span class="m-5">
                    <div class="row">
                      <div class="col text-center">
                        <img
                          style="height:30px;width:30px"
                          class
                          src="../../assets/images/three.png"
                          alt
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-center">
                        <h5 style="font-family: 'Quicksand'">Date & address</h5>
                      </div>
                    </div>
                  </span>

                  <div class="row">
                    <div class="col m-2">
                      <div class="row">
                        <div class="input-group flex-nowrap">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">
                              <i class="far fa-calendar-alt"></i>
                            </span>
                          </div>
                          <input
                            v-model="date"
                            type="date"
                            class="form-control"
                            name="date"
                            v-bind:class="{ 'is-invalid ': errors.date}"
                          />
                        </div>
                      </div>
                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.date">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.date[0]}}
                        </span>
                      </div>
                    </div>

                    <div class="col m-2">
                      <div class="row">
                        <div class="input-group flex-nowrap">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">
                              <i class="far fa-clock"></i>
                            </span>
                          </div>
                          <input
                            v-model="hour"
                            type="time"
                            class="form-control"
                            name="hour"
                            v-bind:class="{ 'is-invalid ': errors.hour}"
                          />
                        </div>
                      </div>
                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.hour">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.hour[0]}}
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col m-2">
                      <div class="row">
                        <div class="input-group flex-nowrap">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">
                              <i class="fas fa-map-marker-alt"></i>
                            </span>
                          </div>
                          <input
                            v-model="address"
                            type="text"
                            class="form-control"
                            name="address"
                            placeholder="Address"
                            v-bind:class="{ 'is-invalid ': errors.address}"
                          />
                        </div>
                      </div>

                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.address">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.address[0]}}
                        </span>
                      </div>
                    </div>
                    <div class="col m-2">
                      <div class="row">
                        <div class="input-group flex-nowrap">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">
                              <i class="fas fa-phone"></i>
                            </span>
                          </div>
                          <input
                            v-model="phone"
                            type="tel"
                            class="form-control"
                            name="phone"
                            placeholder="Phone"
                            v-bind:class="{ 'is-invalid ': errors.phone}"
                          />
                        </div>
                      </div>
                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.phone">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.phone[0]}}
                        </span>
                      </div>
                    </div>
                  </div>
                </section>
                <section v-if="step == 4">
                  <span class="m-5">
                    <div class="row">
                      <div class="col text-center">
                        <img
                          style="height:30px;width:30px"
                          class
                          src="../../assets/images/four.png"
                          alt
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-center">
                        <h5 style="font-family: 'Quicksand'" class="text-center">Duration & price</h5>
                      </div>
                    </div>
                  </span>
                  <div class="row">
                    <div class="col-sm">
                      <label>Duration in hours</label>
                      <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="addon-wrapping">
                            <i class="far fa-hourglass"></i>
                          </span>
                        </div>
                        <input
                          v-model="duration"
                          type="number"
                          class="form-control"
                          name="duration"
                          placeholder="Duration"
                          v-bind:class="{ 'is-invalid ': errors.duration}"
                        />
                      </div>
                    </div>
                    <div class="col-sm">
                      <label>Hour wage</label>
                      <div class="input-group">
                        <input
                          v-model="hour_wage"
                          type="number"
                          class="form-control"
                          name="hour_wage"
                          placeholder="Hour wage"
                          v-on:change="calculAmount"
                          v-bind:class="{ 'is-invalid ': errors.hour_wage}"
                        />
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="fas fa-coins"></i>
                          </span>
                          <span class="input-group-text">{{duration * hour_wage}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <span class="text-danger" role="alert" v-if="errors.duration">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.duration[0]}}
                      </span>
                    </div>
                    <div class="col">
                      <span class="text-danger" role="alert" v-if="errors.hour_wage">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.hour_wage[0]}}
                      </span>

                      <br />
                      <span class="text-danger" role="alert" v-if="errors.amount">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.amount[0]}}
                      </span>
                    </div>
                  </div>
                </section>
                <div class="row m-4">
                  <div class="col float-left">
                    <button
                      v-if="step != 1"
                      @click.prevent="prevStep"
                      class="btn btn-secondary shadow"
                    >
                      <i class="fas fa-chevron-circle-left"></i> Previous Step
                    </button>
                  </div>

                  <button
                    v-if="step != totalsteps"
                    @click.prevent="nextStep"
                    class="btn btn-info text-white shadow"
                  >
                    Next step
                    <i class="fas fa-chevron-circle-right"></i>
                  </button>
                  <button v-if="step == 4" class="btn btn-info text-white shadow">
                    <i class="fas fa-plus-circle" type="submit"></i> Add
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col">
          <img
            class="shadow-sm bg-white rounded img-thumbnail"
            src="../../assets/images/add.png"
            alt
          />
        </div>
      </div>
    </div>
  </main>
</template>


<script>
export default {
  props: ["user"],
  data() {
    return {
      clients: [],
      step: 1,
      totalsteps: 4,
      ads: [],
      errors: [],

      cancelled: 0,
      completed: 0,
      assigned: 0,
      inprogress: 0,
      errors: [],
      error: {
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
      client_id: this.user.id,
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
    };
  },
  created() {},
  methods: {
    calculAmount() {
      this.amount = this.hour_wage * this.duration;
    },
    onImageChange(e) {
      /*
      let selectedFiles=e.target.files;
                if(!selectedFiles.length){
                    return false;
                }
                for(let i=0;i<selectedFiles.length;i++){
                    
                    this.photos.push(selectedFiles[i]);
                    this.createImage(selectedFiles);
                }
                
                console.log(this.photos);
                 */
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      reader.onload = e => {
        this.photos = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    async postAd() {
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post("http://localhost:8000/api/ads", this.$data)
        .then(response => {
          (this.client_id = ""),
            (this.category = ""),
            (this.subcategory = ""),
            (this.title = ""),
            (this.photos = ""),
            (this.description = ""),
            (this.jobbers_number = ""),
            (this.date = ""),
            (this.hour = ""),
            (this.address = ""),
            (this.phone = ""),
            (this.duration = ""),
            (this.hour_wage = ""),
            (this.amount = ""),
            config;
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Ad published successfully!",
                time: 2000
              })
              .then(result => {
                location.reload();
              });
          }
        })
        .catch(error => {
          /* if(error.response && error.response.status === 422)
          {
            this.$swal ( "Oops" ,  "Something went wrong!" ,  "error" )
          }*/
          this.errors = error.response.data.errors;
          this.isLoading = false;

          if (this.errors.category || this.errors.subcategory) {
            this.step = 1;
          }
          // handle authentication and validation errors here
          else if (
            this.errors.title ||
            this.errors.description ||
            this.errors.jobbers_number ||
            this.errors.photos
          ) {
            this.step = 2;
          } else if (
            this.errors.date ||
            this.errors.hour ||
            this.errors.address ||
            this.errors.phone
          ) {
            this.step = 3;
          }
          if (error.response && error.response.status === 500) {
            this.$swal("Oops", "Something went wrong!", "error");
          }
        });
    },
    nextStep: function() {
      this.step++;
    },
    prevStep: function() {
      this.step--;
    }
  }
};
</script>