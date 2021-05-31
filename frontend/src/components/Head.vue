<template>
  <div>
    <!-- top menü -->

    <!-- top menü -->

    <!-- top content -->
    <div class=" w3-theme-d1">
      <div class="row container-fluid w3-theme-l1 m-0 p-0">

        <div
          class="col-md-6 d-flex justify-content-start upper-menu mx-1"
          v-for="(item, index) in TulajdonsagokRows"
          :key="index"
        >
          <p class="top-menu"><i class="bi bi-telephone-fill"></i> {{ item.telefon }}</p>
          <p class="top-menu"><i class="bi bi-house-fill"></i> {{ item.szekhely }}</p>
          <p class="top-menu">
            <a :href=item.email><i class="bi bi-envelope-open-fill"></i></a>
            </p>
          <p class="top-menu">
            <a :href=item.facebook><i class="bi bi-facebook"></i></a>
          </p>
        </div>



        <div class="col-5 d-flex upper-menu justify-content-end">
          <router-link to="/regisztracio/"
          v-if="loginAccessLevel == 0"
          class="p-0 mt-1">
            <p class="btn m-1 p-0 mt-1">
              Regisztáció
            </p></router-link
          >
          <router-link to="/bejelentkezes/"
            v-if="loginAccessLevel == 0"
            class="p-0 mt-1">
            <p class="btn m-1 p-0 m-1">
              Bejelentkezés
            </p>
            </router-link>

          <!-- New -->
          <div
            class="nav-item dropdown"
            v-if="Boolean(loginUserName)"
          >
            <button
              class="nav-link dropdown-toggle btn p-1 mx-1 mt-1"
              href="#"
              id="navbarDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              v-if="Boolean(loginUserName)"
            >
              {{loginUserName}}
            </button>
            <ul
              v-if="Boolean(loginUserName)"
              class="dropdown-menu"
              aria-labelledby="navbarDropdown"
            >
              <li><a
                  class="dropdown-item"
                  href="#"
                  @click.prevent="logout()"
                >Logout</a></li>
            </ul>
          </div>
          
          <div>
            <router-link 
              to="/kosar/"
              v-if="loginAccessLevel > 0"
            >
              <button class="btn p-1 mt-1">
                <p class="m-0 p-0 mx-1 mt">Kosár</p>
              </button>
            </router-link>
          </div>

          
        </div>
      </div>

      <h1 class="display-3 p-5">
        <router-link to="/">Bolt</router-link>
      </h1>

      <nav class="col-12 navbar navbar-expand-lg navbar-light w3-theme-d1">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <!-- rólunk teszt -->
              <!-- <li class="nav-item">
                <router-link to="/rolunk/" class="nav-link"
                  >Rólunk-teszt</router-link
                >
              </li> -->
              <!-- rólunk teszt -->

              <!-- feltoltes -->
              <li class="nav-item mx-3" 
                v-if="loginAccessLevel == 2">
                <div class="dropend">
                  <div
                    class="feltotltes dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Feltöltés
                  </div>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton"
                  >
                    <li>
                      <router-link
                        class="dropdown-item"
                        to="/feltoltes/termekek"
                        >Termékek</router-link
                      >
                    </li>
                    <li>
                      <router-link class="dropdown-item" to="/feltoltes/markak"
                        >Márkák</router-link
                      >
                    </li>
                    <li>
                      <router-link
                        class="dropdown-item"
                        to="/feltoltes/mertekegyseg"
                        >Mértékegység</router-link
                      >
                    </li>
                    <li>
                      <router-link
                        class="dropdown-item"
                        to="/feltoltes/kategoria"
                        >Kategoriák</router-link
                      >
                    </li>
                  </ul>
                </div>
              </li>
              <!-- feltoltes -->
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
const axios = require("axios").default;
// import TermekekCards from "./TermekekCards.vue";

export default {
  name: "Head",
  data() {
    return {
      TulajdonsagokRows: [],
      queryGetTulajdosagok: "tulajdonsagokTabla",
    };
  },
  computed:{
    loginAccessLevel(){
      return this.$root.$data.loginAccessLevel;
    },
    loginUserName(){
      return this.$root.$data.loginUserName;
    },
  },
  created() {
    this.getTulajdosagok();
  },
  methods: {
    // Tulajdoságok
    getTulajdosagok() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetTulajdosagok,
          },
        })
        .then((res) => {
          this.TulajdonsagokRows = res.data.rows;
          console.log(this.TulajdonsagokRows);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    logout(){
       let params = {
        query: "logoutUser",
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res.data);
          this.$root.$data.loginUserName = null;
          this.$root.$data.loginAccessLevel = null;

          if (this.$route.name != "belepes") {
            this.$router.push({ name: "belepes" });
          }
        })
        .catch(function (error) {
          // handle error
          console.log(error);
            //nem jó!!! inkább a hiba oldalra menjen
          this.$root.$data.loginUserName = null;
          this.$root.$data.loginAccessLevel = null;

          if (this.$route.name != "belepes") {
            this.$router.push({ name: "belepes" });
          }
        });
    }
  },
};
</script>

<style>
a {
  text-decoration: none !important;
  color: black !important;
}

.upper-menu p {
  font-size: 16px;
}
.top-menu{
  padding-left:9px;
  margin-top: 10px;
}

.feltotltes{
  margin-left:6px !important;
  padding: 12px;
  color: black;
  font-size: 1.1rem;
}

.top-menu i .bi-facebook{
  font-size:1.2rem;
  margin-bottom: 10px;
  color: lightblue !important;
}
.bi-envelope-open-fill{
  color: #EA4335 !important;
}

.bi-facebook{
  color: #3b5998;
}

</style>
