// 1. a routes komponensek
import TermekekSzures from "../components/routes/TermekekSzures.vue";
import Regisztracio from "../components/routes/Regisztracio.vue";
import Belepes from "../components/routes/Belepes.vue";
import Kosar from "../components/routes/Kosar.vue";
import Rolunk from "../components/routes/Rolunk.vue";
import TermekekSzerkesztes from "../components/routes/TermekekSzerkesztes.vue";
import MarkaSzerkesztes from "../components/routes/MarkakSzerkesztes.vue";
import MertekegysegSzerkesztes from "../components/routes/MertekegysegSzerkesztes.vue";
import KategoriakSzerkesztes from "../components/routes/KategoriakSzerkesztes.vue";
import TermekOldal from "../components/routes/TermekOldal.vue";
// import error from "../components/routes/termekOldal.vue";



// 2. route - komponenes hozzárendelés Feltotltesek
const routes = [
    {
        name: "termekekSzures",
        path: "/",
        component: TermekekSzures,
        meta: {requiresAuth: false}
    },
    {
        name: "regisztracio",
        path: "/regisztracio/",
        component: Regisztracio,
        meta: {requiresAuth: false}

    },
    {
        name: "belepes",
        path: "/bejelentkezes/",
        component: Belepes,
        meta: {requiresAuth: false}
    },
    {
        name: "kosar",
        path: "/kosar/",
        component: Kosar,
        meta: {requiresAuth: false}
    },
    {
        name: "rolunk",
        path: "/rolunk/",
        component: Rolunk,
        meta: {requiresAuth: false}
    },
    {
        name: "termekekSzerkesztes",
        path: "/feltoltes/termekek",
        component: TermekekSzerkesztes,
        meta: {requiresAuth: true}
    },
    {
        name: "markakSzerkesztes",
        path: "/feltoltes/markak",
        component: MarkaSzerkesztes,
        meta: {requiresAuth: true}
    },
    {
        name: "mertekegysegSzerkesztes",
        path: "/feltoltes/mertekegyseg",
        component: MertekegysegSzerkesztes,
        meta: {requiresAuth: true}
    },
    {
        name: "kategoriakSzerkesztes",
        path: "/feltoltes/kategoria",
        component: KategoriakSzerkesztes,
        meta: {requiresAuth: true}
    },
    {
        name: "termekOldal",
        path: "/termekOldal/:id",
        component: TermekOldal,
        meta: {requiresAuth: false}
    },
];

// 3. Export, hogy kívülről elérhető legyen
export default routes;