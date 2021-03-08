<?= $this->extend('partials/main') ?>

<?= $this->section('content') ?>
  
  <div class="section-faq">
      <div class="container">
          <div class="row">
              <div class="col">
                  <h4 class="title-main-bold text-center mb-4" style="color: white">FAQ</h4>
              </div>
          </div>
          <div class="row">
              <div class="col">
                    <div class="panel-group wrap" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Apa itu Mizone Isotonik + VitaminB*? 
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Apakah Mizone aman diminum ibu hamil?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Bagaimana cara menyimpan Mizone?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch.
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                
                    </div>
              </div>
          </div>
          <div class="row">
              <div class="col">
                  <h2 class="mb-4" style="color: white">Tidak menemukan pertanyaanmu?</h2>
                  <div class="contact-faq">
                      <form>
                          <div class="row">
                              <div class="col-6"><input type="text" class="form-control"  placeholder="Nama"></div>
                              <div class="col-6"><input type="email" class="form-control"  placeholder="Email"></div>
                          </div>
                          <div class="row">
                              <div class="col-12"><textarea class="form-control" rows="3" placeholder="Pertanyaan"></textarea></div>
                          </div>
                          <div class="row">
                              <div class="col-12 text-right">
                                  <button type="submit" class="btn btn-primary">Kirim</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  
 <?= $this->endSection() ?>