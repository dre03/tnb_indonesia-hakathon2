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
                        <!-- Default Table -->
                        <table class="table table-borderless datatable">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($participants as $i => $item)
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            @if ($item->user->profile)
                                                <img src="{{ asset('/storage/users/' . $item->profile) }}"
                                                    class="rounded-circle" alt="Error Image">
                                            @else
                                                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png"
                                                    class="rounded-circle" alt="Error Image">
                                            @endif
                                        </td>
                                        <td>{{ $item->event->name }}</td>
                                        <td>
                                            @php
                                                $optionClass = '';
                                                $label = '';
                                            @endphp
                                            @if ($item->participantStatus->status == 'Ditolak')
                                                @php
                                                    $optionClass = 'btn btn-danger';
                                                    $label = 'Ditolak';
                                                @endphp
                                            @elseif ($item->participantStatus->status == 'Disetujui')
                                                @php
                                                    $optionClass = 'btn btn-success';
                                                    $label = 'Disetujui';
                                                @endphp
                                            @else
                                                @php
                                                    $optionClass = 'btn btn-warning';
                                                    $label = 'Menunggu';
                                                @endphp
                                            @endif
                                            @if ($item->participantStatus->status === 'Disetujui')
                                                <button class="{{ $optionClass }}"
                                                    style="width: 100%">{{ $label }}</button>
                                            @else
                                                <form id="updateForm{{ $item->id }}" action="{{ route('participant.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status" id="status{{ $item->id }}"
                                                        class="form-select form-select-sm {{ $optionClass }} text-white fw-bold"
                                                        onchange="submitForm('{{ $item->id }}')">
                                                        @php
                                                            $optionClass = '';
                                                        @endphp
                                                        @foreach ($participantStatus as $status)
                                                            @if ($status->status === 'Ditolak')
                                                                @php
                                                                    $optionClass = 'bg-danger';
                                                                @endphp
                                                            @elseif ($status->status === 'Disetujui')
                                                                @php
                                                                    $optionClass = 'bg-success';
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $optionClass = 'bg-warning';
                                                                @endphp
                                                            @endif
                                                            <option class="{{ $optionClass }} text-white"
                                                                value="{{ $status->id }}"
                                                                {{ $item->participantStatus->status == $status->status ? 'selected' : '' }}>
                                                                {{ $status->status }}</option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger mt-2 text-center">
                                        Data Peserta belum Tersedia.
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
</main><!-- End #main -->
@include('layouts.footer')
<script>
    function submitForm(formId) {
        document.getElementById('updateForm' + formId).submit();
    }
</script>
