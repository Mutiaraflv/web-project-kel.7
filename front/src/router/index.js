import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import ResepList from '../views/ResepList.vue'
import ResepDetail from '../views/ResepDetail.vue'
import ResepTambah from '../views/ResepTambah.vue'
import ResepEdit from '../views/ResepEdit.vue'
import KulinerList from '../views/KulinerList.vue'
import KulinerDetail from '../views/KulinerDetail.vue'
import KulinerTambah from '../views/KulinerTambah.vue'
import KulinerEdit from '../views/KulinerEdit.vue'
import ArtikelList from '../views/ArtikelList.vue'
import ArtikelDetail from '../views/ArtikelDetail.vue'
import ArtikelTambah from '../views/ArtikelTambah.vue'
import ArtikelEdit from '../views/ArtikelEdit.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home
  },
  {
    path: '/resep',
    name: 'ResepList',
    component: ResepList
  },
  {
    path: '/resep/:id_resep',
    name: 'ResepDetail',
    component: ResepDetail
  },
  {
    path: '/resep/tambah',
    name: 'ResepTambah',
    component: ResepTambah
  },
  {
    path: '/resep/:id_resep/edit',
    name: 'ResepEdit',
    component: ResepEdit
  },
  {
    path: '/kuliner',
    name: 'KulinerList',
    component: KulinerList
  },
  {
    path: '/kuliner/:id_kuliner',
    name: 'KulinerDetail',
    component: KulinerDetail
  },
  {
    path: '/kuliner/tambah',
    name: 'KulinerTambah',
    component: KulinerTambah
  },
  {
    path: '/kuliner/:id_kuliner/edit',
    name: 'KulinerEdit',
    component: KulinerEdit
  },
  {
    path: '/artikel',
    name: 'ArtikelList',
    component: ArtikelList
  },
  {
    path: '/artikel/:id_artikel',
    name: 'ArtikelDetail',
    component: ArtikelDetail
  },
  {
    path: '/artikel/tambah',
    name: 'ArtikelTambah',
    component: ArtikelTambah
  },
  {
    path: '/artikel/:id_artikel/edit',
    name: 'ArtikelEdit',
    component: ArtikelEdit
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
