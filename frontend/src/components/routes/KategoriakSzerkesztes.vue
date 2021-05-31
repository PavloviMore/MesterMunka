<template>
  <!-- Táblák -->
  <div class="container-fluid w3-theme-l1">
    <h1>{{ Title }}</h1>
    <div>
      <!-- Főkategoria  -->
      <h3>Fő kategoriák</h3>
      <table class="table table-bordered">
        <tr>
          <th v-for="(kategoria, index) in FokategoriaColumns" :key="index">
            {{ kategoria }}
          </th>
          <th>
            <button
              type="button"
              class="btn btn-md my-p-button"
              @click="FoonClickedRefresh()"
            >
              <i class="bi bi-arrow-counterclockwise"></i>
            </button>
          </th>
          <th>
            <button
              type="button"
              class="btn btn-outline-success btn-md my-p-button"
              @click="FoonClickedInsert()"
            >
              <i class="bi bi-plus"></i>
            </button>
          </th>
        </tr>
        <tr
          v-for="(Fokategoria, index) in FokategoriaRows"
          :key="index"
          :value="index"
        >
          <td>
            {{ Fokategoria.id }}
          </td>
          <td>
            {{ Fokategoria.foKategoriaNev }}
          </td>
          <td>
            <button
              type="button"
              class="btn btn-outline-warning btn-md my-p-button"
              @click="FoonClickedUpdate(Fokategoria)"
            >
              <i class="bi bi-pencil-fill"></i>
            </button>
          </td>
          <td>
            <button
              type="button"
              class="btn btn-outline-danger btn-md my-p-button"
              @click="FoonClickedDelete(Fokategoria)"
            >
              <i class="bi bi-x"></i>
            </button>
          </td>
        </tr>
      </table>

      <!-- Főkategoria -->
      <!-- MásodlagosKategoria-->
      <h3>Másodlagos Kategoriák</h3>
      <table class="table table-bordered">
        <tr>
          <th
            v-for="(Masodlagoskategoria, index) in MasodlagoskategoriaColumns"
            :key="index"
          >
            {{ Masodlagoskategoria }}
          </th>
          <th>
            <button
              type="button"
              class="btn btn-md my-p-button"
              @click="MasodikonClickedRefresh()"
            >
              <i class="bi bi-arrow-counterclockwise"></i>
            </button>
          </th>
          <th>
            <button
              type="button"
              class="btn btn-outline-success btn-md my-p-button"
              @click="MasodikonClickedInsert()"
            >
              <i class="bi bi-plus"></i>
            </button>
          </th>
        </tr>
        <tr
          v-for="(masodlagoskategoria, index) in MasodlagoskategoriaRows"
          :key="index"
          :value="index"
        >
          <td>
            {{ masodlagoskategoria.id }}
          </td>
          <td>
            {{
              FokategoriaRows.length != 0 ? FokategoriaRows.find(kategoria => kategoria.id == masodlagoskategoria.foKategoriaID).foKategoriaNev : "Nincs"
            }}
          </td>
          <td>
            {{ masodlagoskategoria.masodlagosKategoriaNev }}
          </td>
          <td>
            <button
              type="button"
              class="btn btn-outline-warning btn-md my-p-button"
              @click="MasodikonClickedUpdate(masodlagoskategoria)"
            >
              <i class="bi bi-pencil-fill"></i>
            </button>
          </td>
          <td>
            <button
              type="button"
              class="btn btn-outline-danger btn-md my-p-button"
              @click="MasodikonClickedDelete(masodlagoskategoria)"
            >
              <i class="bi bi-x"></i>
            </button>
          </td>
        </tr>
      </table>

      <!-- Másodlagostábla -->
      <!-- Harmadlagostábla-->
      <h3>Harmadlagos Kategoriák</h3>
      <table class="table table-bordered">
        <tr>
          <th
            v-for="(kategoria, index) in HarmadlagoskategoriaColumns"
            :key="index"
            class="text-truncate"
          >
            {{ kategoria }}
          </th>
          <th>
            <button
              type="button"
              class="btn btn-md my-p-button"
              @click="HarmadikonClickedRefresh()"
            >
              <i class="bi bi-arrow-counterclockwise"></i>
            </button>
          </th>
          <th>
            <button
              type="button"
              class="btn btn-outline-success btn-md my-p-button"
              @click="HarmadikonClickedInsert()"
            >
              <i class="bi bi-plus"></i>
            </button>
          </th>
        </tr>
        <tr
          v-for="(Harmadlagoskategoria, index) in HarmadlagoskategoriaRows"
          :key="index"
          :value="index"
        >
          <td>
            {{ Harmadlagoskategoria.id }}
          </td>
          <td>
            
            {{MasodlagoskategoriaRows.length != 0 ? MasodlagoskategoriaRows.find(kategoria => kategoria.id == Harmadlagoskategoria.masodlagoskategoriaID).masodlagosKategoriaNev : "Nincs"}}
          </td>
          <td>
            {{ Harmadlagoskategoria.harmadlagosKategoriaNev }}
          </td>
          <td>
            <button
              type="button"
              class="btn btn-outline-warning btn-md my-p-button"
              @click="HarmadikonClickedUpdate(Harmadlagoskategoria)"
            >
              <i class="bi bi-pencil-fill"></i>
            </button>
          </td>
          <td>
            <button
              type="button"
              class="btn btn-outline-danger btn-md my-p-button"
              @click="HarmadikonClickedDelete(Harmadlagoskategoria)"
            >
              <i class="bi bi-x"></i>
            </button>
          </td>
        </tr>
      </table>

      <!-- Harmadlagostábla -->

      <!-- FoModal -->
      <div
        class="modal fade"
        id="ModalFo"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ modalTitle }}</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation-fo row">
                <div class="col-md-8">
                  <label for="nev" class="form-label">
                    Főkategoria
                  </label>

                  <input
                    type="text"
                    class="form-control"
                    id="fokategoriaNev"
                    v-model="FokategoriaRow.foKategoriaNev"
                    required
                  />

                  <div class="invalid-feedback">
                    Kötelező!
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                @click="FoformCancel()"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-primary"
                @click="FoformSave()"
              >
                Hozzáfűzés
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- modal -->
      <!-- MsodlagosModal -->
      <div
        class="modal fade"
        id="ModalMasodlagos"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ modalTitle }}</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation-masodlagos row">
                <div class="col-md-6">
                  <label for="nev" class="form-label">
                    foKategoria
                  </label>

                  <select
                    class="form-select"
                    size="6"
                    id="marka"
                    v-model="MasodlagoskategoriaRow.foKategoriaID"
                  >
                    <option
                      v-for="(kategoria, index) in FokategoriaRows"
                      :key="index"
                      :value="kategoria.id"
                      :selected="kategoria.id == MasodlagoskategoriaRow.foKategoriaID ? 'selected' : ''"
                      required
                    >
                      {{ kategoria.foKategoriaNev }}
                    </option>
                  </select>

                  <div class="invalid-feedback">
                    Kötelező!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="nev" class="form-label">
                    masodlagosKategoriaNev
                  </label>

                  <input
                    type="text"
                    class="form-control"
                    id="fokategoriaNev"
                    v-model="MasodlagoskategoriaRow.masodlagosKategoriaNev"
                    required
                  />

                  <div class="invalid-feedback">
                    Kötelező!
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                @click="MasodikformCancel()"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-primary"
                @click="MasodikformSave()"
              >
                Hozzáfűzés
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /Masodlagos -->
      <!-- HarmadlagosModal -->
      <div
        class="modal fade"
        id="ModalHarmadlagos"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ modalTitle }}</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form class="needs-validation-harmadlagos row">
                <div class="col-md-6">
                  <label for="nev" class="form-label">
                    Masodlagos Kategoria
                  </label>

                  <select
                    class="form-select"
                    size="6"
                    id="harmadlagosKategoriaKeyID"
                    v-model="HarmadlagosKategoriaRow.masodlagoskategoriaID"
                  >
                    <option
                      v-for="(kategoria, index) in MasodlagoskategoriaRows"
                      :key="index"
                      :value="kategoria.id"
                      :selected="kategoria.id == HarmadlagosKategoriaRow.masodlagoskategoriaID ? 'selected' : ''"
                      required
                    >
                      {{ kategoria.masodlagosKategoriaNev }}
                    </option>
                  </select>

                  <div class="invalid-feedback">
                    Kötelező!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="nev" class="form-label">
                    Harmadlagos Kategoria Neve
                  </label>

                  <input
                    type="text"
                    class="form-control"
                    id="fokategoriaNev"
                    v-model="HarmadlagosKategoriaRow.harmadlagosKategoriaNev"
                    required
                  />

                  <div class="invalid-feedback">
                    Kötelező!
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                @click="HarmadikformCancel()"
              >
                Cancel
              </button>
              <button
                type="button"
                class="btn btn-primary"
                @click="HarmadikformSave()"
              >
                Hozzáfűzés
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /HarmadlagosModal -->
    </div>
  </div>
</template>
<script>
const axios = require("axios").default;
const bootstrap = require("bootstrap");

class Fokategoria {
  constructor(id, foKategoriaNev) {
    this.id = id;
    this.foKategoriaNev = foKategoriaNev;
  }
}
class Masodlagoskategoria {
  constructor(id, foKategoriaID, masodlagosKategoriaNev) {
    this.id = id;
    this.foKategoriaID = foKategoriaID;
    this.masodlagosKategoriaNev = masodlagosKategoriaNev;
  }
}
class Harmadlagoskategoria {
  constructor(id, masodlagoskategoriaID, harmadlagosKategoriaNev) {
    this.id = id;
    this.masodlagoskategoriaID = masodlagoskategoriaID;
    this.harmadlagosKategoriaNev = harmadlagosKategoriaNev;
  }
}

export default {
  name: "kategoriakSzerkesztes",
  data() {
    return {
      FokategoriaColumns: [],
      FokategoriaRows: [],
      MasodlagoskategoriaColumns: [],
      MasodlagoskategoriaRows: [],
      HarmadlagoskategoriaColumns: [],
      HarmadlagoskategoriaRows: [],
      FokategoriaRow: new Fokategoria(),
      MasodlagoskategoriaRow: new Masodlagoskategoria(),
      HarmadlagosKategoriaRow: new Harmadlagoskategoria(),
      Title: "Kategoriák",

      // modal
      modalTitle: null,
      modalWindow: null,
      status: null,
      Foform: null,
      Masodikform: null,
      Harmadikform: null,

      // GET
      queryGetFokategoria: "foKategoriaTabla",
      queryGetMasodlagoskategoria: "masodlagosKategoriaTabla",
      queryGetHarmadlagoskategoria: "harmadlagosKategoriaTabla",
      // POST
      // Fő
      queryInsertFokategoria: "foKategoriaInsert",
      queryUpdateFokategoria: "fokategoriaUpdate",
      queryDeleteFokategoria: "foKategoriaDelete",
      // Másodlagos
      queryInsertMasodlagoskategoria: "masodlagosKategoriaInsert",
      queryUpdateMasodlagoskategoria: "masodlagoskategoriaUpdate",
      queryDeleteMasodlagoskategoria: "masodlagosKategoriaDelete",
      // Harmadlagos
      queryInsertHarmadlagoskategoria: "harmadlagosKategoriaInsert",
      queryUpdateHarmadlagoskategoria: "harmadlagoskategoriaUpdate",
      queryDeleteHarmadlagoskategoria: "harmadlagosKategoriaDelete",
    };
  },
  created() {
    this.getFoKategoria();
    this.getMasodlagosKategoria();
    this.getHarmadlagosKategoria();
  },
  mounted() {
    this.modalWindowFo = new bootstrap.Modal(
      document.getElementById("ModalFo")
    );
    this.modalWindowMasodlagos = new bootstrap.Modal(
      document.getElementById("ModalMasodlagos")
    );
    this.modalWindowHarmadlagos = new bootstrap.Modal(
      document.getElementById("ModalHarmadlagos")
    );
    this.Foform = document.querySelector(".needs-validation-fo");
    this.Masodikform = document.querySelector(".needs-validation-masodlagos");
    this.Harmadikform = document.querySelector(".needs-validation-harmadlagos");
  },
  methods: {
    // Data
    getFoKategoria() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetFokategoria,
          },
        })
        .then((res) => {
          this.FokategoriaColumns = res.data.columns;
          this.FokategoriaRows = res.data.rows;
          // console.log(this.FokategoriaColumns);
          // console.log(this.FokategoriaRows);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMasodlagosKategoria() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetMasodlagoskategoria,
          },
        })
        .then((res) => {
          this.MasodlagoskategoriaColumns = res.data.columns;
          this.MasodlagoskategoriaRows = res.data.rows;
          //   console.log(this.MasodlagoskategoriaColumns);
          //   console.log(this.MasodlagoskategoriaRows);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getHarmadlagosKategoria() {
      axios
        .get(this.url, {
          params: {
            query: this.queryGetHarmadlagoskategoria,
          },
        })
        .then((res) => {
          this.HarmadlagoskategoriaColumns = res.data.columns;
          this.HarmadlagoskategoriaRows = res.data.rows;
          console.log(this.HarmadlagoskategoriaColumns);
          console.log(this.HarmadlagoskategoriaRows);
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // FoOnclickFunctions
    FoonClickedDelete(kategoria) {
      let id = kategoria.id;
      if (confirm("Töröljem?")) {
        this.FodeleteRow(id);
      }
    },
    FoonClickedUpdate(row) {
      this.modalTitle = "Adat módosítás";
      this.status = "update";
      this.FokategoriaRow = { ...row };
      console.log(this.status);

      //űrlap indít
      this.FoformShow();
    },
    FoonClickedInsert() {
      this.modalTitle = "Új Kategoria bevitele";
      this.status = "insert";
      this.FokategoriaRow = new Fokategoria();
      console.log(this.status);
      console.log(this.FokategoriaRow);
      //űrlap indít
      this.FoformShow();
    },
    FoonClickedRefresh() {
      this.status = "refresh";
      this.getFoKategoria();
    },

    // Amik lefutnak az onlicknél
    FodeleteRow(id) {
      console.log(id);
      let params = {
        query: this.queryDeleteFokategoria,
        id: id,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res.data);
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    FoinsertRow() {
      //post
      let params = {
        query: this.queryInsertFokategoria,
        foKategoriaNev: this.FokategoriaRow.foKategoriaNev,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res);
        })
        .catch((error) => {
          console.log(error);
        });
      console.log(this.FokategoriaRow);
      this.FoonClickedRefresh();
    },
    FoupdateRow() {
      //post
      let params = {
        query: this.queryUpdateFokategoria,
        foKategoriaNev: this.FokategoriaRow.foKategoriaNev,
        id: this.FokategoriaRow.id,
      };
      axios
        .post(this.url, params)
        .then(() => {
          this.getFoKategoria();
        })
        .catch((error) => {
          console.log(error);
        });
    },

    // Masodik---------------------------------------------------
    MasodikonClickedDelete(kategoria) {
      let id = kategoria.id;
      if (confirm("Töröljem?")) {
        this.MasodikdeleteRow(id);
      }
    },
    MasodikonClickedUpdate(row) {
      this.modalTitle = "Adat módosítás";
      this.status = "update";
      this.MasodlagoskategoriaRow = { ...row };
      console.log(this.MasodlagoskategoriaRow);

      //űrlap indít
      this.MasodikformShow();
    },
    MasodikonClickedInsert() {
      this.modalTitle = "Új Kategoria bevitele";
      this.status = "insert";
      this.MasodlagoskategoriaRow = new Masodlagoskategoria();
      console.log(this.status);
      console.log(this.MasodlagoskategoriaRow);
      //űrlap indít
      this.MasodikformShow();
    },
    MasodikonClickedRefresh() {
      this.status = "refresh";
      this.getMasodlagosKategoria();
    },

    // Amik lefutnak az onlicknél
    MasodikdeleteRow(id) {
      console.log(id);
      let params = {
        query: this.queryDeleteMasodlagoskategoria,
        id: id,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res.data);
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    MasodikinsertRow() {
      //post
      let params = {
        query: this.queryInsertMasodlagoskategoria,
        foKategoriaID: this.MasodlagoskategoriaRow.foKategoriaID,
        masodlagosKategoriaNev: this.MasodlagoskategoriaRow
          .masodlagosKategoriaNev,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res);
        })
        .catch((error) => {
          console.log(error);
        });
      // console.log(this.MasodlagoskategoriaRow);
    },
    MasodikupdateRow() {
      //post
      let params = {
        query: this.queryUpdateMasodlagoskategoria,
        foKategoriaID: this.MasodlagoskategoriaRow.foKategoriaID,
        masodlagosKategoriaNev: this.MasodlagoskategoriaRow
          .masodlagosKategoriaNev,
        id: this.MasodlagoskategoriaRow.id,
      };
      axios
        .post(this.url, params)
        .then(() => {
          this.getMasodlagosKategoria();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // Harmadik-------------------------------------------------------------
    HarmadikonClickedDelete(kategoria) {
      let id = kategoria.id;
      if (confirm("Töröljem?")) {
        this.HarmadikdeleteRow(id);
      }
    },
    HarmadikonClickedUpdate(row) {
      this.modalTitle = "Adat módosítás";
      this.status = "update";
      this.HarmadlagosKategoriaRow = { ...row };
      console.log(this.HarmadlagoskategoriaRow);

      //űrlap indít
      this.HarmadikformShow();
    },
    HarmadikonClickedInsert() {
      this.modalTitle = "Új Harmadlagos Kategoria bevitele";
      this.status = "insert";
      this.HarmadlagosKategoriaRow = new Harmadlagoskategoria();
      console.log(this.status);
      console.log(this.HarmadlagoskategoriaRow);
      //űrlap indít
      this.HarmadikformShow();
    },
    HarmadikonClickedRefresh() {
      this.status = "refresh";
      this.getHarmadlagosKategoria();
    },

    // Amik lefutnak az onlicknél
    HarmadikdeleteRow(id) {
      console.log(id);
      let params = {
        query: this.queryDeleteHarmadlagoskategoria,
        id: id,
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res.data);
        })
        .catch(function(error) {
          // handle error
          console.log(error);
        });
    },
    HarmadikinsertRow() {
      //post
      let params = {
        query: this.queryInsertHarmadlagoskategoria,
        masodlagoskategoriaID: this.HarmadlagosKategoriaRow.masodlagoskategoriaID,
        harmadlagosKategoriaNev: this.HarmadlagosKategoriaRow.harmadlagosKategoriaNev
      };
      axios
        .post(this.url, params)
        .then((res) => {
          console.log(res);
        })
        .catch((error) => {
          console.log(error);
        });
      // console.log(this.MasodlagoskategoriaRow);
    },
    HarmadikupdateRow() {
      //post
      let params = {
        query: this.queryUpdateHarmadlagoskategoria,
        masodlagoskategoriaID: this.HarmadlagosKategoriaRow.masodlagoskategoriaID,
        harmadlagosKategoriaNev: this.HarmadlagosKategoriaRow.harmadlagosKategoriaNev,
        id: this.HarmadlagosKategoriaRow.id,
      };
      axios
        .post(this.url, params)
        .then(() => {
          this.getMasodlagosKategoria();
        })
        .catch((error) => {
          console.log(error);
        });
    },
    // Fo-------------------------------------------------------------------
    FoformCancel() {
      // this.form.classList.remove("was-validated");
      this.modalWindowFo.hide();
    },
    FoformShow() {
      this.modalWindowFo.show();
    },

    FoformSave() {
      this.Foform.classList.add("was-validated");
      if (this.Foform.checkValidity()) {
        // űrlap adatkezelés
        if (this.status == "insert") {
          this.FoinsertRow();
        } else if (this.status == "update") {
          this.FoupdateRow();
        }
        //Űrlap bezár
        this.modalWindowFo.hide();
      } else {
        return;
      }
    },
    // Masodlagos
    MasodikformCancel() {
      // this.form.classList.remove("was-validated");
      this.modalWindowMasodlagos.hide();
    },
    MasodikformShow() {
      this.modalWindowMasodlagos.show();
    },

    MasodikformSave() {
      this.Masodikform.classList.add("was-validated");
      if (this.Masodikform.checkValidity()) {
        // űrlap adatkezelés
        if (this.status == "insert") {
          this.MasodikinsertRow();
        } else if (this.status == "update") {
          this.MasodikupdateRow();
        }
        //Űrlap bezár
        this.modalWindowMasodlagos.hide();
      } else {
        return;
      }
    },
    // harmadlagos-
    HarmadikformCancel() {
      // this.form.classList.remove("was-validated");
      this.modalWindowHarmadlagos.hide();
    },
    HarmadikformShow() {
      this.modalWindowHarmadlagos.show();
    },

    HarmadikformSave() {
      this.Harmadikform.classList.add("was-validated");
      if (this.Harmadikform.checkValidity()) {
        // űrlap adatkezelés
        if (this.status == "insert") {
          this.HarmadikinsertRow();
        } else if (this.status == "update") {
          this.HarmadikupdateRow();
        }
        //Űrlap bezár
        this.modalWindowHarmadlagos.hide();
      } else {
        return;
      }
    },
  },
};
</script>

<style></style>
