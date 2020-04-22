<template>
  <div class>
    <div class="card bg-light w-100">
      <div class="row no-gutters w-100">
        <div class="col-auto">
          <img
            :src="'../storage/clients_photos/'+client.photo"
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
          <p class="font-weight-light text-secondary">{{client.description}}</p>
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
              {{client.phone}}
            </div>
          </div>
          <div class="row">
            <div class="col font-weight-bold text-secondary">
              <span class="text-primary mr-2">
                <i class="fas fa-home"></i>
              </span>
              {{client.address}}
            </div>
          </div>
        </div>
        <div class="col mt-5 mr-4">
          <div class="float-right">
            <router-link
              to="/complete-profile"
              v-if="client == 0"
              v-on:click="showModal"
              class="btn btn-primary text-white"
            >
              <i class="far fa-edit"></i> Complete profile
            </router-link>
            <router-link
              :to="{name: 'EditClientProfile', params: { id: client.id }}"
              v-else
              class="btn btn-primary text-white"
            >
              <i class="far fa-edit"></i> Edit profile
            </router-link>
          </div>
          <br />
        </div>
      </div>
      <div class="card-footer bg-white">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-primary shadow-sm border-0 text-white ">
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
                
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card shadow-sm bg-warning text-white  border-0">
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
                
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card shadow-sm bg-success  border-0 text-white ">
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
                
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card shadow-sm bg-danger borser-0 text-white ">
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
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row w-100 mt-3">
      <div class="col-3 w-100">
        <div class="card w-100">
          <div class="card-header font-weight-bold text-primary">
            <div class="row">
              <div class="col">Something</div>
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
        <div class="card h-100 w-100">
          <card class="body">
            
          </card>
        </div>
      </div>
    </div>
  </div>
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