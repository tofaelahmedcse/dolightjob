@extends('layouts.user')
@section('title')
    Deposit


@endsection
@section('user')


    <div class="row">
        <div class="col-lg-12">
            <div class="card">


                <div class="card-body">

                    <div class="card p-3">
                        <div class="d-flex flex-row justify-content-between text-align-center">
                          <img src="https://imgur.com/vvK2ARv.png">
                          <i class="fas fa-ellipsis-v"></i>
                        </div>
                        <p class="text-dark">Business Account</p>
                        <div class="card-bottom pt-3 px-3 mb-2">
                          <div class="d-flex flex-row justify-content-between text-align-center">
                            <div class="d-flex flex-column"><span>Balance amount</span><p>&dollar; <span class="text-white">{{ Auth::user()->balance }}</span></p></div>
                            <button class="btn btn-secondary"><i class="fas fa-arrow-right text-white"></i></button>
                          </div>
                        </div>
                      </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>



@endsection
@section('js')

@endsection

@push('css')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');


.card{
border: none;
border-radius: 10px;
width: 275px;
margin-top: 2%;
}
.fa-ellipsis-v{
font-size: 10px;
color: #C2C2C4;
margin-top: 6px;
cursor: pointer;
}
.text-dark{
font-weight: bold;
margin-top: 8px;
font-size: 13px;
letter-spacing: 0.5px;
}
.card-bottom{
background: #3E454D;
border-radius: 6px;
}
.flex-column{
color: #adb5bd;
font-size: 13px;
}
.flex-column p{
letter-spacing: 1px;
font-size: 18px;
}
.btn-secondary{
height: 40px!important;
margin-top: 3px;
}
.btn-secondary:focus{
box-shadow: none;
}
</style>
@endpush
