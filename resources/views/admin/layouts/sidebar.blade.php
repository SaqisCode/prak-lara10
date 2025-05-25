<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <div class="sb-sidenav-menu-heading">Management</div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePatients" aria-expanded="false" aria-controls="collapsePatients">
                    <div class="sb-nav-link-icon"><i class="fas fa-procedures"></i></div>
                    Pasien
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePatients" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a href="{{ route('pasien.index') }}" class="nav-link">
                            Data Pasien
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDoctors" aria-expanded="false" aria-controls="collapseDoctors">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                    Dokter
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDoctors" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a href="{{ route('dokter.index') }}" class="nav-link">
                            Data Dokter
                        </a>
                        <a href="{{ route('dokter.jadwal') }}" class="nav-link">
                            Jadwal Dokter
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseKamar" aria-expanded="false" aria-controls="collapseKamar">
                    <div class="sb-nav-link-icon"><i class="fas fa-procedures"></i></div>
                    Rawat Inap
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseKamar" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a href="{{ route('kamar.index') }}" class="nav-link">
                            Kamar
                        </a>
                        <a href="{{ route('rawatInap.index') }}" class="nav-link">
                            Pasien
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAppointments" aria-expanded="false" aria-controls="collapseAppointments">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-check"></i></div>
                    Janji Temu
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAppointments" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('janji-temu.index') }}">Data Janji Temu</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{-- {{ Auth::user()->name }} --}}
        </div>
    </nav>
</div>
