            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php 
                            if ($this->session->userdata('level') == 'Ketua') {
                                echo '
                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Simpanan</a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="'.base_url().'simpanancontr/viewsimpanan/"><i class="fa fa-bar-chart-o fa-fw"></i>Akun Simpanan</a>        
                                            </li>
                                            <li>
                                                <a href="'.base_url().'transsimpanancontr/viewtranssimpanan"><i class="fa fa-bar-chart-o fa-fw"></i>Bukti Transaksi Simpanan</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-male fa-fw"></i>Pinjaman<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="'.base_url().'PinjamanContr/"><i class="fa fa-bar-chart-o fa-fw"></i>Akun Pinjaman</a>        
                                            </li>
                                            <li>
                                                <a href="'.base_url().'pukcontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Akun PUK</a>        
                                            </li>
                                            <li>
                                                <a href="'.base_url().'transpinjamanContr/viewtranspinjaman"><i class="fa fa-bar-chart-o fa-fw" ></i>Bukti Transaksi Pinjaman</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'transpukcontr/viewTransPuk"><i class="fa fa-bar-chart-o fa-fw"></i>Bukti Transaksi PUK</a>
                                            </li>
                                        </ul>    
                                    </li>
                                    
                                    <li>
                                        <a href="#"><i class="fa fa-male fa-fw">
                                            </i>Anggota Koperasi<span class="fa arrow"></span>
                                        </a>
                                        <ul class="nav nav-second-level">
                                             <li>
                                                <a href="'.base_url().'anggotacontr/viewanggota">Anggota Biasa</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'anggotapukcontr/viewanggotapuk">Anggota PUK</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'staffcontr/viewstaff">Staff</a>
                                            </li>

                                            <li>
                                                <a href="'.base_url().'agamacontr/">Agama</a>
                                            </li>

                                            <li>
                                                <a href="'.base_url().'kelompokcontr/viewkwm">Kelompok</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'slotcontr/">Slot Kelompok</a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Laporan<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="'.base_url().'LpSmpnContr/">Laporan Simpanan</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'LpPnjmContr/">Laporan Pinjaman</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'lppukcontr/">Laporan Pinjaman PUK</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Managemen Detail<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            
                                            <li>
                                                <a href="'.base_url().'adscontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Administrasi</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'acccontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Akses</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'bungacontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Bunga</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'otoritascontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Otoritas</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'jbcontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Jenis Pembayaran</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'jpcontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Jenis Pinjaman</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'jscontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Jenis Simpanan</a>
                                            </li>
                                            
                                            <li>
                                                <a href="'.base_url().'koperasi/"><i class="fa fa-bar-chart-o fa-fw"></i>Koperasi</a>
                                            </li>
                                            
                                            <li>
                                                <a href="'.base_url().'premicontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Premi</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'vouchercontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Voucher</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Persetujuan<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>    
                                                <a href="'.base_url().'keputusan/">Keputusan</a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    ';
                            }

                            elseif ($this->session->userdata('level') == 'Bendahara') {
                                echo '
                                    <li>
                                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Simpanan</a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="'.base_url().'simpanancontr/viewsimpanan/"><i class="fa fa-bar-chart-o fa-fw"></i>Simpanan Anggota</a>        
                                            </li>
                                            <li>
                                                <a href="'.base_url().'transsimpanancontr/viewtranssimpanan"><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi Simpanan</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-male fa-fw"></i>Pinjaman<span class="fa arrow"></span></a>
                                        <ul class="nav nav-second-level">
                                            <li>
                                                <a href="'.base_url().'PinjamanContr/"><i class="fa fa-bar-chart-o fa-fw"></i>Pinjaman Anggota</a>        
                                            </li>
                                            <li>
                                                <a href="'.base_url().'pukcontr/"><i class="fa fa-bar-chart-o fa-fw"></i>Pinjaman PUK</a>        
                                            </li>
                                            <li>
                                                <a href="'.base_url().'transpinjamanContr/viewtranspinjaman"><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi Pinjaman</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'transpukcontr/viewTransPuk"><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi PUK</a>
                                            </li>
                                        </ul>    
                                    </li>
                                    
                                    ';
                            }
                            elseif ($this->session->userdata('level') == 'Sekretaris') {
                                echo '
                                    <li>
                                        <a href="#"><i class="fa fa-male fa-fw"></i>Anggota Koperasi</a>
                                        <ul class="nav nav-second-level">
                                             <li>
                                                <a href="'.base_url().'anggotacontr/viewanggota">Anggota Biasa</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'anggotapukcontr/viewanggotapuk">Anggota PUK</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'staffcontr/viewstaff">Staff</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'kelompokcontr/viewkwm">Kelompok</a>
                                            </li>
                                            <li>
                                                <a href="'.base_url().'slotcontr/">Slot Kelompok</a>
                                            </li>
                                        </ul>
                                    </li>
                                ';
                            }
                         ?>
                                    
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>