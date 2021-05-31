<template>
  <!-- Táblák -->
    <div class="container-fluid w3-theme-l1">
      <h1>{{Title}}</h1>
      <div>
          <!-- tábla -->
          <table class="table table-bordered">
              <tr>
                <th
                    v-for="(marka,index) in markakColumns" :key="index"
                >
                    {{marka}}
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
              <tr v-for="(marka,index) in markaRows" :key="index" :value="index">
                  <td>
                      {{marka.id}}
                  </td>
                  <td>
                      {{marka.marka}}
                  </td>
                  <td>
                      <button
                        type="button"
                        class="btn btn-outline-warning btn-md my-p-button"
                        @click="onClickedUpdate(marka)"
                        >
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                  </td>
                  <td>
                    <button
                        type="button"
                        class="btn btn-outline-danger btn-md my-p-button"
                        @click="onClickedDelete(marka)"
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
                                Márka
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="markaNev"
                                v-model="row.marka"
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


class Marka {
  constructor(id,marka) {
    this.id = id;
    this.marka = marka;
  }
}

export default {
    name:"markakSzerkesztes",
    data(){
        return {
            markakColumns: [],
            markaRows: [],
            row: new Marka(),
            Title: "Márkák",

            // modal
            modalTitle:null,
            modalWindow: null,
            status: null,
            form: null,

            // GET
            queryGetMarka: "markakTabla",
            // POST
            queryInsertMarka: "markaInsert",
            queryUpdateMarka: "markaUpdate",
            queryDeleteMarka: "markaDelete",
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
                  query: this.queryGetMarka
                }
            })
            .then((res) => {
                this.markakColumns = res.data.columns;
                this.markaRows = res.data.rows;
                // console.log(this.markaRows);
                // console.log(this.markaColumns);
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
            this.row = new Marka();
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
            let query = this.queryDeleteMarka;
            console.log(id);
            let params = {
                query: query,
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
                query: this.queryInsertMarka,
                marka: this.row.marka,
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
                query: this.queryUpdateMarka,
                marka: this.row.marka,
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