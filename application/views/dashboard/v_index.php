<!-- Custom CSS -->
<style>
    /* Card hover */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 20px rgba(0,0,0,0.15);
    }

    /* Icon */
    .card-icon {
        font-size: 3rem;
        opacity: 0.14;
        position: absolute;
        top: 15px;
        right: 20px;
    }

    /* User image */
    .user-card-img {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    /* Profile Card */
    .profile-card {
        border-radius: 12px;
        padding: 30px;
    }

    /* Text sizes */
    .profile-name {
        font-size: 1.4rem;
        font-weight: bold;
    }

    .profile-role {
        font-size: 1rem;
        font-weight: 500;
        color: #555;
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <!-- ============ DASHBOARD CARD ============ -->
            <div class="row dashboard-row">

                <!-- ✔ Card jumlah artikel (Admin & Penulis dapat melihat) -->
                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="card bg-info text-white card-hover position-relative">
                        <div class="card-body">
                            <h3 class="count" data-count="<?= $jumlah_artikel ?? 0; ?>">0</h3>
                            <p>Jumlah Artikel</p>
                            <i class="fas fa-newspaper card-icon"></i>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="<?= base_url('dashboard/artikel'); ?>" class="text-white small-box-footer">
                                Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>


                <!-- ✔ Card Admin Only -->
                <?php if ($this->session->userdata('level') == 'admin') : ?>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="card bg-success text-white card-hover position-relative">
                        <div class="card-body">
                            <h3 class="count" data-count="<?= $jumlah_kategori ?? 0; ?>">0</h3>
                            <p>Jumlah Kategori</p>
                            <i class="fas fa-list card-icon"></i>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="<?= base_url('dashboard/kategori'); ?>" class="text-white small-box-footer">
                                Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="card bg-warning text-white card-hover position-relative">
                        <div class="card-body">
                            <h3 class="count" data-count="<?= $jumlah_pengguna ?? 0; ?>">0</h3>
                            <p>Jumlah Pengguna</p>
                            <i class="fas fa-users card-icon"></i>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="<?= base_url('dashboard/pengguna'); ?>" class="text-white small-box-footer">
                                Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12 mb-3">
                    <div class="card bg-danger text-white card-hover position-relative">
                        <div class="card-body">
                            <h3 class="count" data-count="<?= $jumlah_halaman ?? 0; ?>">0</h3>
                            <p>Jumlah Halaman</p>
                            <i class="fas fa-file-alt card-icon"></i>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="<?= base_url('dashboard/pages'); ?>" class="text-white small-box-footer">
                                Selengkapnya <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <?php endif; ?>

            </div>


            <!-- ============ USER PROFILE SECTION ============ -->
            <div class="row mt-4">
                <section class="col-lg-12 connectedSortable">

                    <div class="card shadow-sm border-0 profile-card">

                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title"><i class="fas fa-user"></i> Profil Pengguna</h3>
                        </div>

                        <div class="card-body">

                            <?php 
                                $id_user = $this->session->userdata('id');
                                $user = $this->db->get_where('pengguna', ['pengguna_id' => $id_user])->row();
                            ?>

                            <div class="row align-items-center">

                                <!-- Foto User -->
                                <div class="col-md-3 text-center mb-3">
                                    <img src="<?= base_url('assets/dist/img/photo3.jpg'); ?>" class="user-card-img" alt="User">
                                </div>

                                <!-- Detail User -->
                                <div class="col-md-9">

                                    <h4 class="profile-name"><?= $user->pengguna_nama ?? '-' ?></h4>
                                    <p class="profile-role mb-3">
                                        <i class="fas fa-id-badge"></i> 
                                        <?= ucfirst($this->session->userdata('level')); ?>
                                    </p>

                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="25%">Username</th>
                                            <td><?= $this->session->userdata('username'); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td><span class="badge badge-success">Aktif</span></td>
                                        </tr>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>

                </section>
            </div>


        </div>
    </section>
</div>


<!-- JS Counter -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    const counters = document.querySelectorAll('.count');
    counters.forEach(counter => {
        let updateCount = () => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText;
            const increment = Math.ceil(target / 50);
            if(count < target){
                counter.innerText = count + increment;
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});
</script>
