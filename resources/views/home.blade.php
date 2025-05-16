@extends('layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center" data-bg="">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Your Health, Our Priority</h1>
                <p>Providing quality healthcare services to you and your family.</p>
                <div class="banner-btn mt-5">
                <a href="{{ route('departments.index') }}" class="btn btn-primary mb-4 mb-sm-0">Explore Departments</a>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection