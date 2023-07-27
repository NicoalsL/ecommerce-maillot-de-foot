
<script>
//         const contenaireArticles = document.querySelector('.contenaire_articles')

// console.log(contenaireArticles)

//   fetch('../view/vue_maillot.php')
//     .then((response) => {
//       if (!response.ok) {
//         throw new Error('Erreur de requête : ' + response.status);
//       }
//       return response.json();
//     })
//     .then((maillots) => {
//       // Afficher les prix des maillots

//       affichage(maillots)

//       maillots.forEach((maillot) => {
//         const card = document.createElement('a')
//         console.log(card)



//         card.classList = "bouton-affichage"
//         card.innerHTML = `Vie : ${maillot.prix}`

//         console.log(maillot.prix);
//         console.log(maillot.Id_produits);
//         console.log(maillot.logo);
//       });
//     })
//     .catch((error) => {
//       console.log('Erreur lors de la récupération du contenu de la réponse : ' + error);
//     });
// function affichage(maillots){
//     console.log(maillots);

// }

</script>

<div id="app">
</div>





<script>
  const { createApp } = Vue;
  createApp({
    data() {
      return {
        maillots: [],              // Tableau pour stocker tous les produits
        filteredMaillots: [],      // Tableau pour stocker les produits filtrés
        selectedCategory: 'all',   // Catégorie sélectionnée dans le sélecteur
        categories: []             // Tableau pour stocker les catégories uniques
      };
    },
    mounted() {
      // Récupérer les données des produits depuis le serveur
      fetch('../view/vue_maillot.php')
        .then((response) => {
          if (!response.ok) {
            throw new Error('Erreur de requête : ' + response.status);
          }
          return response.json();
        })
        .then((maillots) => {
          this.maillots = maillots;             // Stocker tous les produits dans la variable maillots

          // Récupérer les catégories uniques
          this.categories = Array.from(new Set(maillots.map(maillot => maillot.categorie.toLowerCase())));
          
          this.filteredMaillots = maillots;     // Initialiser les produits filtrés avec tous les produits
        })
        .catch((error) => {
          console.log('Erreur lors de la récupération du contenu de la réponse : ' + error);
        });
    },
    methods: {
      ucfirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
      },
      filterMaillots() {
        if (this.selectedCategory === 'all') {
          this.filteredMaillots = this.maillots;   // Si la catégorie sélectionnée est "Toutes les catégories", afficher tous les produits
        } else {
          this.filteredMaillots = this.maillots.filter(maillot => maillot.categorie.toLowerCase() === this.selectedCategory);   // Filtrer les produits par catégorie sélectionnée
        }
      }
    },
    template: `
    <div>
    <div class="container text-center">

        <h1>Produits disponible({{ filteredMaillots.length}})</h1>
        <select class="form-select" v-model="selectedCategory" @change="filterMaillots()">
        <option value="all">Toutes les catégories</option>
        <option v-for="category in categories" :value="category" :key="category">{{ ucfirst(category) }}</option>
        </select>
        </div>
        <div class="contenaire_articles">
          <template v-for="maillot in filteredMaillots">
            <a class="bouton-affichage" :href="'?page=vue_page_article_indiv&id=' + maillot.Id_produits">
              <div class="card-maillot">
                <div class="card-image">
                  <img :src="'./assets/images/' + maillot.image">
                </div>
                <div class="card-content">
                  <h3 class="produit-name">{{ ucfirst(maillot.categorie) }} {{ maillot.club }}</h3>
                  <p class="produit-type">{{ maillot.type_maillot }}</p>
                  <p class="produit-prix">{{ maillot.prix / 100 }}€</p>
                </div>
              </div>
            </a>
          </template>
        </div>
        </div>
    `
  }).mount('#app');
</script>
