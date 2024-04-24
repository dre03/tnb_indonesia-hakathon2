@include('layouts.header')
@include('layouts.sidebar')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $title }}</h5>
                        <div class="row">
                            <div class="col-md-6">
                                @if ($event->thumbnail)
                                    <img src="{{ asset('/storage/thumbnails/' . $event->thumbnail) }}" style="max-width: 100%; width: 100%" alt="Error Image">
                                @else
                                    <img src="https://www.tbnindonesia.org/images/transformational-sales-conference-2023-.jpg" style="max-width: 100%; width: 100%" alt="Error Image">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->name }}</h5>
                                    <p class="card-text">{{ $event->description }}</p>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <td>:</td>
                                                <?php setlocale(LC_TIME, 'id_ID'); ?>
                                                <td>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
                                                </td>

                                            </tr>
                                            <tr>
                                                <th>Waktu</th>
                                                <td>:</td>
                                                <td>{{ \Carbon\Carbon::parse($event->time)->format('H:i') }} WIB s/d
                                                    Selesai
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Lokasi</th>
                                                <td>:</td>
                                                <td>{{ $event->location }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pemateri</th>
                                                <td>:</td>
                                                <td>{{ $event->speaker->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Moderator</th>
                                                <td>:</td>
                                                <td>{{ $event->moderator->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($event->is_published === 0)
                                                        Ditunda
                                                    @else
                                                        Diterbitkan
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td>:</td>
                                                <td>{{ $event->eventCategory->name }}</td>
                                            </tr>
                                            @if ($event->eventCategory->name == 'Free')
                                            @else
                                                <tr>
                                                    <th>Harga Event</th>
                                                    <td>:</td>
                                                    <td>
                                                        Rp. {{ $event->price }}</td>
                                                </tr>
                                            @endif
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a href="/event" class="btn btn-secondary btn-sm mt-4">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@include('layouts.footer')
