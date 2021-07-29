<div class="card">
    <div class="card-body">
        <div class="form-group mb-3">
            <label class="form-label">
                Nama
            </label>
            <div class="form-control">
                {{ $admStudent->name }}
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-0">
                    <label class="form-label">
                        Nomor Induk
                    </label>
                    <div class="form-control">
                        {{ $admStudent->nis }}
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group mb-0">
                    <label class="form-label">
                        Kelas
                    </label>
                    <div class="form-control">
                        {{ $admStudent->admClass()->name }}
                    </div>
                </div>
            </div>
        </div>
        <div id="shortcut-info"></div>
    </div>
    <div class="card-body p-0">
        <a class="dropdown-item px-3" href="{{ url('attitude/trophy') . '/' . $admStudent->id }}" data-shortcut="trophy">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="8" y1="21" x2="16" y2="21" /><line x1="12" y1="17" x2="12" y2="21" /><line x1="7" y1="4" x2="17" y2="4" /><path d="M17 4v8a5 5 0 0 1 -10 0v-8" /><circle cx="5" cy="9" r="2" /><circle cx="19" cy="9" r="2" /></svg>
            Catatan Prestasi
        </a>
        <div class="dropdown-divider my-0"></div>
        <a class="dropdown-item px-3" href="{{ url('attitude/violation') . '/' . $admStudent->id }}" data-shortcut="violation">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><rect x="9" y="3" width="6" height="4" rx="2" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
            Pelanggaran Tata Tertib
        </a>
        <div class="dropdown-divider my-0"></div>
        <a class="dropdown-item px-3" href="{{ url('attitude/counseling') . '/' . $admStudent->id }}" data-shortcut="counseling">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M10 16.5l2 -3l2 3m-2 -3v-2l3 -1m-6 0l3 1" /><circle cx="12" cy="7.5" r=".5" fill="currentColor" /></svg>
            Bimbingan Konseling
        </a>
        <div class="dropdown-divider my-0"></div>
        <a class="dropdown-item px-3" href="{{ url('learning/report') . '/' . $admStudent->id }}" data-shortcut="report">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mr-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="4" width="18" height="4" rx="2" /><path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" /><line x1="10" y1="12" x2="14" y2="12" /></svg>
            Laporan Belajar
        </a>
    </div>
</div>