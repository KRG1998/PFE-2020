<template>
  <main>
    <h1 class="mt-4 text-secondary">Subscriptions</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Subscriptions</li>
    </ol>
    <div class="row p-4">
      <div class="col-4 mb-2">
        <a href="#" v-on:click="showCreateSubscriptionmodal()">
          <div
            id="button"
            style="background-color: #dae0e580;border-color:#dee2e6;height:435px"
            class="card text-center mb-2 shadow-sm"
          >
            <span style="color:#adb5bd;margin-top:140px">
              <i class="fas fa-plus fa-9x"></i>
            </span>
          </div>
        </a>
      </div>
      <div class="col-4 mb-2" v-for="subscription in subscriptions" :key="subscription.id">
        <div style="height:435px" class="card bg-white border-success shadow-sm" v-if="subscription.type == 'basic'">
          <div class="card-header bg-success text-center border-success">
            <h4 class="text-capitalize border-success text-white">{{subscription.name}}</h4>
            <span class="text-center text-white text-capitalize">{{subscription.type}}</span>
          </div>
          <div class="card-body border-success">
            <h1 class="text-success text-center">{{subscription.price}} £</h1>
            <h4 class="text-center text-secondary">{{subscription.duration}} Months</h4>
            <p class="text-center text-secondary m-2">{{subscription.description}}</p>
          </div>
          <div style="background-color: #dae0e580;" id="button" class="card-footer border-success">
            <div class="row">
              <a href="#" class="col btn text-center text-primary" v-on:click="showUpdateSubscriptionModal(subscription.id)">
                <i class="far fa-edit"></i>
              </a>
              <a href="#" class="col btn text-center text-danger" v-on:click="deleteSubscription(subscription.id)">
                <i class="far fa-trash-alt fa-2px"></i>
              </a>
            </div>
          </div>
        </div>
        <div style="height:435px" class="card bg-white border-info shadow-sm" v-if="subscription.type == 'standart'">
          <div class="card-header text-center bg-info border-info">
            <h4 class="text-capitalize border-info text-white">{{subscription.name}}</h4>
            <span class="text-center text-white text-capitalize">{{subscription.type}}</span>
          </div>
          <div class="card-body border-info">
            <h1 class="text-info text-center">{{subscription.price}} £</h1>
            <h4 class="text-center text-secondary">{{subscription.duration}} Months</h4>
            <p class="text-center text-secondary m-2">{{subscription.description}}</p>
          </div>
          <div style="background-color: #dae0e580;" id="button" class="card-footer border-info">
            <div class="row">
              <a href="#" class="col btn text-center text-primary " v-on:click="showUpdateSubscriptionModal(subscription.id)">
                <i class="far fa-edit"></i>
              </a>
              <a href="#" class="col btn text-center text-danger" v-on:click="deleteSubscription(subscription.id)">
                <i class="far fa-trash-alt fa-2px"></i>
              </a>
            </div>
          </div>
        </div>
        <div style="height:435px;border-color:#d8b811" class="card bg-white shadow-sm" v-if="subscription.type == 'premium'">
          <div style="background-color:#d8b811" class="card-header text-center  border-warning">
            <h4 class="text-capitalize border-warning text-white">{{subscription.name}}</h4>
            <span class="text-center text-white text-capitalize">{{subscription.type}}</span>
          </div>
          <div class="card-body border-warning">
            <h1 class="text-warning text-center">{{subscription.price}} £</h1>
            <h4 class="text-center text-secondary">{{subscription.duration}} Months</h4>
            <p class="text-center text-secondary m-2">{{subscription.description}}</p>
          </div>
          <div style="background-color: #dae0e580;" id="button" class="card-footer border-warning">
            <div class="row">
              <a href="#" class="col btn text-center text-primary" v-on:click="showUpdateSubscriptionModal(subscription.id)">
                <i class="far fa-edit"></i>
              </a>
              <a href="#" class="col btn text-center text-danger" v-on:click="deleteSubscription(subscription.id)">
                <i class="far fa-trash-alt fa-2px"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <b-modal ref="CreateSubscriptionModal" hide-footer hide-header>
      <CreateSubscriptionForm :user="user"></CreateSubscriptionForm>
    </b-modal>
         <b-modal ref="EditSubscriptionModal" hide-footer hide-header>
      <EditSubscriptionForm :id="subscription_id"></EditSubscriptionForm>
    </b-modal>
  </main>
</template>
<script>
import EditSubscriptionForm from './EditSubscriptionForm'
import CreateSubscriptionForm from "./CreateSubscriptionForm";
export default {
  components: {
    CreateSubscriptionForm,
    EditSubscriptionForm
  },
  data() {
    return {
      subscriptions: {},
      subscription_id:0,
    };
  },
  props: ["user"],
  name: "Supscriptons",
  created() {
    this.getSubscriptions();
  },

  methods: {
    showUpdateSubscriptionModal(id) {
      this.subscription_id=id;
      this.$refs["EditSubscriptionModal"].show();
    },
    showCreateSubscriptionmodal() {
      this.$refs["CreateSubscriptionModal"].show();
    },
    async getSubscriptions() {
      try {
        const response = await axios.get("/api/subscriptions");
        this.subscriptions = response.data.data;
        console.log(this.subscriptions);
      } catch (e) {
        // handle the authentication error here
      }
    },
   deleteSubscription(id) {
      
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
          axios.delete("api/subscriptions/" + id).then(response => {
            this.result.splice(id, 1);
          });
          this.$swal(
            "Deleted!",

            "The subscription has been deleted.",

            "success"
          ).then(result => {
            location.reload();
          });
        }
        
      });
     
    }
     
    }
  }

</script>