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
                    <h1 style="font-family:'Dancing Script';" class="text-secondary text-center">
                      Step
                      <img
                        style="height:30px;width:30px"
                        class
                        src="../../assets/images/one.png"
                        alt
                      />
                    </h1>
                  </span>
                  <div class="row">
                    <div class="col">
                      <select
                        class="form-control"
                        v-model="category"
                        v-bind:class="{ 'border-danger': errors.category}"
                      >
                        <option value>Select a category</option>
                        <option value="it">IT</option>
                        <option value="it">Computer science</option>
                        <option value="Electricity">Electricity</option>
                        <option value="Co-viturage">Co-viturage</option>
                        <option value="Plumbing">Plumbing</option>
                      </select>
                      <br />
                      <span class="text-danger" role="alert" v-if="errors.category">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.category[0]}}
                      </span>
                    </div>
                    <div class="col">
                      <select
                        class="form-control"
                        v-model="subcategory"
                        v-bind:class="{ 'border-danger': errors.subcategory}"
                      >
                        <option value>Select a category</option>
                        <option value="somthing">somthing</option>
                      </select>
                      <br />
                      <span class="text-danger" role="alert" v-if="errors.subcategory">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{errors.subcategory[0]}}
                      </span>
                    </div>
                  </div>
                </section>
                <section v-if="step == 2">
                  <span class="m-5">
                    <h1 style="font-family:'Dancing Script';" class="text-secondary text-center">
                      Step
                      <img
                        style="height:30px;width:30px"
                        class
                        src="../../assets/images/two.png"
                        alt
                      />
                    </h1>
                  </span>
                  <div class="row m-2 w-100">
                    <div class="col">
                      <div class="row">
                        <input
                          v-model="title"
                          type="text"
                          class="form-control"
                          name="title"
                          label="Title"
                          placeholder="Title"
                          v-bind:class="{ 'is-invalid ': errors.title}"
                        />
                      </div>
                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.title">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.title[0]}}
                        </span>
                      </div>
                    </div>
                  </div>

                  <div class="row m-2 w-100">
                    <div class="col">
                      <div class="row">
                        <textarea
                          v-model="description"
                          class="form-control"
                          placeholder="Description"
                          v-bind:class="{ 'is-invalid ': errors.description}"
                        />
                      </div>
                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.description">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.description[0]}}
                        </span>
                      </div>
                    </div>
                    <div class="col ml-5">
                      <div class="row">
                        <input
                          v-model="jobbers_number"
                          type="number"
                          class="form-control"
                          name="jobbers"
                          placeholder="Jobber's number"
                          v-bind:class="{ 'is-invalid ': errors.jobbers_number}"
                        />
                      </div>
                      <div class="row">
                        <span class="text-danger" role="alert" v-if="errors.jobbers_number">
                          <i class="fas fa-exclamation-triangle"></i>
                          {{errors.jobbers_number[0]}}
                        </span>
                      </div>
                    </div>
                  </div>

                    <div class="row m-2 w-100">
                      <div class="col-md-3" v-if="photos">
                        <img :src="photos"  style="height:150px;width:150px" class="img-thumbnail rounded mb-2" />
                      </div>
                      <input
                        type="file"
                        v-on:change="onImageChange"
                        class="form-control"
                        v-bind:class="{ 'is-invalid ': errors.photos}"
                      multiple/>
                    </div>
                  
                  <div class="row m-2 w-100">
                    <span class="text-danger" role="alert" v-if="errors.photos">
                      <i class="fas fa-exclamation-triangle"></i>
                      {{errors.photos[0]}}
                    </span>
                  </div>
                </section>
                <section v-if="step == 3">
                  <span class="m-5">
                    <h1 style="font-family:'Dancing Script';" class="text-secondary text-center">
                      Step
                      <img
                        style="height:30px;width:30px"
                        class
                        src="../../assets/images/three.png"
                        alt
                      />
                    </h1>
                  </span>

                  <div class="row">
                    <div class="col m-2">
                      <div class="row">
                        <input
                          v-model="date"
                          type="date"
                          class="form-control"
                          name="date"
                          v-bind:class="{ 'is-invalid ': errors.date}"
                        />
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
                        <input
                          v-model="hour"
                          type="time"
                          class="form-control"
                          name="hour"
                          v-bind:class="{ 'is-invalid ': errors.hour}"
                        />
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
                        <input
                          v-model="address"
                          type="text"
                          class="form-control"
                          name="address"
                          placeholder="Address"
                          v-bind:class="{ 'is-invalid ': errors.address}"
                        />
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
                        <input
                          v-model="phone"
                          type="tel"
                          class="form-control"
                          name="phone"
                          placeholder="Phone"
                          v-bind:class="{ 'is-invalid ': errors.phone}"
                        />
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
                    <h1 style="font-family:'Dancing Script';" class="text-secondary text-center">
                      Step
                      <img
                        style="height:30px;width:30px"
                        class
                        src="../../assets/images/four.png"
                        alt
                      />
                    </h1>
                  </span>
                  <div class="row">
                    <div class="col-sm">
                      <input
                        v-model="duration"
                        type="number"
                        class="form-control"
                        name="duration"
                        placeholder="Duration"
                        v-bind:class="{ 'is-invalid ': errors.duration}"
                      />
                    </div>
                    <div class="col-sm">
                      <input
                        v-model="hour_wage"
                        type="number"
                        class="form-control"
                        name="hour_wage"
                        placeholder="Hour wage"
                        v-on:change="calculAmount"
                        v-bind:class="{ 'is-invalid ': errors.hour_wage}"
                      />
                    </div>
                    <div class="col-sm">
                      <div class="row">
                        <div class="col-2 text-secondary">
                          <i class="fas fa-coins"></i>
                        </div>
                        <div class="col-8">
                          {{duration * hour_wage}}
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
                    </div>
                    <div class="col">
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
          <img class="shadow-sm bg-white rounded img-thumbnail" src="../../assets/images/add.png" alt />
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
      amount: "",
    };
  },
created(){

},
  methods: {
    
    calculAmount(){
      this.amount=this.hour_wage*this.duration;
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
            this.$swal.fire({
              icon: "success",
              title: "Success",
              text: "Ad published successfully!",
              time:2000
            }).then(result => {
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

          
          if(this.errors.category || this.errors.subcategory){
            this.step=1;
          }
          // handle authentication and validation errors here
          
          else if(this.errors.title || this.errors.description || this.errors.jobbers_number || this.errors.photos){
            this.step=2;
          }
          else if(this.errors.date || this.errors.hour || this.errors.address || this.errors.phone){
            this.step=3;
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