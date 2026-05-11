@extends('layouts.app')

@section('title', ucfirst($curso) . ' - EducaPerú')

@section('content')

<div class="bg-zinc-950 min-h-screen">

    @include('capacitaciones.' . $curso . '.content')

</div>

@endsection
