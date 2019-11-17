<?php $site = $this->pengaturan_model->get_all() ?>
<!--banner -->
<!-- Slideshow 4 -->
<div class="slider">
  <div class="callbacks_container">
    <ul class="rslides" id="slider4">
      <li>
        <div class="slider-img" style="background-image: url(<?= base_url('assets/admin/foto/'.$site->banner) ?>">
          <div class="container">
            <div class="slider-info text-left">
              <h4 >Studi</h4>
              <h5>Lorem ipsum dolor</h5>
              <p>velit sagittis vehicula
              </p>
              <div class="outs_more-buttn" >
                <a href="#about">More</a>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <!-- This is here just to demonstrate the callbacks -->
  <!-- <ul class="events">
    <li>Example 4 callback events</li>
    </ul>-->
  <div class="clearfix"></div>
</div>
</div>
<!-- //banner -->