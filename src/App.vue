<template>
  <div class="vue-template">
    <!-- Navigation -->
    <nav
      class="navbar shadow bg-white rounded justify-content-between flex-nowrap flex-row fixed-top"
    >
      <div class="container">
        <img
          src="https://its.alliedglobalbpo.com/static/media/logoallied.b8ec141f.png"
          alt="Allied Global, logo"
          height="50px"
        />
      </div>
    </nav>

    <!-- Main -->
    <div class="App">
      <div class="vertical-center">
        <div class="inner-block">
          <router-view />
        </div>
      </div>
    </div>
  </div>
</template>