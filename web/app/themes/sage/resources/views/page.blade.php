@extends('layouts.app')

@section('content')
@include('components.banner.wrap')
<div style="display: flex; flex-direction: column; gap: 160px;">
    @include('components.about-section.wrap')
    @include('components.team-section.wrap')
</div>
@endsection