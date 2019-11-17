  <body>
    <div class="blast-box">
      <div></div>
    </div>
    <div class="header-outs" id="header">
      <div class="header-w3layouts">
        <div class="container">
          <div class="row headder-contact">
            <div class="col-lg-6 col-md-7 col-sm-9 info-contact-agile">
              <ul>
                <li>
                  <span class="fas fa-phone-volume" ></span>
                  <p><?= $site->telepon ?></p>
                </li>
                <li>
                  <span class="fas fa-envelope"></span>
                  <p><a href="mailto:info@example.com"><?= $site->email ?></a></p>
                </li>
                <li>
                </li>
              </ul>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-3 icons px-0">
              <ul>
                <li><a href="<?= $site->facebook ?>"><span class="fab fa-facebook-f"></span></a></li>
                <li><a href="<?= $site->instagram ?>"><span class="fab fa-instagram"></span></a></li>
                <li><a href="#"><span class="fab fa-linkedin"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="hedder-up">
            <h1 ><a href="<?= base_url() ?>" class="navbar-brand" data-blast="color"><?= $site->logo ?></a></h1>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="headdser-nav-color" data-blast="bgColor">
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a href="#about" class="nav-link scroll" >Tentang</a>
                </li>
                <li class="nav-item">
                  <a href="#team" class="nav-link scroll">Team</a>
                </li>
                <li class="nav-item">
                  <a href="#contact" class="nav-link scroll">Kontak</a>
                </li>
                <li class="nav-item">
                  <a href="#stats" class="nav-link scroll">Stats</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!--//navigation section -->
        <div class="clearfix"> </div>
      </div>