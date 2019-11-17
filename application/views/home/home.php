<?php $site=$this->pengaturan_model->get_all() ?>
    <section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <!--Horizontal Tab-->
        <div id="horizontalTab">
          <ul class="resp-tabs-list justify-content-center">
            <li data-blast="bgColor">Tentang</li>
            <li data-blast="bgColor">Visi</li>
            <li data-blast="bgColor">Misi</li>
            <li data-blast="bgColor">Pengumuman</li>
          </ul>
          <div class="resp-tabs-container">
            <div class="tab1" >
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color">Tentang </h4>
                    <p><?= $site->tentang ?></p>
                    <h5 data-blast="color"> Siapa kami</h5>
                  </div>
                </div>
                <div class="col-md-5 about-txt-img">
                  <img src="<?= base_url('assets/template/') ?>images/ab1.jpg" class="img-thumbnail" alt="">
                </div>
              </div>
            </div>
            <div class="tab2">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="<?= base_url('assets/template/') ?>images/ab3.jpg" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color"> Visi</h4>
                    <p><?= $site->visi ?></p>
                    <h5 data-blast="color">Apa visi kami</h5>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab3">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color">Misi</h4>
                    <p><?= $site->misi ?></p>
                    <h5 data-blast="color">Apa misi kami</h5>
                  </div>
                </div>
                <div class="col-md-5 about-txt-img">
                  <img src="<?= base_url('assets/template/') ?>images/ab2.jpg" class="img-thumbnail" alt="">
                </div>
              </div>
            </div>
            <div class="tab4">
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="<?= base_url('assets/template/') ?>images/ab1.jpg" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-7 latest-list">
                  <div class="about-jewel-agile-left">
                    <h4 class="mb-3" data-blast="color">Pengumuman</h4>
                    <p><?= $site->info ?></p>
                    <h5 data-blast="color">Pengumuman</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//about-->
    

    <!--stats-->
    <section class="stats py-lg-4 py-md-3 py-sm-3 py-3" id="stats">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <div class="jst-must-info text-center">
          <div class="row stats-info">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-1">
              <div class="stats-grid" data-blast="bgColor">
                <?php 
                $ds = $this->db->query("SELECT count(id_dosen) FROM dosen ")->result_array(); ?>
                <div class="counter"><?php echo $ds[0]['count(id_dosen)']; ?></div>
                <div class="stat-info">
                  <h5 class="pt-2">Dosen </h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-2">
              <div class=" stats-grid" data-blast="bgColor">
                <?php 
                $mhs = $this->db->query("SELECT count(id_mahasiswa) FROM mahasiswa ")->result_array(); ?>
                <div class="counter"><?php echo $mhs[0]['count(id_mahasiswa)']; ?></div>
                <div class="stat-info">
                  <h5 class="pt-2"> Mahasiswa</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-3">
              <div class=" stats-grid" data-blast="bgColor">
                <?php 
                $pr = $this->db->query("SELECT count(id_prodi) FROM prodi")->result_array(); ?>
                <div class="counter"><?php echo $pr[0]['count(id_prodi)']; ?></div>
                <div class="stat-info">
                  <h5 class="pt-2"> Program Studi</h5>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 stats-grid-4">
              <div class=" stats-grid" data-blast="bgColor">
                <?php 
                $jrs = $this->db->query("SELECT count(id_jurusan) FROM jurusan")->result_array(); ?>
                <div class="counter"><?php echo $jrs[0]['count(id_jurusan)']; ?></div>
                <div class="stat-info">
                  <h5 class="pt-2"> Jurusan </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//stats-->
    <!--Team-->
    <section class="team py-lg-4 py-md-3 py-sm-3 py-3" id="team">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Our Staff </h3>
        <div class="row ">
          <?php foreach ($dosen as $dosen) :
          ?>
          <div class="col-md-3 mb-3 profile">
            <div class="team-shadow">
              <div class="img-box">
                <img src="<?= base_url('assets/admin/img/'.$dosen->foto) ?>" alt="">
                <div class="list-social-icons">
                  <ul>
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                  </ul>
                </div>
              </div>
              <div class="team-w3layouts-info py-lg-4 py-3 text-center" data-blast="bgColor">
                <h4 class="text-white mb-2"><?= $dosen->nama_lengkap ?></h4>
                <span class="wls-client-title text-black">Professor</span>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!--//Team-->
    <!--contact -->
    <section class="contact py-lg-4 py-md-3 py-sm-3 py-3" id="contact">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title clr text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Contact Us</h3>
        <div class="row">
          <div class="col-md-5 address-grid">
            <div class="addres-office-hour text-center" >
              <ul>
                <li class="mb-2">
                  <h6 data-blast="color">Alamat</h6>
                </li>
                <li>
                  <p><?= $site->alamat ?></p>
                </li>
              </ul>
              <ul>
                <li class="mt-lg-4 mt-3">
                  <h6 data-blast="color">Telepon</h6>
                </li>
                <li class="mt-2">
                  <p><?= $site->telepon ?></p>
                </li>
                <li class="mt-lg-4 mt-3">
                  <h6 data-blast="color">Email</h6>
                </li>
                <li class="mt-2">
                  <p><a href="mailto:<?= $site->email ?>"><?= $site->email ?></a></p>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-7 contact-form">
            <form action="#" method="post">
              <div class="row text-center contact-wls-detail">
                <div class="col-md-6 form-group contact-forms">
                  <input type="text" class="form-control" placeholder="Your Name" required="">
                </div>
                <div class="col-md-6 form-group contact-forms">
                  <input type="email" class="form-control" placeholder="Your Email" required="">
                </div>
              </div>
              <div class="form-group contact-forms">
                <input type="text" class="form-control" placeholder="Subject" required="">
              </div>
              <div class="form-group contact-forms">
                <textarea class="form-control" rows="3" placeholder="Your Message" required=""></textarea>
              </div>
              <div class="sent-butnn text-center">
                <button type="submit" class="btn btn-block" data-blast="bgColor">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--//contact -->