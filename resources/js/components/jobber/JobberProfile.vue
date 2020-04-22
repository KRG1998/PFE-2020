<template>
  <div class="container">
    <div class="card bg-light w-100 mt-4">
      <div class="row no-gutters w-100">
        <div class="col-auto">
          <img
            v-if="jobber.photo"
            :src="'../storage/jobbers_photos/'+jobber.photo"
            style="height:200px;width:200px"
            class="img-thumbnail rounded-circle ml-5 mt-5 mb-2"
            alt
          />
          <img
            v-else
            src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
            style="height:200px;width:200px"
            class="img-thumbnail rounded-circle ml-5 mt-5 mb-2"
            alt
          />
        </div>
        <div class="col-auto mt-4">
          <router-link to class="nav-link">
            <i class="fas fa-pen-square"></i>
          </router-link>
        </div>
        <div class="col-auto mt-5 ml-4 w-50">
          <h4 class="text-capitalize mt-4 text-secondary">{{user.first_name}} {{user.last_name}}</h4>
          <p class="font-weight-light text-secondary">{{jobber.description}}</p>
          <div class="row">
            <div class="col font-weight-bold text-secondary">
              <span class="text-primary mr-2">
                <i class="fas fa-envelope"></i>
              </span>
              {{user.email}}
            </div>
            <div class="col font-weight-bold text-secondary">
              <span class="text-primary mr-2">
                <i class="fas fa-mobile-alt"></i>
              </span>
              {{jobber.phone}}
            </div>
          </div>
          <div class="row">
            <div class="col font-weight-bold text-secondary">
              <span class="text-primary mr-2">
                <i class="fas fa-home"></i>
              </span>
              {{jobber.address}}
            </div>
            <div class="col font-weight-bold text-secondary">
              <span class="text-primary mr-2">
                <i class="fas fa-briefcase"></i>
              </span>
              {{jobber.professional_status}}
            </div>
          </div>
        </div>
        <div class="col mt-5 mr-4">
          <div class="float-right">
            <button v-if="jobber == 0" v-on:click="showModal" class="btn btn-primary shadow-sm">
              <i class="far fa-edit"></i> Complete profile
            </button>
            <button v-on:click="showEditModal(jobber.id)" v-else class="btn btn-primary shadow-sm">
              <i class="far fa-edit"></i> Edit profile
            </button>
          </div>
          <br />
        </div>
      </div>
      <div class="card-footer bg-white"></div>
    </div>
    <div class="row w-100 mt-3">
      <div class="col-3 w-100">
        <div class="card w-100">
          <div class="card-header font-weight-bold text-primary">
            <div class="row">
              <div class="col">My skills</div>
              <div class="col">
                <span class="float-right"></span>
                <i class="fas fa-pen"></i>
              </div>
            </div>
          </div>
          <div class="card-body"></div>
        </div>
      </div>
      <div class="col w-100">
        <div class="card w-100">
          <ul style="background-color:#f7f7f7; " class="nav nav-tabs pt-2 border-bottom-0 pl-2">
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                v-on:click="offers = true;affected = false;finished = false;cancelled=false;in_progress=false;"
                v-bind:class="{ 'bg-white border-bottom-0  font-weight-bold Active': offers==true}"
              >All my Offers</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                v-on:click="affected = true;offers =false;finished = false;cancelled=false;in_progress=false;"
                v-bind:class="{ 'bg-white border-bottom-0 font-weight-bold Active': affected==true}"
              >Affected projects</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                v-on:click="in_progress = true;offers =false;finished = false;cancelled=false;affected=false;"
                v-bind:class="{ 'bg-white border-bottom-0 font-weight-bold Active': in_progress==true}"
              >Projects in progress</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                v-on:click="finished = true;offers =false;in_progress = false;cancelled=false;affected=false;"
                v-bind:class="{ 'bg-white border-bottom-0 font-weight-bold Active': finished==true}"
              >Finished projects</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="#"
                v-on:click="cancelled = true;offers =false;finished = false;in_progress=false;affected=false;"
                v-bind:class="{ 'bg-white border-bottom-0 font-weight-bold Active': cancelled==true}"
              >Cancelled projects</a>
            </li>
          </ul>

          <div class="p-3">
            <Offers :user="user" v-if="offers == true"></Offers>
            <FinishedProjects :user="user" v-if="finished == true"></FinishedProjects>
            <AffectedProjects :user="user" v-if="affected == true"></AffectedProjects>
            <InProgressProjects :user="user" v-if="in_progress == true"></InProgressProjects>
            <CancelledProjects :user="user" v-if="cancelled == true"></CancelledProjects>
          </div>
        </div>
      </div>
    </div>
    <b-modal ref="CompleteProfileModal" hide-footer title="Complete your profile">
      <div class="d-block">
        <form @submit.prevent="postJobber" enctype="multipart/form-data">
          <div class="form-group">
            <label class="text-secondary" for="exampleInputPassword1">Photo</label>
            <br />
            <span class="text-danger" role="alert" v-if="errors.photo">
              <i class="fas fa-exclamation-triangle"></i>
              {{errors.photo[0]}}
            </span>
            <div class="col-md-3" v-if="photo">
              <img :src="photo" class="img-responsive" height="70" width="90" />
            </div>
            <input
              type="file"
              v-on:change="onImageChange"
              class="form-control"
              v-bind:class="{ 'is-invalid ': errors.photo}"
            />
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Description</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.description">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.description[0]}}
                </span>
                <textarea
                  v-model="description"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.description}"
                ></textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Birthday</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.birthday">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.birthday[0]}}
                </span>
                <input
                  v-model="birthday"
                  type="date"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.birthday}"
                />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Phone</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.phone">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.phone[0]}}
                </span>
                <input
                  v-model="phone"
                  type="tel"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.phone}"
                />
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Address</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.address">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.address[0]}}
                </span>
                <input
                  v-model="address"
                  type="text"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.address}"
                />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Professional status</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.professional_status">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.professional_status[0]}}
                </span>
                <select
                  v-model="professional_status"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.professional_status}"
                >
                  <option value="hh"></option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Gender</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.gender">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.gender[0]}}
                </span>
                <div class="row ml-4">
                  <div class="form-check col">
                    <input
                      v-model="gender"
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios1"
                      value="male"
                      checked
                      v-bind:class="{ 'is-invalid ': errors.gender}"
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      <span style="color: Dodgerblue;">
                        <i class="fas fa-mars"></i>
                      </span>
                    </label>
                  </div>
                  <div class="form-check col">
                    <input
                      v-model="gender"
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios2"
                      value="female"
                      v-bind:class="{ 'is-invalid ': errors.gender}"
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      <span style="color:#ff1e9b">
                        <i class="fas fa-venus"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <button class="btn btn-primary float-right">
              <i class="fas fa-check"></i> Save
            </button>
            <button
              class="btn btn-danger float-right mr-2"
              variant="outline-danger"
              block
              @click="hideModal"
            >
              <i class="fas fa-ban"></i> Cancel
            </button>
          </div>
        </form>
      </div>
    </b-modal>
    <b-modal ref="EditProfileModal" hide-footer title="Edit your information">
      <div class="d-block">
        <form @submit.prevent="updateProfile(jobber.id)" enctype="multipart/form-data">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Description</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.description">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.description[0]}}
                </span>
                <textarea
                  v-model="jobber.description"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.description}"
                ></textarea>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Birthday</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.birthday">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.birthday[0]}}
                </span>
                <input
                  v-model="jobber.birthday"
                  type="date"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.birthday}"
                />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Phone</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.phone">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.phone[0]}}
                </span>
                <input
                  v-model="jobber.phone"
                  type="tel"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.phone}"
                />
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Address</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.address">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.address[0]}}
                </span>
                <input
                  v-model="jobber.address"
                  type="text"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.address}"
                />
                <div class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Professional status</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.professional_status">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.professional_status[0]}}
                </span>
                <select
                  v-model="jobber.professional_status"
                  class="form-control form-control-sm"
                  v-bind:class="{ 'is-invalid ': errors.professional_status}"
                >
                  <option value="hh"></option>
                </select>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="text-secondary" for="exampleInputPassword1">Gender</label>
                <br />
                <span class="text-danger" role="alert" v-if="errors.gender">
                  <i class="fas fa-exclamation-triangle"></i>
                  {{errors.gender[0]}}
                </span>
                <div class="row ml-4">
                  <div class="form-check col">
                    <input
                      v-model="jobber.gender"
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios1"
                      value="male"
                      checked
                      v-bind:class="{ 'is-invalid ': errors.gender}"
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      <span style="color: Dodgerblue;">
                        <i class="fas fa-mars"></i>
                      </span>
                    </label>
                  </div>
                  <div class="form-check col">
                    <input
                      v-model="jobber.gender"
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="exampleRadios2"
                      value="female"
                      v-bind:class="{ 'is-invalid ': errors.gender}"
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      <span style="color:#ff1e9b">
                        <i class="fas fa-venus"></i>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <button class="btn btn-primary float-right">
              <i class="fas fa-check"></i> Save
            </button>
            <button
              class="btn btn-danger float-right mr-2"
              variant="outline-danger"
              block
              v-on:clickk="hideEditModal()"
            >
              <i class="fas fa-ban"></i> Cancel
            </button>
          </div>
        </form>
      </div>
    </b-modal>
  </div>
</template>
<script>
import Offers from "./Offers";
import AffectedProjects from "./AffectedProjects";
import FinishedProjects from "./FinishedProjects";
import InProgressProjects from "./InProgressProjects";
import CancelledProjects from "./CancelledProjects";
export default {
  components: {
    Offers,
    AffectedProjects,
    FinishedProjects,
    InProgressProjects,
    CancelledProjects
  },
  props: ["user"],
  data() {
    return {
      offers: true,
      affected: false,
      finished: false,
      cancelled: false,
      in_progress: false,
      complete: false,
      edit: false,
      jobber: [],
      jobbers: [],
      user_id: this.user.id,
      description: "",
      address: "",
      gender: "",
      birthday: "",
      phone: "",
      photo: null,
      errors: "",
      professional_status: "",
      isLoading: false,
      errors: {}
    };
  },
  created() {
    this.profileCompleted();
  },
  methods: {
    showModal() {
      this.$refs["CompleteProfileModal"].show();
    },
    hideModal() {
      this.$refs["CompleteProfileModal"].hide();
    },
    async showEditModal(id) {
      this.$refs["EditProfileModal"].show();
      // console.log(id);
      try {
        const response = await axios.get("/api/jobbers/" + id);
        this.jobber = response.data.data;
        // console.log(this.jobber);
      } catch (e) {
        // handle the authentication error here
      }
    },
    hideEditModal() {
      this.$refs["EditProfileModal"].hide();
    },
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      reader.onload = e => {
        this.photo = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    async postJobber() {
      const config = {
        headers: { "content-type": "multipart/form-data" }
      };
      axios
        .post("http://localhost:8000/api/jobbers", this.$data)
        .then(response => {
          this.description = "";
          this.address = "";
          this.gender = "";
          this.birthday = "";
          this.phone = "";
          this.photo = "";
          this.professional_status = "";
          config;
          this.$emit("completed", response.data.data);
          if (response.status === 201) {
            this.$swal
              .fire({
                icon: "success",
                title: "Success",
                text: "Profile completed successfully!"
              })
              .then(result => {
                this.hideModal();
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
    },
    async profileCompleted() {
      try {
        const response = await axios.get("/api/jobbers");
        this.jobbers = response.data.data;
        //console.log(this.jobbers);
        for (let i = 0; i < this.jobbers.length; i++) {
          if (this.jobbers[i].user_id == this.user.id) {
            this.jobber = this.jobbers[i];
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    },
    updateProfile(id) {
      axios.put("/api/jobbers/" + id, this.jobber).then(response => {
        this.$router.push({ name: "JobberProfile" });
        if (response.status === 200) {
          this.$swal
            .fire({
              icon: "success",
              title: "Success",
              text: "Profile Updated successfully!"
            })
            .then(result => {
              this.hideEditModal();
              window.location.reload();
            });
        }
      });
    }
  }
};
</script>