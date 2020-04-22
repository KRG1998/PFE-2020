<template>
  <main>
    <div class="container">
      <div class="row">
        <div class="card w-100 shadow-sm bg-white p-4 rounded border-0">
          <div class="card-header bg-white">
            <div class="row">
              <div class="col mt-5">
                <div class="container">
                  <div class="row text-secondary">
                    <div class="col-6 col">
                      <h1 class="mb-4 text-capitalize">{{user.first_name}} {{user.last_name}}</h1>
                    </div>
                    <div class="col-6 col"></div>

                    <div class="w-100 d-none d-md-block"></div>
                    <div class="col-6 col">
                      <div class="row mx-lg-n5">
                        <div class="col-2 mt-2">
                          <i class="fas fa-envelope"></i>
                        </div>
                        <div class="col-8 mt-2">{{user.email}}</div>
                      </div>
                    </div>
                    <div class="col-6 col">
                      <div class="row mx-lg-n5">
                        <div class="col-2 mt-2">
                          <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="col-8 mt-2">
                          <router-link
                            to="/complete-profile"
                            v-if="client == 0"
                            class
                          >[Complete your profile]</router-link>
                          <span v-else>{{client.phone}}</span>
                        </div>
                      </div>
                    </div>

                    <div class="w-100 d-none d-md-block"></div>
                    <div class="col-6 col">
                      <div class="row mx-lg-n5">
                        <div class="col-2 mt-2">
                          <i class="fas fa-home"></i>
                        </div>
                        <div class="col-8 mt-2">
                          <router-link
                            to="/complete-profile"
                            v-if="client == 0"
                            class
                          >[Complete your profile]</router-link>
                          <span v-else>{{client.address}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col">
                      <div class="row mx-lg-n5">
                        <div class="col-2 mt-2">
                          <i class="fas fa-venus-mars"></i>
                        </div>
                        <div class="col-8 mt-2">
                          <router-link
                            to="/complete-profile"
                            v-if="client == 0"
                            class
                          >[Complete your profile]</router-link>
                          <span v-else>{{client.gender}}</span>
                        </div>
                      </div>
                    </div>

                    <div class="w-100 d-none d-md-block"></div>
                    <div class="col-6 col">
                      <div class="row mx-lg-n5">
                        <div class="col-2 mt-2">
                          <i class="fas fa-birthday-cake"></i>
                        </div>
                        <div class="col-8 mt-2">
                          <router-link
                            to="/complete-profile"
                            v-if="client == 0"
                            class
                          >[Complete your profile]</router-link>
                          <span v-else>{{client.birthday}}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-6 col"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-auto mt-5">
                <div class="row">
                  <div class="col-3">
                    <div class="row">
                      <a href="#" class="text-info">
                        <i class="far fa-edit"></i>
                      </a>
                    </div>
                    <div class="row">
                      <img
                        :src="'../storage/clients_photos/'+client.photo"
                        style="height:200px;width:200px"
                        class="img-thumbnail rounded-circle ml-5 mt-5 mb-2"
                        alt
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col col-lg-2">
                <router-link
                  to="/complete-profile"
                  v-if="client == 0"
                  class="btn btn-info text-white border shadow-sm"
                >
                  Complete
                  <i class="far fa-edit"></i>
                </router-link>
                <router-link
                  :to="{name: 'EditClientProfile', params: { id: client.id }}"
                  v-else
                  class="btn btn-info"
                >
                  <span class="text-white">
                    <i class="far fa-edit"></i>
                    Edit profile
                  </span>
                </router-link>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2 text-secondary">Description</div>
              <div class="col-sm-8">
                <router-link to="/complete-profile" v-if="client == 0" class>[Complete your profile]</router-link>
                <span v-else>{{client.description}}</span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-primary shadow border-0 text-white mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-1">
                          <h4>
                            <i class="fab fa-creative-commons-by"></i>
                          </h4>
                        </div>
                        <div class="col-8">
                          <h5>Assigned Missions</h5>
                        </div>
                        <div class="col-2">
                          <h4>{{assigned}}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="#">View Details</a>
                      <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-warning text-white mb-4 shadow border-0">
                    <div class="row">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-1">
                            <h4>
                              <i class="fas fa-spinner"></i>
                            </h4>
                          </div>
                          <div class="col-8">
                            <h5>Missions in progress</h5>
                          </div>
                          <div class="col-2">
                            <h4>{{inprogress}}</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="#">View Details</a>
                      <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-success shadow border-0 text-white mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-1">
                          <h4>
                            <i class="fas fa-clipboard-check"></i>
                          </h4>
                        </div>
                        <div class="col-8">
                          <h5>Missions Completed</h5>
                        </div>
                        <div class="col-2">
                          <h4>{{completed}}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="#">View Details</a>
                      <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="card bg-danger shadow borser-0 text-white mb-4">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-1">
                          <h4>
                            <i class="fas fa-ban"></i>
                          </h4>
                        </div>
                        <div class="col-8">
                          <h5>Cancelled Missions</h5>
                        </div>
                        <div class="col-2">
                          <h4>{{cancelled}}</h4>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                      <a class="small text-white stretched-link" href="#">View Details</a>
                      <div class="small text-white">
                        <i class="fas fa-angle-right"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
      ads: [],
      cancelled: 0,
      completed: 0,
      assigned: 0,
      inprogress: 0,
      client: 0,
      clients: [],
      cExist: 0
    };
  },
  created() {
    this.profileCompleted();
    //this.getAds();
  },

  methods: {
    async profileCompleted() {
      try {
        const response = await axios.get("/api/clients");
        this.clients = response.data.data;
        console.log(this.clients);
        for (let i = 0; i < this.clients.length; i++) {
          if (this.clients[i].user_id == this.user.id) {
            this.client = this.clients[i];
          }
        }
      } catch (e) {
        // handle the authentication error here
      }
    }
  }
};
</script>