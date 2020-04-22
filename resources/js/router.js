import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './components/Home.vue'
import ClientProfile from './components/client/ClientProfile'
import AccountSettings from './components/client/AccountSettings'
import AdsCreate from './components/client/AdsCreate'
import JobberProfile from './components/jobber/JobberProfile'
import JobberSettings from './components/jobber/JobberSettings'
import PublishedMissions from './components/client/PublishedMissions'
import CompleteClientProfile from './components/client/CompleteClientProfile'
import EditClientProfile from './components/client/EditClientProfile'
import Ads from './components/client/Ads'
import CompleteJobberProfile from './components/jobber/CompleteJobberProfile'


Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component:  Home },
        { path: '/ads/create', component:  AdsCreate },
        { path: '/client/profile', component:  ClientProfile, name: 'ClientProfile' },
        { path: '/settings', component:  AccountSettings },
        { path: '/jobber/profile', component:  JobberProfile, name:'JobberProfile' },
        { path: '/jobber/settings', component:  JobberSettings },
        { path: '/ad/published', component:  PublishedMissions },
        { path: '/complete-profile', component:  CompleteClientProfile },
        { path: '/edit-profile', component:  EditClientProfile, name: 'EditClientProfile' },
        { path: '/ads', component:  Ads },
        { path: 'jobber/complete-profile', component:  CompleteJobberProfile },


    ],
    mode: 'history'
});