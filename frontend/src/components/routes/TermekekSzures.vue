<template>
  <div class="row p-0 m-0">
    <!-- Menü -->
    <nav class="col-12 navbar navbar-expand-lg navbar-light w3-theme-l1">
      <div class="container-fluid">
        <div class="navbar-collapse w-auto" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!--Kategoriák-->
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                role="button"
                type="button" 
                id="dropdownMenuClickableInside" 
                data-bs-toggle="dropdown"
                data-bs-auto-close="outside" 
                aria-expanded="false"
              >
                Kategoria
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!--Masodlagos-->
                <div
                  class="btn-group dropend navbar-collapse"
                  id="navbarSupportedContent"
                >
                  <li
                    class="nav-item dropdown"
                    v-for="kategoria in FoKategoriaRows"
                    :key="kategoria.id"
                  >
                    <a
                      class="dropdown-item"
                      href="#"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      {{ kategoria.foKategoriaNev }}
                    </a>
                    <ul>
                      <li
                        v-for="masaodlagosKategoria in MasodlagosKategoriaRows"
                        :key="masaodlagosKategoria.id"
                        :class="kategoria.id != masaodlagosKategoria.foKategoriaID ? 'none' : ''"
                      >
                        <a
                          class="dropdown-item"
                          href="#"
                          role="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                          v-if="
                            kategoria.id == masaodlagosKategoria.foKategoriaID
                          "

                        >
                          <!-- Lekérdezés majd ide -->
                          {{ masaodlagosKategoria.masodlagosKategoriaNev }}
                        </a>
                      </li>
                    </ul>
                  </li>
                </div>
                <!--Masodlagos-->
              </ul>
              <!--Kategoriák-->
            </li> 
            
          </ul>
        </div>
      </div>
    </nav>
    <!--Menü  -->
    <!--Side-->
    <div class="col-md-3 col-12 w3-theme-d4 p-0">
      <!-- SideContent -->
      <div class="row col-11 m-2 d-flex justify-content-center">
        <div>
          <button class="col-12 w3-theme-d4 kereses m-2" @click="getFiltered">Keresés</button>
        </div>
        <div class="col-11">
          <!-- Név -->
          <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"

              v-model="filter.termekNev"
            />
        </div>
        <div class="col-12">
          <!-- Ár -->
          <label for="customRange1" class="form-label my-1">Ár: {{filter.egysegArNetto == 0 ? "Összes" : filter.egysegArNetto}}</label>
          <input 
            v-model="filter.egysegArNetto"
            type="range"
            step="1000"
            class="form-range"
            id="customRange1"
            min=0
            max=100000
            value="30000"
          />
        </div>
        <div>
          <!-- márka -->
          <label for="customRange1" class="form-label">Márkák</label>
          <select class="form-select" size="6" id="Sourchmarka" v-model="filter.markaID">
            <option :value="0">
              Összes márka
            </option>
            <option
              v-for="(marka,index) in markaRows"
              :key="index"
              :value="marka.id"
              required
            >
              {{ marka.marka }}
            </option>
          </select>
        </div>
      </div>
      <!-- /SideContent -->
    </div>
    <div class="col-md-9 col-12 p-3">
      <router-view/>
      <TermekCards
        :Termekek="TermekekRows"
      >
      </TermekCards>
    </div>
  </div>
</template>
<script>
const axios = require("axios").default;
import TermekCards from "./TermekekCards";

class Filter {
  constructor(termekNev = "",egysegArNetto = 0,markaID=0){
    this.query = "termekRecordByFilter";
    this.termekNev = termekNev;
    this.egysegArNetto = egysegArNetto;
    this.markaID = markaID;
  }
}

export default {
  name: "TermekekCards",
  components:{
    TermekCards
  },
  data() {
    return {
      resDate: [],
      TermekekColumns: [],
      TermekekRows: [],
      markaRows: [],
      filter: new Filter(),
      hiba:null,
      MinAr:null,
      MaxAr:null,
      AFA: null,
      FoKategoriaRows: [],
      MasodlagosKategoriaRows: [],
      HarmadlagosKategoriaRows: [],
      queryGetTermekek: "termekekTabla",
      queryGetTermekByNev: "termekRecordByNev",
      queryGetTulajdosagok: "tulajdonsagokTabla",
      queryGetFoKategoria: "foKategoriaTabla",
      queryGetMasodlagosKategoria: "masodlagosKategoriaTabla",
      queryGetHarmadlagosKategoria: "harmadlagosKategoriaTabla",
      queryGetMarka: "markakTabla",
    };
  },
  created() {
    this.getData();
    this.getAfa();
    this.getFoKategoriak();
    this.getMasodlagosKategoriak();
    this.getHarmadlagosKategoriak();
    this.getMarka();
    this.getArAdatok();
    this.filter = new Filter();
  },
  methods: {
    // Adatok
    getData() {
      let params = this.filter;
      axios
        .get(this.url, {
          params
        })
        .then((res) => {
          if(res.data.rows.length == 0){
            this.hiba = "Nincs találat"
            this.AllData();
          }else{
            this.hiba = "";
            
            this.resData = res.data;
            this.TermekekColumns = res.data.columns;
            this.TermekekRows = res.data.rows;
          }
          // console.log(this.TermekekColumns);
          // console.log("Terméknév = " + this.filter.termekNev);
          // console.log("Ár = " + this.filter.egysegArNetto);
          // console.log(this.hiba);
        })
        .catch((error) => {
          console.log(error);
        });
        // console.log(this.filter.egysegArNetto);
    },
    getArAdatok(){
      this.MinAr = Math.min(this.TermekekRows.egysegNettoAr);
      // console.log(this.MinAr);
    },
    AllData(){
      axios
        .get(this.url, {
          params: {
            query: this.queryGetTermekek,
          },
        })    
        .then((res) => {
          console.log(res.data);
          this.resDate = res.data;
          this.TermekekRows = res.data.rows;
          /*console.log(this.columns);*/
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // Áfa
    getAfa() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetTulajdosagok,
          },
        })
        .then((res) => {
          this.AFA = res.data.rows[0].AFA;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getFoKategoriak() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetFoKategoria,
          },
        })
        .then((res) => {
          this.FoKategoriaRows = res.data.rows;
          // console.log(this.FoKategoriaRows);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMasodlagosKategoriak() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetMasodlagosKategoria,
          },
        })
        .then((res) => {
          this.MasodlagosKategoriaRows = res.data.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getHarmadlagosKategoriak() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetHarmadlagosKategoria,
          },
        })
        .then((res) => {
          this.HarmadlagosKategoriaRows = res.data.rows;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMarka() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetMarka,
          },
        })
        .then((res) => {
          this.markaRows = res.data.rows;
          // console.log(this.markaRows);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getFiltered(){
      this.getData();
    },



    // getTesztCards() {
    //   axios
    //     .get(this.url, {
    //       params: {
    //         query: this.queryGetTermekByNev,
    //         termekNev: this.termekNev,
    //       },
    //     })
    //     .then((res) => {
    //       this.resDate = res.data;
    //       this.TermekekColumns = res.data.columns;
    //       this.TermekekRows = res.data.rows;
    //       // console.log(this.rows);
    //       this.getData();
    //     })
    //     .catch((error) => {
    //       console.log(error);
    //     });
    // },
  },
};
</script>

<style>
.kereses{
  border: 2px solid rgba(0, 0, 0, 0.5);
  border-radius: 15px;
  margin: 5px;
}

.none{
  display: none;
}
</style>
