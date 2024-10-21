<div class="news-event-area py-5">
    <div class="container">
        <div class="row">
            <!-- Bagian Berita -->
            <div class="col-lg-6 col-md-6 mb-4 news-inner-area">
                <h2 class="title-default-left">Berita Terbaru</h2>
                <ul class="news-wrapper list-unstyled">
                    @foreach ($berita as $beritas)
                        <li class="media mb-3">
                            <div class="news-img-holder mr-3">
                                <a href="{{ route('detail.berita', $beritas->slug) }}">
                                    <img src="{{ asset('storage/images/berita/' .$beritas->thumbnail) }}" class="img-fluid" alt="news" style="max-height: 100px; max-width: 100px">
                                </a>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><a href="{{ route('detail.berita', $beritas->slug) }}">{{$beritas->title}}</a></h5>
                                <div class="post-date text-muted">{{ \Carbon\Carbon::parse($beritas->created_at)->format('d F Y') }}</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="news-btn-holder mt-4">
                    <a href="{{ route('berita') }}" class="btn btn-primary">Lihat Semua</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
