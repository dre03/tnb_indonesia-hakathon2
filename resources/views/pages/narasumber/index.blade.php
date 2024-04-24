@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title }}</h5>
                        <!-- Bordered Tabs Justified -->
                        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#bordered-justified-home" type="button" role="tab"
                                    aria-controls="home" aria-selected="true">Pemateri</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#bordered-justified-profile" type="button" role="tab"
                                    aria-controls="profile" aria-selected="false">Moderator</button>
                            </li>
                        </ul>
                        {{-- Pemateri --}}
                        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                            <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <button id="hsgfhs" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addSpeaker"><i class="bi bi-plus-square"></i> Pemateri</button>
                                <table class="table table-borderless datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Profile</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @forelse ($speakers as $i => $item)
                                            <tr>
                                                <th scope="row">{{ ++$i }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->position }}</td>
                                                <td>
                                                    @if ($item->profile)
                                                        <img src="{{ asset('/storage/speakers/' . $item->profile) }}"
                                                            class="rounded-circle" alt="Error Image">
                                                    @else
                                                        <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png"
                                                            class="rounded-circle" alt="Error Image">
                                                    @endif
                                                </td>
                                                <td>{{ $item->gender }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('speaker.delete', $item->id) }}" method="POST">
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSpeaker{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger mt-2 text-center">
                                                Data Pemateri belum Tersedia.
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                            {{-- Moderator --}}
                            <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <button class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#addModerator"><i class="bi bi-plus-square"></i> Moderator</button>
                                <table class="table table-borderless datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">Profile</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @forelse ($moderators as $i => $item)
                                            <tr>
                                                <th scope="row">{{ ++$i }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->position }}</td>
                                                <td>
                                                    @if ($item->profile)
                                                        <img src="{{ asset('/storage/moderators/' . $item->profile) }}"
                                                            class="rounded-circle" alt="Error Image">
                                                    @else
                                                        <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png"
                                                            class="rounded-circle" alt="Error Image">
                                                    @endif
                                                </td>
                                                <td>{{ $item->gender }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('moderator.delete', $item->id) }}" method="POST">
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModerator{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="alert alert-danger mt-2 text-center">
                                                Data Moderator belum Tersedia.
                                            </div>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End Bordered Tabs Justified -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Modal Add Speaker --}}
    <div class="modal fade" id="addSpeaker" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pemateri</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('speaker.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nameSpeaker" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameSpeaker" name="nameSpeaker"
                                    value="{{ old('nameSpeaker') }}">
                                @error('nameSpeaker')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="positionSpeaker" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="positionSpeaker"
                                    name="positionSpeaker" value="{{ old('positionSpeaker') }}">
                                @error('positionSpeaker')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="genderSpeaker" class="form-label">Jenis Kelamin</label>
                                <select name="genderSpeaker" id="genderSpeaker" class="form-select">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki"
                                        {{ old('genderSpeaker') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ old('genderSpeaker') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>

                                @error('genderSpeaker')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="profileSpeaker" class="form-label">Profile</label>
                                <input type="file" class="form-control" id="profileSpeaker"
                                    name="profileSpeaker">
                                @error('profileSpeaker')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Speaker --}}
    @foreach ($speakers as $item)
        <div class="modal fade" id="editSpeaker{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pemateri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="{{ route('speaker.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="nameSpeaker" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="nameSpeaker" name="nameSpeaker"
                                        value="{{ old('nameSpeaker', $item->name) }}">
                                    @error('nameSpeaker')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="positionSpeaker" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="positionSpeaker"
                                        name="positionSpeaker" value="{{ old('positionSpeaker', $item->position) }}">
                                    @error('positionSpeaker')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="genderSpeaker" class="form-label">Jenis Kelamin</label>
                                    <select name="genderSpeaker" id="genderSpeaker" class="form-select">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki"
                                            {{ old('genderSpeaker', $item->gender) == 'Laki-Laki' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="Perempuan"
                                            {{ old('genderSpeaker', $item->gender) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('genderSpeaker')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="profileSpeaker" class="form-label">Profile</label>
                                    <input type="file" class="form-control" id="profileSpeaker"
                                        name="profileSpeaker">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- Modal Add Moderator --}}
    <div class="modal fade" id="addModerator" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Moderator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <!-- Multi Columns Form -->
                        <form class="row g-3" action="{{ route('moderator.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nameModerator" class="form-label">Name</label>
                                <input type="text" class="form-control" id="nameModerator" name="nameModerator"
                                    value="{{ old('nameModerator') }}">
                                @error('nameModerator')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="positionModerator" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="positionModerator"
                                    name="positionModerator" value="{{ old('positionModerator') }}">
                                @error('positionModerator')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="genderModerator" class="form-label">Jenis Kelamin</label>
                                <select name="genderModerator" id="genderModerator" class="form-select">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki"
                                        {{ old('genderModerator') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                    </option>
                                    <option value="Perempuan"
                                        {{ old('genderModerator') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>

                                @error('genderModerator')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="profileModerator" class="form-label">Profile</label>
                                <input type="file" class="form-control" id="profileModerator"
                                    name="profileModerator">
                                @error('profileModerator')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update Moderator --}}
    @foreach ($moderators as $item)
        <div class="modal fade" id="editModerator{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pemateri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <!-- Multi Columns Form -->
                            <form class="row g-3" action="{{ route('moderator.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="nameModerator" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="nameModerator"
                                        name="nameModerator" value="{{ old('nameModerator', $item->name) }}">
                                    @error('nameModerator')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="positionModerator" class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" id="positionModerator"
                                        name="positionModerator"
                                        value="{{ old('positionModerator', $item->position) }}">
                                    @error('positionModerator')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="genderModerator" class="form-label">Jenis Kelamin</label>
                                    <select name="genderModerator" id="genderModerator" class="form-select">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki"
                                            {{ old('genderModerator', $item->gender) == 'Laki-Laki' ? 'selected' : '' }}>
                                            Laki-Laki</option>
                                        <option value="Perempuan"
                                            {{ old('genderModerator', $item->gender) == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                    @error('genderModerator')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="profileModerator" class="form-label">Profile</label>
                                    <input type="file" class="form-control" id="profileModerator"
                                        name="profileModerator">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</main><!-- End #main -->
@include('layouts.footer')
@push('extra-js')
    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endpush
