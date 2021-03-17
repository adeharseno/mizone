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
                              Apa kelebihan Mizone dibandingkan produk dari merek lain yang sejenis?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <ul>
                                <li>Memiliki empat varian rasa pilihan (Leci Lemon, Belimbing, Bunga Sakura dan Cranberry)</li>
                                <li>Elektrolitnya bisa membantu mengganti hilangnya cairan tubuh dengan cepat.</li>
                                <li>Kandungan Vitamin Bnya (Vitamin B3, B6, B12) membantu proses pembentukan energi</li>
                                <li>Menggunakan pemanis alami dengan kadar gula dan kalori yang rendah</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Mengapa Mizone mengeluarkan produk dalam ukuran baru (350ml)?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            Mendengar dan memahami lebih jauh lagi akan kebutuhan konsumen, Mizone kemasan 350ml yang hadir dalam rasa favorit konsumen: Lychee Lemon ini juga lebih praktis dan ekonomis, sehingga dapat diminum setiap hari dalam berbagai kondisi. Formula ini terdiri dari elektrolit dan Vitamin B (B3, B6, B12).
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Apakah Mizone aman diminum setiap hari?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            Ya, karena bahan-bahan yang terkandung di dalamnya sudah sesuai dengan aturan BPOM dan DEPKES RI.
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                      
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingFour">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                              Apakah Mizone aman diminum oleh anak-anak?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            Mizone aman dikonsumsi oleh siapa saja, namun tidak disarankan untuk ibu hamil dan anak dibawah 5 tahun.
                          </div>
                        </div>
                      </div>
                      <!-- end of panel -->
                      
                      <div class="panel">
                        <div class="panel-heading" role="tab" id="headingFive">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                              Apakah Mizone baru ada kandungan pengawetnya? Apakah tetap aman?
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                            Ada kandungan pengawet makanan, agar produk bisa tetap memiliki kualitas yang baik untuk periode sampai dengan 12 bulan dengan kondisi penyimpanan normal di toko. Walaupun demikian, Mizone Mini dijamin tetap aman karena jenis dan kandungan pengawet yang digunakan sudah sesuai aturan yang ditetapkan oleh Depkes dan BPOM.
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
                              <div class="col-12 col-md-6"><input type="text" class="form-control"  placeholder="Nama"></div>
                              <div class="col-12 col-md-6"><input type="email" class="form-control"  placeholder="Email"></div>
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