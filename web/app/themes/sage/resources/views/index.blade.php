@extends('layouts.app')

@section('content')
    <section class="blog-page">
        <div class="container">
            <div class="blog-page__title">
                <h1>Статьи</h1>
            </div>
            <div class="blog-page__cards">
                @if (have_posts())
                    @while (have_posts())
                        @php the_post() @endphp
                        <div class="card">
                            <div class="card__image">
                                @if (has_post_thumbnail())
                                    <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ the_title() }}">
                                @endif
                            </div>
                            <div class="card__wrap">
                                <div class="card__title">
                                    <h3><a href="{{ get_permalink() }}">{{ the_title() }}</a></h3>
                                </div>
                                <div class="card__text">
                                    <p>{{ wp_trim_words(get_the_excerpt(), 20) }}</p>
                                </div>
                            </div>
                        </div>
                    @endwhile
                @else
                    <p>Записей не найдено</p>
                @endif
            </div>
        </div>
    </section>
@endsection
