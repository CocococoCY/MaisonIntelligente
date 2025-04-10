# 🏡 MaisonConnectée – Projet Laravel

Ce projet est une application Laravel complète pour gérer une maison connectée : objets intelligents, gestion d’utilisateurs, optimisation énergétique, alertes, et plus encore.

## 🚀 Installation rapide

### 1. Cloner le projet ou télécharger en fichier ZIP

```bash
1-Clonage:
git clone https://github.com/CocococoCY/maisonconnectee.git
cd maisonconnectee
2-ZIP:
code->Download ZIP
```

### 2. Installer les dépendances

```bash
composer install
npm install && npm run dev
```

### 3. Configuration de l’environnement

Copier le fichier `.env` de configuration fourni :

```bash
copy .env.github .env
```

Puis générer la clé de l'application :

```bash
php artisan key:generate
```

### 4. Créer la base de données (SQLite)

```bash
type nul > database\database.sqlite

php artisan migrate

php artisan db:seed

```

Laravel utilisera automatiquement la base SQLite fournie.

### 5. Lancer le serveur

```bash
php artisan serve
```

Accéder à l’application ici : [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📬 Envoi d’e-mails

Le projet est configuré pour fonctionner avec un compte Gmail de test :

---

⚠️Quand on veut visualiser la partie Admin, il faut créer un compte avec l'adresse mail corent1.lebris@gmail.com qui est la seule accédant à ce module du projet.⚠️

---

## 📁 Arborescence principale

```
├── app/
├── config/
├── database/
│   └── database.sqlite
├── public/
├── resources/
├── routes/
├── .env.github ✅
├── README.md ✅

```

> ⚠️ Les fichiers sensibles comme `.env`, `vendor/`, `node_modules/` sont ignorés par Git.

---


## 👨‍💻 Contributeurs

- Étudiants CyTech – Projet encadré
- Framework utilisé : Laravel 10
- Frontend : Blade + Vite

---

🧠 **Tu peux maintenant cloner ce dépôt et tout fonctionne directement !**
