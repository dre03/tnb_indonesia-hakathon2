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

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title }}</h5>
                        <button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#addEvent"><i
                                class="bi bi-plus-square"></i> Event</button>
                        <!-- Default Table -->
                        <table class="table table-borderless datatable">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Pemateri</th>
                                    <th scope="col">Moderator</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($events as $i => $item)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->speaker->name }}</td>
                                        <td>{{ $item->moderator->name }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('event.delete', $item->id) }}" method="POST">
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEvent{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                                <a href="{{ route('event.detail', $item->id) }}" class="btn btn-success btn-sm"><i class="bi bi-eye-fill"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <div class="alert alert-danger mt-2 text-center">
                                        Data Event belum Tersedia.
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
    {{-- Modal Add Event --}}
    <div class="modal fade" id="addEvent" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Event</h5>
                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="POST" action="{{ route('event.store') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="location" class="form-label">Tempat</label>
                                <input type="text" class="form-control" id="location" name="location"
                                    value="{{ old('location') }}">
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="date" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ old('date') }}">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="time" class="form-label">Waktu</label>
                                <input type="time" class="form-control" id="time" name="time"
                                    value="{{ old('time') }}">
                                @error('time')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="speaker_id" class="form-label">Pemateri</label>
                                <select name="speaker_id" id="speaker_id" class="form-select">
                                    <option>Pilih Pemateri</option>
                                    @foreach ($speakers as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('speaker_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('speaker_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="moderator_id" class="form-label">Moderator</label>
                                <select name="moderator_id" id="moderator_id" class="form-select">
                                    <option>Pilih Moderator</option>
                                    @foreach ($moderators as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('moderator_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('moderator_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="is_published" class="form-label">Status</label>
                                <select id="is_published" name="is_published" class="form-select">
                                    <option>Pilih Status</option>
                                    <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>Ditunda
                                    </option>
                                    <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>
                                        Diterbitkan</option>
                                </select>
                                @error('is_published')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Kategori Event</label>
                                <select id="event_category_id" name="event_category_id" class="form-select">
                                    <option>Pilih Kategori Event</option>
                                    @foreach ($eventCategorys as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('event_category_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('event_category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="price" class="form-label">Harga Event</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="thumbnail" class="form-label">Thubnail</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                @error('thumbnail')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                <textarea class="form-control" name="description" id="description" style="height: 100px">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center col-md-12">
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


    {{-- Modal Update Event --}}
    @foreach ($events as $item)
        <div class="modal fade" id="editEvent{{ $item->id }}" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <h5 class="card-title">Update Event</h5>
                            <!-- Multi Columns Form -->
                            <form class="row g-3" method="POST" action="{{ route('event.update', $item->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $item->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Tempat</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        value="{{ old('location', $item->location) }}">
                                    @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ old('date', $item->date) }}">
                                    @error('date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="time" class="form-label">Waktu</label>
                                    <input type="time" class="form-control" id="time" name="time"
                                        value="{{ old('time', $item->time) }}">
                                    @error('time')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="speaker_id" class="form-label">Pemateri</label>
                                    <select name="speaker_id" id="speaker_id" class="form-select">
                                        <option>Pilih Pemateri</option>
                                        @foreach ($speakers as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('speaker_id', $item->speaker_id) == $data->id ? 'selected' : '' }}>
                                                {{ $data->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('speaker_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="moderator_id" class="form-label">Moderator</label>
                                    <select name="moderator_id" id="moderator_id" class="form-select">
                                        <option>Pilih Moderator</option>
                                        @foreach ($moderators as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('moderator_id', $item->moderator_id) == $data->id ? 'selected' : '' }}>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('moderator_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="is_published" class="form-label">Status</label>
                                    <select id="is_published" name="is_published" class="form-select">
                                        <option>Pilih Status</option>
                                        <option value="0" {{ old('is_published', $item->is_published) == '0' ? 'selected' : '' }}>
                                            Ditunda
                                        </option>
                                        <option value="1" {{ old('is_published', $item->is_published) == '1' ? 'selected' : '' }}>
                                            Diterbitkan</option>
                                    </select>
                                    @error('is_published')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Kategori Event</label>
                                    <select id="event_category_id" name="event_category_id" class="form-select">
                                        <option>Pilih Kategori Event</option>
                                        @foreach ($eventCategorys as $data)
                                            <option value="{{ $data->id }}"
                                                {{ old('event_category_id', $item->event_category_id) == $data->id ? 'selected' : '' }}>
                                                {{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('event_category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Harga Event</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ old('price', $item->price) }}">
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="thumbnail" class="form-label">Thubnail</label>
                                    <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="description" style="height: 100px">{{ old('description', $item->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center col-md-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
