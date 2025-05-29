<?php
session_start();

// Verificăm dacă utilizatorul este autentificat
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Despre Programare</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
   
nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 32px;
    border: 1px solid #e8e8e8;
    position: fixed;  
    top: 0;  
    left: 50%;
    transform: translateX(-50%);
    border-radius: 16px;
    padding: 12px;
    background: white;
    z-index: 1000;
    width: 100%; 
}


body {
    padding-top: 80px;
}

  </style>
</head>
<body>

  <nav>
    <div class="logo">
      <img src="images/logo.webp" alt="SkillForge logo" />
      <a href="acasa.php">SkillForge</a>
    </div>
    <div class="nav-links">
      <a href="acasa.php">Acasă</a>
      <a href="tutorials.php">Lecții de început</a>
      <div class="dropdown">
        <button class="dropbtn" id="dropdownBtn">
          Compilere <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" id="dropdownContent">
          <a href="compiler.html">Compiler HTML & CSS & JS</a>
          <a href="compiler.php">Compiler C++ & Python</a>
        </div>
      </div>
    </div>
    <a href="includes/logout.php"><button id="navLogoutBtn">Deconectare</button></a>
  </nav>

  <div id="tutorials-container" class="tutorials">
   
    <section id="python" class="tutorial">
      <h2>Python</h2>
      <div class="tutorial">
        <h3>Introducere în Python</h3>
        <p>Python este un limbaj de programare de nivel înalt, interpretat, ușor de învățat și folosit. 
          A fost creat la începutul anilor 1990 de Guido van Rossum și a devenit rapid unul dintre cele mai populare limbaje datorită 
          sintaxei sale simple și a comunității mari de utilizatori. 
          Python este folosit în diverse domenii, de la dezvoltarea web și analiza datelor, până la inteligența artificială 
          și automatizarea proceselor. În aceste tutoriale, vei învăța 
          cum să creezi primul tău program și să înțelegi structurile de bază ale limbajului. 
          După ce parcurgi acest tutorial, vei avea o înțelegere generală a Python și a modului în care poți începe 
          să dezvolți aplicații simple.</p>
      </div>
      <div class="tutorial">
        <h3>Structuri de control în Python</h3>
        <p>În Python, controlul fluxului este esențial pentru dezvoltarea aplicațiilor.
           Vei învăța cum să utilizezi instrucțiunile de control precum 
           if, else, și elif pentru a lua decizii în cadrul unui program. 
           De asemenea, vei descoperi cum să folosești buclele for și while pentru a itera prin colecții de date, cum ar fi listele și dicționarele. 
           Vom explora și cum să utilizăm instrucțiuni de întrerupere precum break și 
           continue pentru a controla execuția programului într-un mod mai detaliat.</p>
      </div>
    </section>

    
    <section id="html_css_js" class="tutorial">
      <h2>HTML, CSS & JS</h2>
      <div class="tutorial">
        <h3>Introducere în HTML</h3>
        <p>HTML (HyperText Markup Language) este limbajul standard folosit pentru a crea pagini web. 
          Acesta structurează conținutul paginii și definește elementele esențiale cum ar fi titluri, paragrafe, imagini, linkuri și multe altele. 
          În aceste tutoriale, vei învăța cum să creezi o pagină web de bază folosind HTML, cum să folosești etichetele 
          principale și cum să creezi o structură logică pentru paginile tale. 
          Vom discuta despre cum să incluzi imagini, linkuri și liste, și cum să formatezi conținutul pentru a fi ușor de citit.</p>
      </div>
      <div class="tutorial">
        <h3>Stilizarea cu CSS</h3>
        <p>CSS (Cascading Style Sheets) este folosit pentru a adăuga stil și formatare paginilor HTML. 
          Acesta îți permite să controlezi culorile, fonturile, marginile, spațierea și multe altele. 
          Vei învăța cum să folosești CSS pentru a stiliza textul, imaginile și elementele din paginile tale. 
          Vom explora diferite tipuri de selecționatori CSS, cum ar fi selecționarea elementelor prin taguri, 
          clase sau id-uri, și vom discuta despre cum să îți organizezi fișierele CSS pentru o structură mai curată și mai eficientă.</p>
      </div>
      <div class="tutorial">
        <h3>JavaScript pentru interactivitate</h3>
        <p>JavaScript este un limbaj de programare folosit pentru a adăuga interactivitate pe paginile web. 
          Spre deosebire de HTML și CSS, care sunt limbaje declarative, JavaScript permite programarea comportamentului dinamic al unei pagini web. 
          Vei învăța cum să scrii scripturi JavaScript pentru a modifica conținutul unei pagini în timp real, 
          pentru a adăuga efecte vizuale și pentru a răspunde la evenimentele utilizatorului, 
          cum ar fi clicurile sau introducerea datelor într-un formular. 
          Vom discuta despre variabile, funcții, evenimente și manipularea DOM (Document Object Model).</p>
      </div>
    </section>

    
    <section id="cpp" class="tutorial">
      <h2>C++</h2>
      <div class="tutorial">
        <h3>Introducere în C++</h3>
        <p>C++ este un limbaj de programare dezvoltat de Bjarne Stroustrup în anii 1980. 
          Este un limbaj de programare de nivel înalt, dar care permite și manipularea directă a memoriei, ceea ce îl face extrem de puternic și flexibil.
           C++ este utilizat în dezvoltarea de aplicații de performanță înaltă, cum ar fi jocurile video, aplicațiile de grafică și simulările științifice. 
          Vei învăța cum să îți instalezi mediul de dezvoltare C++, 
          cum să scrii un program simplu și cum să folosești concepte de bază precum variabile, tipuri de date și operatori.</p>
      </div>
      <div class="tutorial">
        <h3>Structuri de date în C++</h3>
        <p>C++ oferă o gamă largă de structuri de date care sunt esențiale pentru manipularea și stocarea eficientă a datelor. 
          Vei învăța despre tipurile de date fundamentale (precum întregi și caractere) și despre colecțiile de date mai avansate, 
          cum ar fi array-urile și vectorii. De asemenea, 
          vom explora cum să folosim pointere pentru a manipula datele în memorie și cum să lucrăm cu structuri personalizate de date (structuri și clase).</p>
      </div>
      <div class="tutorial">
        <h3>Clase și obiecte în C++</h3>
        <p>C++ este un limbaj orientat pe obiecte, ceea ce înseamnă că poți să creezi și să utilizezi obiecte și clase pentru a structura aplicațiile. 
          Vei învăța despre clasele C++ și cum să definești obiecte care au atât date (atribute), cât și funcții (metode). 
          Vom discuta despre concepte fundamentale de programare orientată pe obiecte (OOP), cum ar fi incapsularea, moștenirea și polimorfismul, 
          și vom explora cum să folosești aceste concepte pentru a crea programe mai organizate și mai ușor de întreținut.</p>
      </div>
    </section>
  </div>

  <script src="js/script.js"></script>

</body>
</html>
