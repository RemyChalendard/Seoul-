<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description"
    content="Découvrez les meilleures activités à Séoul : visites culturelles, balades, marchés, spectacles et expériences uniques pour profiter pleinement de la capitale coréenne.">

  <title>Travel In Seoul</title>


  <link rel="preload" as="style" href="/styles/styles.css">
  <link rel="stylesheet" href="/styles/styles.css">

  <link rel="preconnect" href="https://api.open-meteo.com">
  <link rel="dns-prefetch" href="https://api.open-meteo.com">

  <style>
    #seoul-info {
      background: linear-gradient(135deg, #2A6EBB 0%, #1a416e 100%);
      color: white;
      padding: 15px 20px;
      border-radius: 5px;
      text-align: center;
      font-weight: 500;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      font-size: 16px;
      margin-top: 15px;
    }

    #time {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }
  </style>
</head>

<body>

<header>
  <img src="/images/logoseoul.png" alt="Logo Seoul" width="280" height="180">

  <h1>TRAVEL IN SEOUL</h1>

  <div id="seoul-info">
    <div id="time"></div>
    <div id="weather">Chargement...</div>
  </div>

  <nav class="navbar">
    <div class="nav-container">

      <button class="burger-menu" id="burgerMenu" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>

      <div class="nav-links" id="navLinks">
        <a href="/index.php">HOME</a>
        <a href="/php/news.php">NEWS</a>
        <a href="/php/restaurant.php">FOODS</a>
        <a href="/php/activites.php">ACTIVITIES</a>
        <a href="/php/Quartiers.php">DISTRICTS</a>
        <a href="/php/language.php">HANGEUL</a>
        <a href="/php/bus.php">BUS</a>
        <a href="/php/metro.php">METRO</a>
        <a href="/php/contact.php">CONTACT</a>
      </div>

    </div>
  </nav>
</header>

<main>

<script defer>

/* MENU */
const burgerMenu = document.getElementById('burgerMenu');
const navLinks = document.getElementById('navLinks');

burgerMenu?.addEventListener('click', () => {
  burgerMenu.classList.toggle('active');
  navLinks.classList.toggle('active');
});

/* HEURE */
function updateTime() {
  const seoulTime = new Date().toLocaleString('fr-FR', {
    timeZone: 'Asia/Seoul',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit'
  });

  const timeEl = document.getElementById('time');
  if (timeEl) {
    timeEl.textContent = "Séoul: " + seoulTime;
  }
}

updateTime();
setInterval(updateTime, 1000);

/* METEO */
window.addEventListener("load", () => {
  setTimeout(loadWeather, 2500);
});

function loadWeather() {
  fetch("https://api.open-meteo.com/v1/forecast?latitude=37.5665&longitude=126.9780&current=temperature_2m")
    .then(res => res.json())
    .then(data => {
      const weatherEl = document.getElementById("weather");
      if (weatherEl) {
        weatherEl.textContent = "Météo: " + data.current.temperature_2m + "°C";
      }
    })
    .catch(() => {
      const weatherEl = document.getElementById("weather");
      if (weatherEl) {
        weatherEl.textContent = "Météo indisponible";
      }
    });
}
</script>

</main>

</body>
</html>