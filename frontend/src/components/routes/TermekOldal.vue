<template>
<div>
  <!-- Termék -->
  <div>
    <div class="row">
        <!-- kép/cím -->
        <div class="col-sm-12 col-md-5 m-3">
          <h2 class="text-truncate">{{row.termekNev}}</h2>
          <img
            src="../../assets/test.jpg"
            alt=""
          >
        </div>
        <!-- kép/cím -->

        <!-- Info-->
        <div class="col-sm-11 col-md-6 p-2 float-end">
          <ul>
            <h2>Ár: {{row.egysegArNetto}} Ft</h2>
            <li class="">Leiras: {{row.leiras}}</li>
            <li>
              Kategoria: {{HarmadlagosKategoriaRows.length != 0 ? HarmadlagosKategoriaRows.find(kategoria => kategoria.id == row.kategoria).harmadlagosKategoriaNev : "0"}}
            </li>
            <li>Raktáron: {{row.raktarKeszlet}}</li>
            <button class="btn my-3" :value="row.id">
              Kosár
            </button>
          </ul>
        </div>
        <!-- Info-->
    </div>
  </div>
  <!-- Termék -->
</div>

</template>

<script>

class Termek{
  constructor(id=0,termekNev=null,egysegArNetto=null,leiras=null,kategoria=null,mertekegysegID=null,raktarKeszlet=null,foto=null,markaID=null)
  {
    this.id = id;
    this.termekNev = termekNev;
    this.egysegArNetto = egysegArNetto;
    this.leiras = leiras;
    this.kategoria = kategoria;
    this.mertekegysegID = mertekegysegID;
    this.raktarKeszlet = raktarKeszlet;
    this.foto = foto;
    this.markaID = markaID;
  }
}

const axios = require("axios").default;

export default {
  name:"termekOldal",
  data(){
    return{
      queryGetRecodByID: "termekRecordByID",
      queryGetHarmadlagoskategoria: "harmadlagosKategoriaTabla",
      HarmadlagosKategoriaRows:[],
      kategoria: null,
      row: new Termek(),
    };
  },
  created(){
    this.getData()
    this.getHarmadlagosKategoriak();
  },
  methods:{
    getData(){
      let id = this.$route.params.id;
      axios
      .get(this.url,{
        params:{
          query: this.queryGetRecodByID,
          id:id,
        },
      })
      .then((res) => {
        if(res.data.rows.lenght == 0){
          this.$route.push("/error/");
        }
        this.row = res.data.rows[0];
        // console.log(this.row);
      })
      .catch((error) => {
        console.log(error);
      })
    },
    getHarmadlagosKategoriak(){
      axios
        .get(this.url,{
            params:{
              query: this.queryGetHarmadlagoskategoria
            }
        })
        .then((res) => {
            this.HarmadlagosKategoriaRows = res.data.rows;
            // console.log(this.HarmadlagosKategoriaRows)
        }).catch((error) => {
            console.log(error);
        })
    },
  }
}
</script>

<style>
h2{
  width: 488px;
}
</style>