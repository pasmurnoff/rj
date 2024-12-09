@extends('layouts.app')

@section('content')
    @include('components.banner.wrap')
    <div class="pg">
        @include('components.about-section.wrap')
        @include('components.team-section.wrap')
        @include('components.banner-ot.wrap')
        @include('components.stories-section.wrap')
        @include('components.donations-section.wrap')
        @include('components.partners-section.wrap')
    </div>
@endsection
