@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>
    <!-- Tambahkan ini untuk menampilkan pesan notifikasi -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!-- Akhir bagian untuk menampilkan pesan notifikasi -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title }}</h5>
                        <!-- Default Table -->
                        <table class="table table-borderless datatable">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Aksi</th>


                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($users as $i => $item)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>
                                            @if ($item->profile)
                                                <img src="{{ asset('/storage/users/' . $item->profile) }}" class="rounded-circle" alt="Error Image">
                                            @else
                                                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" class="rounded-circle" alt="Error Image">
                                            @endif
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>
                                            <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#showUser{{ $item->id }}"><i
                                                    class="bi bi-eye-fill"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger mt-2 text-center">
                                        Data User belum Tersedia.
                                    </div>
                                @endforelse


                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @foreach ($users as $item)
        <div class="modal fade" id="showUser{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            @if ($item->profile)
                                    <img src="{{ asset('/storage/users/' . $item->profile) }}" class="rounded-circle mx-auto d-block" alt="Error Image">
                            @else
                                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" class="rounded-circle mx-auto d-block" alt="Error Image">
                            @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">email</th>
                                        <td>:</td>
                                        <td>{{ $item->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>No Telepon</th>
                                        <td>:</td>
                                        <td>{{ $item->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Username</th>
                                        <td>:</td>
                                        <td>{{ $item->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Lahir</th>
                                        <td>:</td>
                                        <td>{{ $item->brith_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Lahir</th>
                                        <td>:</td>
                                        <td>{{ $item->brith_place }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>:</td>
                                        <td>{{ $item->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <td>{{ $item->address }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</main><!-- End #main -->
@include('layouts.footer')
