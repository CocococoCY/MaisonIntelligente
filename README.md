# 🏡 MaisonConnectée – Projet Laravel

Ce projet est une application Laravel complète pour gérer une maison connectée : objets intelligents, gestion d’utilisateurs, optimisation énergétique, alertes, et plus encore.

## 🚀 Installation rapide

### 1. Cloner le projet

```bash
git clone https://github.com/CocococoCY/maisonconnectee.git
cd maisonconnectee
```

### 2. Installer les dépendances

```bash
composer install
npm install && npm run dev
```

### 3. Configuration de l’environnement

Copier le fichier `.env` de configuration fourni :

```bash
cp .env.github .env
```

Puis générer la clé de l'application :

```bash
php artisan key:generate
```

### 4. Créer la base de données (SQLite)

Assure-toi que le fichier suivant existe :

```bash
touch database/database.sqlite
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

- Vérifie le fichier `.env.github` pour les identifiants.
- Tu peux générer un mot de passe d’application ici : [https://myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords)

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
