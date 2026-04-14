@extends('layouts.app')

@section('title', 'Bienvenido - Instituto de Programación')

@section('content')
<section class="relative flex items-center justify-center px-4 sm:px-6 overflow-hidden bg-[#f5f0eb]" style="height: calc(100vh - 5rem);">
    <div class="max-w-6xl mx-auto w-full flex flex-col justify-center">
        <div class="text-center">

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-gray-900 mb-6 sm:mb-8 md:mb-10 leading-tight tracking-tight">
                Hassle-free
                <span class="relative inline-block">
                    <span class="text-gray-900">incorporation</span>
                </span><br>
                and expert accounting
                <span class="relative inline-block ml-1 sm:ml-2">
                    <span class="hidden lg:flex absolute -top-2 -right-20 -space-x-2">
                        <div class="w-10 h-10 xl:w-12 xl:h-12 rounded-full bg-gray-300 border-2 border-white overflow-hidden">
                            <img src="https://i.pravatar.cc/150?img=1" alt="User 1" class="w-full h-full object-cover">
                        </div>
                        <div class="w-10 h-10 xl:w-12 xl:h-12 rounded-full bg-gray-300 border-2 border-white overflow-hidden">
                            <img src="https://i.pravatar.cc/150?img=2" alt="User 2" class="w-full h-full object-cover">
                        </div>
                        <div class="w-10 h-10 xl:w-12 xl:h-12 rounded-full bg-gray-300 border-2 border-white overflow-hidden">
                            <img src="https://i.pravatar.cc/150?img=3" alt="User 3" class="w-full h-full object-cover">
                        </div>
                    </span>
                </span><br>
                for better businesses
            </h1>

            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-center mb-6 sm:mb-8 md:mb-10">
                <a href="#cursos" class="w-full sm:w-auto inline-flex items-center justify-center bg-blue-600 text-white px-6 sm:px-8 py-3 sm:py-3.5 rounded-full text-sm sm:text-base font-semibold hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-md">
                    Get started
                </a>
                <button type="button" class="w-full sm:w-auto inline-flex items-center justify-center bg-white text-gray-900 px-6 sm:px-8 py-3 sm:py-3.5 rounded-full text-sm sm:text-base font-semibold border border-gray-300 hover:border-gray-400 transition-all duration-200 shadow-sm hover:shadow-md">
                    Schedule a call
                </button>
            </div>

        </div>
    </div>
</section>

@endsection

