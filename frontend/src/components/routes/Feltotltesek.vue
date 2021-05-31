<template>
  <div class="container-fluid w3-theme-l1">
    <!-- Táblák -->
    <nav class="navbar navbar-expand-lg navbar-light w3-theme-d1">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- rólunk teszt -->
                <li class="nav-item">
                <router-link to="/feltoltes/termekek" class="nav-link">Termékek</router-link>
                </li>
                <!-- rólunk teszt -->

                <!-- feltoltes -->
                <li class="nav-item">
                <router-link to="/feltoltes/markak" class="nav-link">Márkák</router-link>
                </li>
                <!-- feltoltes -->
              </ul>
            </div>
        </div>
    </nav>
    <!-- Táblák -->

      <!-- <h1>{{Title}}</h1>
      <div class="">
          tábla
          <table class="table table-bordered">
              <tr>
                <th
                    v-for="(termek,index) in TermekekColumns" :key="index"
                >
                    {{termek}}
                </th>
                <th>
                    <button
                        type="button"
                        class="btn btn-md my-p-button"
                        @click="onClickedRefresh()"
                        >
                        <i class="bi bi-arrow-counterclockwise"></i>
                    </button>
                </th>
                <th>
                    <button
                        type="button"
                        class="btn btn-outline-success btn-md my-p-button"
                        @click="onClickedInsert()"
                        >
                        <i class="bi bi-plus"></i>
                    </button>
                </th>
              </tr>
              <tr v-for="(termek,index) in TermekekRows" :key="index" :value="index">
                  <td>
                      {{termek.id}}
                  </td>
                  <td>
                      {{termek.termekNev}}
                  </td>
                  <td>
                      {{termek.egysegArNetto}}
                  </td>
                  <td>
                      {{termek.leiras}}
                  </td>
                  <td>
                      {{HarmadlagosKategoriaRows.length != 0 ? HarmadlagosKategoriaRows.find(kategoria => kategoria.id == termek.kategoria).harmadlagosKategoriaNev : "0"}}
                  </td>
                  <td>
                      {{mertekegysegRows.length != 0 ? mertekegysegRows.find(egyseg => egyseg.id == termek.mertekegysegID).egyseg : "0"}}
                  </td>
                  <td>
                      {{termek.raktarKeszlet}}
                  </td>
                   <td>
                      {{termek.foto}}
                  </td>
                  <td>
                      {{markaRows.length != 0 ? markaRows.find(marka => marka.id == termek.markaID).marka : "0"}}
                  </td>
                  <td>
                      <button
                        type="button"
                        class="btn btn-outline-warning btn-md my-p-button"
                        @click="onClickedUpdate(termek)"
                        >
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                  </td>
                  <td>
                    <button
                        type="button"
                        class="btn btn-outline-danger btn-md my-p-button"
                        @click="onClickedDelete(termek)"
                        >
                        <i class="bi bi-x"></i>
                    </button>
                  </td>
              </tr>
          </table>
        tábla
        Modal
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{modalTitle}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation row">
                        név
                        <div class="col-md-8">
                            <label
                                for="nev"
                                class="form-label"
                            >
                                Termék név:
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="termekNev"
                                v-model="row.termekNev"
                                required
                            >

                            <div class="invalid-feedback">
                                Kötelező!
                            </div>
                        </div>
                        /név
                        Ár
                        <div class="col-md-4">
                            <label
                                for="ar"
                                class="form-label"
                            >Ár:
                            </label>
                            <input
                                type="number"
                                class="form-control"
                                id="ar"
                                v-model="row.egysegArNetto"
                                required
                            >
                            <div class="invalid-feedback">
                                Kötelező!
                            </div>
                        </div>
                        /Ár
                        Leiras
                        <div class="col-md-8">
                            <label
                                for="leiras"
                                class="form-label"
                            >Leiras:
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="leiras"
                                v-model="row.leiras"
                                required
                            >
                            <div class="invalid-feedback">
                                Kötelező!
                            </div>
                        </div>
                        /leíras
                        raktareKEszlet
                        <div class="col-md-4">
                            <label
                                for="ar"
                                class="form-label"
                            >Készleten:
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="ar"
                                v-model="row.raktarKeszlet"
                                required
                            >

                            <div class="invalid-feedback">
                            Kötelező!
                            </div>
                        </div>
                        /raktareKeszlet
                        Kategoria
                        <div class="col-md-5">
                            <label
                                for="kategoria"
                                class="form-label"
                            >kategoria:
                            </label>

                            <select 
                                class="form-select" 
                                size="6" 
                                id="kategoria" 
                                v-model="row.kategoria"
                            >
                                <option 
                                    v-for="kategoria in HarmadlagosKategoriaRows"
                                    :key="kategoria.id" 
                                    :value="kategoria.id"
                                    :selected="kategoria.id == row.kategoria ? 'selected' : ''"
                                    required
                                >
                                    {{kategoria.harmadlagosKategoriaNev}}
                                </option>
                            </select>

                            <div class="invalid-feedback">
                            Kötelező!
                            </div>
                        </div>
                        /Kategoria
                        Márka
                        <div class="col-md-4">
                            <label
                                for="marka"
                                class="form-label"
                            >Márka:
                            </label>

                            <select class="form-select" size="6" id="marka" v-model="row.markaID">
                                <option 
                                    v-for="marka in markaRows" 
                                    :key="marka.id" 
                                    :value="marka.id"
                                    :selected="marka.id == row.markaID ? 'selected' : ''"
                                    required
                                >
                                    {{marka.marka}}
                                </option>
                            </select>

                            <div class="invalid-feedback">
                            Kötelező!
                            </div>
                        </div>
                        /Márka
                        Mértékegység
                        <div class="col-md-3">
                            <label
                                for="mertekegyseg"
                                class="form-label"
                            >
                                Mértékegység:
                            </label>

                            <select 
                                class="form-select" 
                                size="6" 
                                id="mertekegyseg" 
                                v-model="row.mertekegysegID"
                            >
                                <option 
                                    v-for="mertekegyseg in mertekegysegRows" 
                                    :key="mertekegyseg.id" 
                                    :value="mertekegyseg.id"
                                    :selected="mertekegyseg.id == row.mertekegyseg ? 'selected' : ''"
                                    required
                                >
                                    {{mertekegyseg.egyseg}}
                                </option>
                            </select>

                            <div class="invalid-feedback">
                                Kötelező!
                            </div>
                        </div>
                        /Mértékegység
                        Fotó
                        <div class="col-md-4">
                            <label
                                for="foto"
                                class="form-label"
                            >Fotó:
                            </label>
                            
                            <input
                                type="text"
                                class="form-control"
                                id="foto"
                                v-model="row.foto"
                                required
                            >

                            <div class="invalid-feedback">
                                Kötelező!
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="formCancel()">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="formSave()">Hozzáfűzés</button>
                </div>
            </div>
        </div>
        </div>
        modal
      </div> -->
  </div>
</template>

<script>
const axios = require("axios").default;
const bootstrap = require("bootstrap");


class Termek {
  constructor(id,termekNev, egysegArNetto, kategoria, mertekegysegID, raktarKeszlet,foto,markaID) {
    this.id = id;
    this.termekNev = termekNev;
    this.egysegArNetto = egysegArNetto;
    this.kategoria = kategoria;
    this.mertekegysegID = mertekegysegID;
    this.raktarKeszlet = raktarKeszlet;
    this.foto = foto;
    this.markaID = markaID;
  }
}

export default {
    name:"Adatkezeles",
    data(){
        return {
            TermekekColumns: [],
            TermekekRows: [],
            HarmadlagosKategoriaRows: [],
            mertekegysegRows: [],
            markaRows: [],
            row: new Termek(),
            Title: "Termékek",

            // modal
            modalTitle:null,
            modalWindow: null,
            status: null,
            form: null,

            // GET
            queryGetTermekek:"termekekTabla",
            queryGetHarmadlagosKategoria: "harmadlagosKategoriaTabla",
            queryGetMertekegyseg: "mertekegysegTabla",
            queryGetMarka: "markakTabla",
            // POST
            queryInsertTermek: "termekInsert",
            queryUpdateTermek: "termekUpdate",
            queryDeleteTermek: "termekDelete",
        };
    },
    created(){
        this.getData();
        this.getHarmadlagosKategoriak();
        this.getMertekegyseg();
        this.getMarka();
    },
    mounted(){
        this.modalWindow = new bootstrap.Modal(document.getElementById("Modal"));
        this.form = document.querySelector(".needs-validation");
    },
    methods: {
        // Data
        getData (){
            axios
            .get(this.url,{
              params:{
                query : this.queryGetTermekek,
              }  
            })
            .then((res) => {
                this.TermekekColumns = res.data.columns;
                this.TermekekRows = res.data.rows;
                /*console.log(this.columns);*/
            })
            .catch((error) => {
                console.log(error);
            });
        },
        getHarmadlagosKategoriak(){
          axios
            .get(this.url,{
                params:{
                  query: this.queryGetHarmadlagosKategoria
                }
            })
            .then((res) => {
                this.HarmadlagosKategoriaRows = res.data.rows;
                console.log(this.HarmadlagosKategoriaRows);
            }).catch((error) => {
                console.log(error);
            })
        },
        getMertekegyseg(){
          axios
            .get(this.url,{
                params:{
                  query: this.queryGetMertekegyseg
                }
            })
            .then((res) => {
                this.mertekegysegRows = res.data.rows;
                // console.log(this.mertekegysegRows);
            }).catch((error) => {
                console.log(error);
            })
        },
        getMarka(){
          axios
            .get(this.url,{
                params:{
                  query: this.queryGetMarka
                }
            })
            .then((res) => {
                this.markaRows = res.data.rows;
                // console.log(this.markaRows);
            }).catch((error) => {
                console.log(error);
            })
        },
        // OnclickFunctions
        onClickedDelete(rows) {
            let id = rows.id;
            if (confirm("Töröljem?")) {
                this.deleteRow(id);
            }
        },
        onClickedUpdate(row) {
            this.modalTitle = "Adat módosítás";
            this.status = "update";
            this.row = { ...row };
            console.log(this.status);

            //űrlap indít
            this.formShow();
        },
        onClickedInsert() {
            this.modalTitle = "Új autó bevitele";
            this.status = "insert";
            this.row = new Termek();
            console.log(this.status);
            //űrlap indít
            this.formShow();
        },
        onClickedRefresh() {
            this.status = "refresh";
            this.getData();
        },
        // Amik lefutnak az onlicknél
        deleteRow(id) {
            let query = this.queryDeleteTermek;
            console.log(id);
            let params = {
                query: query,
                termekId: id,
            };
            axios
            .post(this.url, params)
            .then((res) => {
                console.log(res.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        },
        insertRow() {
            //post
            let params = {
                query: this.queryInsertTermek,
                termekNev: this.row.termekNev,
                egysegArNetto: this.row.egysegArNetto,
                leiras: this.row.leiras,
                kategoria: this.row.kategoria,
                mertekegysegID: this.row.mertekegysegID,
                raktarKeszlet: this.row.raktarKeszlet,
                foto: this.row.foto,
                markaID: this.row.markaID,
            };
            axios
                .post(this.url, params)
                .then((res) => {
                    console.log(res);
                })
                .catch((error) => {
                    console.log(error);
                });
            console.log(this.row);
        },
        updateRow() {
            //post
            let params = {
                query: this.queryUpdateTermek,
                termekNev: this.row.termekNev,
                egysegArNetto: this.row.egysegArNetto,
                leiras: this.row.leiras,
                kategoria: this.row.kategoria,
                mertekegysegID: this.row.mertekegysegID,
                raktarKeszlet: this.row.raktarKeszlet,
                foto: this.row.foto,
                markaID: this.row.markaID,
                id: this.row.id,
            };
            axios
                .post(this.url, params)
                .then(() => {
                    this.getData();
                })
                .catch((error) => {
                    console.log(error);
            });
            this.getData();
        },
        formCancel() {
            // this.form.classList.remove("was-validated");
            this.modalWindow.hide();
        },
        formShow() {
            this.modalWindow.show();
        },
        formSave() {
            this.form.classList.add("was-validated");
            if (this.form.checkValidity()) {
                // űrlap adatkezelés
                if (this.status == "insert") {
                    this.insertRow();
                } else if (this.status == "update") {
                    this.updateRow();
                }
                //Űrlap bezár
                this.modalWindow.hide();
            } 
            else
            {
                return;
            }
        },
    }
}
</script>

<style>

</style>