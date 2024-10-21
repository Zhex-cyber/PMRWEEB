@extends('layouts.frontend.app')

@section('title', $kegiatan->nama)

@section('content')
<div class="news-details-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row news-details-page-inner">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="news-img-holder">
                            <img src="{{asset('storage/images/kegiatan/' .$kegiatan->image)}}" class="img-responsive" alt="{{$kegiatan->nama}}">
                            <ul class="news-date1">
                                <li>{{Carbon\Carbon::parse($kegiatan->created_at)->format('d M')}}</li>
                                <li>{{Carbon\Carbon::parse($kegiatan->created_at)->format('Y')}}</li>
                            </ul>
                        </div>
                        <h2 class="title-default-left-bold-lowhight">{{$kegiatan->nama}}</h2>
                        <p>{!! $kegiatan->content !!}</p>
                        <ul class="news-social">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="sidebar-box">
                    <div class="sidebar-box-inner">
                        <h3 class="sidebar-title">Kegiatan Lainnya</h3>
                        <div class="sidebar-latest-research-area">
                            <ul>
                                @foreach ($kegiatanOther as $kegiatanItem)
                                    <li>
                                        <div class="latest-research-img">
                                            <a href="{{route('detail.kegiatan', $kegiatanItem->slug)}}">
                                                <img src="{{asset('storage/images/kegiatan/' .$kegiatanItem->image)}}" class="img-responsive" alt="{{$kegiatanItem->nama}}">
                                            </a>
                                        </div>
                                        <div class="latest-research-content">
                                            <h6>{{Carbon\Carbon::parse($kegiatanItem->created_at)->format('d M, Y')}}</h6>
                                            <p style="font-size: 12px">{{$kegiatanItem->nama}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
