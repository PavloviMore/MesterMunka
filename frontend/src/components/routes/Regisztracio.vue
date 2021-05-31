<template>
    <div class="container-fluid">
        <div class="row my-div text-center">
            <h3>Regisztráció</h3>
            <input class="form-control form-control-lg m-1" type="text" placeholder="e-mail cím" aria-label=".form-control-lg example">
            <input class="form-control form-control-lg m-1" type="text" placeholder="Jelszó" aria-label=".form-control-lg example">
            <input class="form-control form-control-lg m-1" type="text" placeholder="Vezeteknév" aria-label=".form-control-lg example">
            <input class="form-control form-control-lg m-1" type="text" placeholder="Keresztnév" aria-label=".form-control-lg example">
            <input class="form-control form-control-lg m-1" type="text" placeholder="Telefonszám" aria-label=".form-control-lg example">
            <div class="form-check m-2">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Szeretnék hírlevelet kapni az akciókról, újdonságokról.
                </label>
            </div>
            <button class="btn">
                Regisztráció
            </button>
            <router-link to="/bejelentkezes/" class="m-1">Van már fiókod?</router-link>
        </div>
</div>
</template>

<script>
export default {

}
</script>

<style>
.my-div{
    width: 500px;
    margin: auto auto;
}

.btn{
    border: 2px solid gray;
    width: max-content;
    margin: auto auto;
}
</style>