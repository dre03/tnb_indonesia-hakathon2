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
                        <!-- Default Table -->
                        <table class="table table-borderless datatable">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama Event</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @forelse ($payments as $i => $item )
                                    <tr>
                                        <th scope="row">{{ ++$i }}</th>
                                        <td>{{$item->participant->user->name}}</td>
                                        <td>{{$item->participant->event->name}}</td>
                                        <td>Rp. {{$item->amount}}</td>
                                        <td>{{$item->paymentStatus->status}}</td>
                                    </tr>
                                @empty
                                     <div class="alert alert-danger mt-2 text-center">
                                        Data Payment belum Tersedia.
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
