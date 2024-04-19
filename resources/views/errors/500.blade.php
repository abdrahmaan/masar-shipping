@extends('layout.masterError')
@section('title',"صلاحية منتهية")


@section('content')

<div class="row w-100 mx-0 d-flex flex-column" style="max-height: 100vh">
    <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
        <img src="{{asset("assets/images/others/404.svg")}}" class="img-fluid mb-2" alt="404">
        <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">500</h1>
        <h4 class="mb-2">صلاحية منتهية</h4>
        <h6 class="text-muted mb-3 text-center">عذراً ليس لديك الصلاحية للوصول لهذة الصفحة ، تواصل مع مديرك المباشر</h6>
        <a class="btn btn-primary" href="/dashboard">عودة للصفحة الرئيسية</a>
    </div>
</div>
@endsection

