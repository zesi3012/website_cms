<div class="content-wrapper"> 
  <section class="content-header"> 
    <div class="container-fluid"> 
      <div class="row mb-2"> 
        <div class="col-sm-6"> 
          <h1><b>Pengaturan Website</b> <small>informasi website</small></h1> 
        </div>  
      </div> 
    </div><!-- /.container-fluid --> 
  </section> 

  <section class="content"> 
    <div class="container-fluid"> 
      <div class="row"> 
        <div class="col-lg-12 connectedSortable"> 
          <div class="card card-primary"> 
            <div class="card-header"> 
              <h3 class="card-title"> 
                <i class="fas fa-edit"></i> Update Informasi Website 
              </h3>                  
            </div><!-- /.card-header -->  

            <div class="card-body"> 
              <?php  
              if (isset($_GET['alert'])) { 
                if ($_GET['alert'] == "sukses") { 
                  echo "<div class='alert alert-success'>Pengaturan berhasil diupdate!</div>"; 
                } 
              } 

              foreach ($pengaturan as $p) { 
              ?> 

              <div class="row">                            
                <div class="col-lg-8"> 
                  <form action="<?php echo base_url('dashboard/pengaturan_update'); ?>" method="post" enctype="multipart/form-data"> 
                    
                    <div class="form-group"> 
                      <label>Nama Website</label> 
                      <input type="text" name="nama" class="form-control" 
                        placeholder="Masukkan Nama Website..." 
                        value="<?php echo $p->nama; ?>">  
                      <?php echo form_error('nama'); ?> 
                    </div>  

                    <div class="form-group"> 
                      <label>Deskripsi Website</label>
                      <input type="text" name="deskripsi" class="form-control" 
                        placeholder="Masukkan Deskripsi Website..." 
                        value="<?php echo $p->deskripsi; ?>">  
                      <?php echo form_error('deskripsi'); ?> 
                    </div>   

                    <div class="form-group"> 
                      <label>Logo Website</label> 
                      <input type="file" name="logo" class="form-control"> 
                      <small>Kosongkan bila tidak ingin mengganti logo website</small> 
                    </div>   

                    <div class="form-group"> 
                      <label>Link Facebook</label> 
                      <input type="text" name="link_facebook" class="form-control" 
                        placeholder="Masukkan link Facebook..." 
                        value="<?php echo $p->link_facebook; ?>">  
                      <?php echo form_error('link_facebook'); ?> 
                    </div>  

                    <div class="form-group"> 
                      <label>Link Twitter</label> 
                      <input type="text" name="link_twitter" class="form-control" 
                        placeholder="Masukkan link Twitter..." 
                        value="<?php echo $p->link_twitter; ?>">  
                      <?php echo form_error('link_twitter'); ?> 
                    </div>       

                    <div class="form-group"> 
                      <label>Link Instagram</label> 
                      <input type="text" name="link_instagram" class="form-control" 
                        placeholder="Masukkan link Instagram..." 
                        value="<?php echo $p->link_instagram; ?>">  
                      <?php echo form_error('link_instagram'); ?> 
                    </div>   

                    <div class="form-group"> 
                      <label>Link Github</label> 
                      <input type="text" name="link_github" class="form-control" 
                        placeholder="Masukkan link Github..." 
                        value="<?php echo $p->link_github; ?>"> 
                      <?php echo form_error('link_github'); ?> 
                    </div>                       

                    <div class="form-group"> 
                      <input type="submit" value="Update" class="btn btn-success btn-block"> 
                    </div>                              
                  </form> 
                </div> 

                <div class="col-lg-4 text-center"> 
                  <div class="form-group"> 
                    <label>Logo Website</label><br> 
                    <img width="70%" class="img-responsive" 
                      src="<?php echo base_url('gambar/website/'.$p->logo); ?>" 
                      alt="Logo <?php echo $p->nama; ?>"> 
                  </div> 
                </div> 
              </div>                             
              <?php 
              } 
              ?>                       
            </div> 
          </div>                                   
        </div>       
      </div> 
    </div>       
  </section> 
</div>
