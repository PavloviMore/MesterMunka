<template>
  <div class="p-0 m-0">
    <!--Termékek-->
    <div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div class="col" v-for="(termek, index) in Termekek" :key="index">
          <div class="card">
            <div class="card-body">
              <router-link :to="`/termekOldal/${termek.id}`">
                <h5 class="card-title text-truncate m-1">
                  {{ termek.termekNev }}
                </h5>
              </router-link>
              <router-link :to="`/termekOldal/${termek.id}`">
                <img class="card-img-top my-img img-thumbnail" :src="Img(termek.foto)"/>
                <!-- <img class="card-img-top my-img" src="../../assets/test.jpg"/> -->
                <!-- src="../../assets/yankee_dh_30.jpg" -->
              </router-link>
              <p class="card-text">
                {{
                  Number(termek.egysegArNetto * (1 + AFA)).toLocaleString()
                }}
                Ft
              </p>
              <a v-bind:id="termek.id" class="btn Cardbtn">Kosárba</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Termékek-->
  </div>
</template>
<script>
const axios = require("axios").default;

export default {
  name: "TermekekCards",
  props: ["Termekek"],
  data() {
    return {
      TermekekRows: [],
      AFA: null,
      queryGetTulajdosagok: "tulajdonsagokTabla",
      queryGetTermekek: "termekTabla",
    };
  },
  created() {
    this.getData();
    this.getAfa();
    this.ReadTermekek();
  },
  methods: {
    // Adatok
    getData() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetTermekek,
          },
        })
        .then((res) => {
          this.resDate = res.data;
          this.TermekekRows = res.data.rows;
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
    Img(foto){
      try {
        return require("../../assets/" + foto);
        
      } catch (error) {
        return require("../../assets/test.jpg")
        
      }
    },
  },
};
</script>

<style>
.kereses {
  border: 2px solid rgba(0, 0, 0, 0.5);
  border-radius: 15px;
  margin: 5px;
}

.Cardbtn:hover{
  background: black;
  color: white !important;
}

.none {
  display: none;
}

.my-img{
  height: 250px;
}
</style>
