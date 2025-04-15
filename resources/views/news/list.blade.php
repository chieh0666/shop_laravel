@extends('layout.main')

@section('title', $title)

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
</div>

<article id="news-page">
  <div class="row row-cols-1 row-cols-lg-3 g-4">

    @foreach($newses as $news)
    <div class="col">
      <a class="text-916953" href="/{{ $news->link }}" title="前往{{ $news->title }}[另開新視窗]" target="_blank">
        <div class="card h-100 bg-transparent">
          <div class="overflow-hidden">
            <img src="/{{ $news->image }}" class="card-img-top object-fit-cover h-100" alt="{{ $news->title }}">
          </div>
          <div class="card-body">
            <ul class="list-unstyled d-flex align-items-lg-center small flex-lg-row flex-column">
              <!-- 日期 -->
              <li class="me-3 text-dark">
                <i class="bi bi-calendar text-916953"></i>
                <span>{{ $news->created_at->diffForHumans() }}</span>
              </li>
            </ul>
            <h3 class="card-title h5">{{$news->title}}</h3>
          </div>
        </div>
      </a>
    </div>
    @endforeach

  </div>
</article>

@endsection
