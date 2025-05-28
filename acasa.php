<?php include 'includes/header.php'; ?>


  <nav>
    <div class="logo">
      <img src="images/logo.webp" alt="SkillForge logo" />
      <a href="acasa.php">SkillForge</a>
    </div>
    <div class="nav-links">
      <a href="acasa.php">Acasă</a>
      <a href="#">Proiecte</a>
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

    <div class="hero">
        <div class="left-section">
            <div class="top">
                <h2>Cu ce se ocupă site-ul nostru ?</h2>
                <p>
                    Site-ul nostru este o platformă educațională unde elevii și începătorii pot învăța programare, electronică, design și alte abilități practice prin mini-proiecte interactive și ghidate.
                    Accentul e pe învățare activă.
                </p>
            </div>
        </div>
        <img src="images/logo.webp" alt="Hero Image" class="hero-image">
    </div>
<section class="fade-in-section">
        <div class="fade-in">
    <div class="about">
        <p>Despre proiectele noastre</p>
        <h2>Mini-proiecte interactive care te ghidează de la idee la rezultat, perfect pentru începători.</h2>
        <div class="items">
      
          
          <div class="item">
            <div class="inner">
              <img src="images/python.png" alt="Python">
              <a href="#">Proiecte Python</a>
              <p>
                Învață Python prin proiecte practice pentru începători:
                <br>○ Jocuri simple (X și 0, Snake)
                <br>○ Automatizări utile (ex: redenumiri, e-mail)
                <br>○ Aplicații grafice (cronometre, notițe)
                <br>○ Proiecte hardware (Arduino, Raspberry Pi)
              </p>
              <a href="python-projects.html" class="btn">Vezi proiecte <i class="ri-arrow-right-line"></i></a>
            </div>
          </div>
      
          
          <div class="item">
            <div class="inner">
              <img src="images/html.webp" alt="HTML & CSS">
              <a href="#">Proiecte HTML & CSS</a>
              <p>
                Creează pagini web moderne și responsive:
                <br>○ Portofolii și bloguri
                <br>○ Formulare de contact
                <br>○ Design CSS atrăgător
                <br>○ Structuri responsive pentru mobil
              </p>
              <a href="html-projects.html" class="btn">Vezi proiecte <i class="ri-arrow-right-line"></i></a>
            </div>
          </div>
      
          
          <div class="item">
            <div class="inner">
              <img src="images/cpp.png" alt="C++">
              <a href="#">Probleme de C++</a>
              <p>
                Proiecte utile pentru aprofundare în C++:
                <br>○ Jocuri tip consolă (Spânzurătoarea, Numere random)
                <br>○ Algoritmi simpli (sortări, căutări)
                <br>○ Introducere în OOP
                <br>○ Simulări logice sau competiții
              </p>
              <a href="cpp-projects.html" class="btn">Vezi proiecte <i class="ri-arrow-right-line"></i></a>
            </div>
          </div>
      
        </div>
      </div>
    </section>
        </div>
    <div class="projects">
      <div class="inner">
          <h2>Ce poți realiza cu SkillForge</h2>
          <p class="info">Descoperă cum SkillForge te ajută să înveți programare prin practică și să-ți creezi propriile proiecte interesante.</p>
          <button>Explorează platforma <i class="ri-arrow-right-line"></i></button>
  
          <div class="items">
              <div class="item">
                  <i class="ri-pencil-ruler-2-line"></i>
                  <a href="#">Tutoriale Interactive</a>
                  <p>Parcurge lecții pas cu pas în HTML, Python și multe altele, cu exemple live.</p>
              </div>
              <div class="item">
                  <i class="ri-terminal-line"></i>
                  <a href="#">Editor și Compilator Online</a>
                  <p>Testează-ți codul direct în browser și vezi rezultatele instant.</p>
              </div>
              <div class="item">
                  <i class="ri-trophy-line"></i>
                  <a href="#">Provocări și Probleme</a>
                  <p>Pregătește-te pentru concursuri și interviuri cu exerciții adaptate nivelului tău.</p>
              </div>
              <div class="item">
                  <i class="ri-user-heart-line"></i>
                  <a href="#">Cont Personalizat</a>
                  <p>Salvează-ți progresul și accesează-ți proiectele oriunde, oricând.</p>
              </div>
          </div>
      </div>
  </div>

<?php include 'includes/footer.php'; ?>
