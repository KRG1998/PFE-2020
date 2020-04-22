<template>
    <div class="card w-100 m-3 border-0 p-2 shadow-sm">
            <div class="row">
              <div class="col-2">{{ad.photos}}</div>
              <div class="col-8">
                <div class="row">
                  <div class="col mt-2">
                    <h3>{{ad.title}}</h3>
                  </div>
                  <div class="col mt-2">
                    <span class="bg-danger text-white rounded p-2">{{ad.category}}</span>
                  </div>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-marker"></i>
                  </h6>
                  <h6 class="ml-3">{{ad.description}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="far fa-calendar-alt"></i>
                  </h6>
                  <h6 class="ml-3">{{ad.date}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-users"></i>
                  </h6>
                  <h6 class="ml-3">{{ad.jobbers_number}}</h6>
                </div>
                <div class="row">
                  <h6 class="text-primary">
                    <i class="fas fa-coins"></i>
                  </h6>
                  <h6 class="ml-3">{{ad.amount}}</h6>
                </div>
              </div>
            </div>
          </div>
</template>