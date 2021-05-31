<template>
  <!-- Táblák -->
    <div class="container-fluid w3-theme-l1">
      <h1>{{Title}}</h1>
      <div>
          <!-- tábla -->
          <table class="table table-bordered">
              <tr>
                <th
                    v-for="(mertekegyseg,index) in mertekegysegColumns" :key="index"
                >
                    {{mertekegyseg}}
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
              <tr v-for="(mertekegyseg,index) in mertekegysegRows" :key="index" :value="index">
                  <td>
                      {{mertekegyseg.id}}
                  </td>
                  <td>
                      {{mertekegyseg.egyseg}}
                  </td>
                  <td>
                      <button
                        type="button"
                        class="btn btn-outline-warning btn-md my-p-button"
                        @click="onClickedUpdate(mertekegyseg)"
                        >
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                  </td>
                  <td>
                    <button
                        type="button"
                        class="btn btn-outline-danger btn-md my-p-button"
                        @click="onClickedDelete(mertekegyseg)"
                        >
                        <i class="bi bi-x"></i>
                    </button>
                  </td>
              </tr>
          </table>
        <!-- tábla -->
        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{modalTitle}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation row">
                        <!-- név -->
                        <div class="col-md-8">
                            <label
                                for="nev"
                                class="form-label"
                            >
                                Mértékegység
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="markaNev"
                                v-model="row.egyseg"
                                required
                            >

                            <div class="invalid-feedback">
                                Kötelező!
                            </div>
                        </div>
                        <!-- /név -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="formCancel()">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="formSave()">Hozzáfűzés</button>
                </div>
            </div>
        </div>
        </div>
        <!-- modal -->
      </div>
  </div>
</template>
<script>
const axios = require("axios").default;
const bootstrap = require("bootstrap");


class Mertekegyseg {
  constructor(id,egyseg) {
    this.id = id;
    this.egyseg = egyseg;
  }
}

export default {
    name:"mertekegysegSzerkesztes",
    data(){
        return {
            mertekegysegColumns: [],
            mertekegysegRows: [],
            row: new Mertekegyseg(),
            Title: "Mértékegység",

            // modal
            modalTitle:null,
            modalWindow: null,
            status: null,
            form: null,

            // GET
            queryGetMertekegyseg: "mertekegysegTabla",
            // POST
            queryInsertMertekegyseg: "mertekegysegInsert",
            queryUpdateMertekegyseg: "mertekegysegUpdate",
            queryDeleteMertekegyseg: "mertekegysegDelete",
        };
    },
    created(){
        this.getData();
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
                  query: this.queryGetMertekegyseg
                }
            })
            .then((res) => {
                this.mertekegysegColumns = res.data.columns;
                this.mertekegysegRows = res.data.rows;
                // console.log(this.markaRows);
                // console.log(this.markaColumns);
            }).catch((error) => {
                console.log(error);
            })
        },
        // OnclickFunctions
        onClickedDelete(rows) {
            let id = rows.id;
            console.log(id);
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
            this.modalTitle = "Új Mértékegység";
            this.status = "insert";
            this.row = new Mertekegyseg();
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
            console.log(id);
            let params = {
                query: this.queryDeleteMertekegyseg,
                id: id,
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
                query: this.queryInsertMertekegyseg,
                egyseg: this.row.egyseg,
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
                query: this.queryUpdateMertekegyseg,
                egyseg: this.row.egyseg,
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