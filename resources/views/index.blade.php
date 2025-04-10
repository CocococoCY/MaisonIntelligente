<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Boutique - Maison Connectée</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      margin: 0;
      padding: 0;
      color: #333;
    }
    header {
      background: #3a3a3a;
      color: #fff;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }
    .header-left {
      flex: 1;
    }
    .header-center {
      flex: 2;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin: 10px 0;
    }
    .header-right {
      flex: 1;
      display: flex;
      justify-content: flex-end;
      gap: 10px;
    }
    header h1 {
      margin: 0;
      font-size: 24px;
    }
    .button {
      background: #fff;
      color: #3a3a3a;
      text-decoration: none;
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      transition: background 0.3s;
    }
    .button:hover {
      background: #ccc;
    }
    .header-center input[type="text"],
    .header-center select {
      padding: 8px;
      font-size: 14px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    .header-center button {
      padding: 8px 12px;
      font-size: 14px;
      border: none;
      border-radius: 4px;
      background: #fff;
      color: #3a3a3a;
      cursor: pointer;
      transition: background 0.3s;
    }
    .header-center button:hover {
      background: #ccc;
    }
    .container {
      padding: 20px;
    }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      grid-gap: 20px;
    }
    .product {
      background: #fff;
      border: 1px solid #ddd;
      padding: 15px;
      text-align: center;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    .product img {
      max-width: 100%;
      height: auto;
    }
    .product h3 {
      margin: 10px 0;
    }
    .product p {
      font-size: 14px;
      color: #666;
    }
    .price {
      font-size: 18px;
      font-weight: bold;
      margin-top: 10px;
      color: #3a3a3a;
    }
  </style>
</head>
<body>
  <header>
    <div class="header-left">
      <h1>Boutique Maison Connectée</h1>
      <p>Découvrez nos objets connectés</p>
    </div>
    <div class="header-center">
      <input type="text" id="searchInput" placeholder="Rechercher un article">
      <select id="priceFilter">
        <option value="">Prix</option>
        <option value="0-50">0 - 50 €</option>
        <option value="50-100">50 - 100 €</option>
        <option value="100-200">100 - 200 €</option>
        <option value="200+">200 € et plus</option>
      </select>
      <select id="categoryFilter">
        <option value="">Catégorie</option>
        <option value="thermostat">Thermostat</option>
        <option value="camera">Caméra</option>
        <option value="eclairage">Éclairage</option>
        <option value="robot">Robot</option>
        <option value="securite">Sécurité</option>
        <option value="capteur">Capteur</option>
        <option value="interphone">Interphone</option>
      </select>
      <button onclick="applyFilters()">Rechercher</button>
      <button onclick="resetFilters()">Supprimer les filtres</button>
    </div>
    <div class="header-right">
      
      @if(isset($depuisMaison) && $depuisMaison && Auth::check())
        
        <a href="{{ route('objets.index') }}" class="button">🏠 Mes Objets Connectés</a>
         
      @else
        @guest
          <a href="{{ route('inscription') }}" class="button">S'inscrire</a>
          <a href="{{ route('connexion') }}" class="button">Se connecter</a>
        @endguest
      @endif

    </div>
  </header>
  
  <div class="container">
    <h2>Nos produits</h2>
    <div class="product-grid" id="productGrid">
      <!-- Article 1 -->
      <div class="product" data-price="199" data-category="thermostat">
        <img src="https://via.placeholder.com/200" alt="Thermostat intelligent">
        <h3>Thermostat Intelligent</h3>
        <p>Contrôle de température et économies d'énergie</p>
        <div class="price">€199</div>
      </div>
      <!-- Article 2 -->
      <div class="product" data-price="129" data-category="camera">
        <img src="https://via.placeholder.com/200" alt="Caméra de sécurité">
        <h3>Caméra de Sécurité</h3>
        <p>Surveillance en temps réel de votre domicile</p>
        <div class="price">€129</div>
      </div>
      <!-- Article 3 -->
      <div class="product" data-price="59" data-category="eclairage">
        <img src="https://via.placeholder.com/200" alt="Éclairages">
        <h3>Éclairages</h3>
        <p>Ambiance personnalisée pour chaque pièce</p>
        <div class="price">€59</div>
      </div>
      <!-- Article 4 -->
      <div class="product" data-price="299" data-category="robot">
        <img src="https://via.placeholder.com/200" alt="Aspirateur Robot">
        <h3>Aspirateur Robot</h3>
        <p>Nettoyage autonome pour un foyer impeccable</p>
        <div class="price">€299</div>
      </div>
      <!-- Article 5 -->
      <div class="product" data-price="149" data-category="securite">
        <img src="https://via.placeholder.com/200" alt="Serrure Connectée">
        <h3>Serrure Connectée</h3>
        <p>Sécurité renforcée pour votre domicile</p>
        <div class="price">€149</div>
      </div>
      <!-- Article 6 -->
      <div class="product" data-price="89" data-category="capteur">
        <img src="https://via.placeholder.com/200" alt="Capteur de Qualité de l'Air">
        <h3>Capteur de Qualité de l'Air</h3>
        <p>Surveillance de l'air intérieur et alertes en cas de pollution</p>
        <div class="price">€89</div>
      </div>
      <!-- Article 7 -->
      <div class="product" data-price="79" data-category="securite">
        <img src="https://via.placeholder.com/200" alt="Détecteur de Fumée Connecté">
        <h3>Détecteur de Fumée Connecté</h3>
        <p>Alerte instantanée en cas de fumée ou incendie</p>
        <div class="price">€79</div>
      </div>
      <!-- Article 8 -->
      <div class="product" data-price="99" data-category="interphone">
        <img src="https://via.placeholder.com/200" alt="Interphone Connecté">
        <h3>Interphone Connecté</h3>
        <p>Communication facile avec vos visiteurs via smartphone</p>
        <div class="price">€99</div>
      </div>
    </div>
  </div>
  

  <script>
    function applyFilters() {
      const searchValue = document.getElementById('searchInput').value.toLowerCase();
      const priceFilter = document.getElementById('priceFilter').value;
      const categoryFilter = document.getElementById('categoryFilter').value;
      const products = document.querySelectorAll('.product');
      
      products.forEach(product => {
        let productName = product.querySelector('h3').textContent.toLowerCase();
        let productPrice = parseFloat(product.getAttribute('data-price'));
        let productCategory = product.getAttribute('data-category');
        
        // Vérification de la recherche textuelle
        let matchesSearch = productName.includes(searchValue);
        
        // Vérification du filtre prix
        let matchesPrice = true;
        if(priceFilter) {
          if(priceFilter === "200+") {
            matchesPrice = productPrice >= 200;
          } else {
            let [min, max] = priceFilter.split("-").map(Number);
            matchesPrice = (productPrice >= min && productPrice <= max);
          }
        }
        
        // Vérification du filtre catégorie
        let matchesCategory = categoryFilter ? productCategory === categoryFilter : true;
        
        // Afficher ou masquer le produit en fonction des filtres
        if(matchesSearch && matchesPrice && matchesCategory) {
          product.style.display = "block";
        } else {
          product.style.display = "none";
        }
      });
    }
    
    function resetFilters() {
      // Réinitialiser les valeurs des champs
      document.getElementById('searchInput').value = "";
      document.getElementById('priceFilter').value = "";
      document.getElementById('categoryFilter').value = "";
      
      // Afficher tous les produits
      const products = document.querySelectorAll('.product');
      products.forEach(product => {
        product.style.display = "block";
      });
    }
  </script>
</body>
</html>
