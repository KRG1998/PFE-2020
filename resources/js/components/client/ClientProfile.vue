<template>
  <main>
   <div class="row">
      <div class="col text-center ">
     <div class="col m-5">
        <CompleteClientProfile v-if="client == 0"  :user="user"/>
        <EditClientProfile v-else :user="user" :id="client.id"/>
     </div>
    </div>

    <div class="col">
      <div class="row">
        <div class="col m-5 main-section border-0 shadow text-center rounded">
          <div class="row border-0">
            <div class="col-lg-12 col-sm-12 col-12 profile-header bg-light rounded"></div>
          </div>
          <div class="row user-detail">
            <div class="col-lg-12 col-sm-12 col-12">
              <img v-if="client.photo"
                :src="'../storage/clients_photos/'+client.photo"
                class="rounded-circle img-thumbnail"
              />
           <img
              v-else
              class="rounded-circle img-thumbnail"
              src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
              alt="profile photo"
            /> 
              <h5 class="text-capitalize">{{user.first_name}} {{user.last_name}}</h5>
              
              <div class="row">
                <div class="col" v-if="client.address">
                  <span class="text-secondary mr-2">
                  <i class="fas fa-map-marker-alt"></i>
                </span>
                {{client.address}}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col text-center">
                  <span class="text-secondary mr-2">
                    <i class="fas fa-envelope"></i>
                  </span>
                  {{user.email}}
                </div>
                <div class="col" v-if="client.phone" >
                  <span class="text-secondary mr-2">
                    <i class="fas fa-mobile-alt"></i>
                  </span>
                  {{client.phone}}
                </div>
              </div>
              <hr />
              <span>{{client.description}}</span>
            </div>
          </div>
         
        </div>
      </div>
    </div>
   </div>
  </main>
</template>
<script>
import CompleteClientProfile from './CompleteClientProfile'
import EditClientProfile from './EditClientProfile'
export default {
  components:{
    CompleteClientProfile,
    EditClientProfile
  },
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
    },
    
  }
};
</script>
<style scoped>
.main-section {
  border: 1px solid #138496;
  background-color: #fff;
  width:100%;
}
.profile-header {
  background-image: url("../../assets/images/bgprofile.png");
  background-size: cover;
  background-position: center;

  height: 150px;
}
.user-detail {
  margin: -50px 0px 30px 0px;
}
.user-detail img {
  height: 100px;
  width: 100px;
}
.user-detail h5 {
  margin: 15px 0px 5px 0px;
}
.user-social-detail {
  padding: 15px 0px;
  
}
.user-social-detail a i {
  
  font-size: 23px;
  padding: 0px 5px;
}
</style>