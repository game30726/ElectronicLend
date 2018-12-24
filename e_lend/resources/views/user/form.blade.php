<head>
        <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    </head>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <br><br>
            <div class="card">
                <div class="card-header text-center">กรุณากรอกเอกสารเพื่อยืมครุภัณฑ์</div>
                <div class="card-body">
                <form action="{{route('lend.update',$lend->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                                <div class="col">
                                กรุณากรอก ชื่อ-นามสกุล<input type="text" name="lend_name" class="form-control" placeholder="ชื่อ-นามสกุล">
                                </div>
                                <div class="col">
                                ตำแหน่ง<input type="text" name="position" class="form-control" placeholder="ระบุตำแหน่ง">
                                </div>
                                <div class="row">
                                <div class="col">
                                เวลายืม<input type="date" name="start" class="form-control" placeholder="ระบุเวลายืม">
                                </div>
                                <div class="col">
                                เวลาคืน<input type="date" name="end" class="form-control" placeholder="ระบุเวลาคืน">
                                </div></div><br>
                                <input type="hidden" name="status" class="form-control" value="2">
                                <div class="row">
                                <div class="col">
                                ชื่อครุภัณฑ์<input type="text" class="form-control" placeholder="{{$lend->name}}" disabled>
                                </div>
                                <div class="col">
                                รหัสประจำครุภัณฑ์<input type="text" class="form-control" placeholder="{{$lend->iden}}" disabled>
                                </div>
                                </div><br>
                                <div class="row">
                                <div class="col">
                                ยี่ห้อ<input type="text" class="form-control" placeholder="{{$lend->brand}}" disabled>
                                </div>
                                <div class="col">
                                รุ่น<input type="text" class="form-control" placeholder="{{$lend->gen}}" disabled>
                                </div>
                                </div><br>
                                <div class="row">
                                <div class="col">
                                Serial Number<input type="text" class="form-control" placeholder="{{$lend->number}}" disabled>
                                </div>
                                <div class="col">
                                วันที่ได้รับ<input type="text" class="form-control" placeholder="{{$lend->date}}" disabled>
                                </div>
                                </div><br>
                                <div class="row">
                                <div class="col">
                                ราคา<input type="text" class="form-control" placeholder="{{$lend->price}}" disabled>
                                </div>
                                <div class="col">
                                ที่อยู่ครุภัณฑ์<input type="text" class="form-control" placeholder="{{$lend->place}}" disabled>
                                </div>
                                </div><br><br>
                                <center>
                                <button type="submit" class="btn btn-success">ยืนยัน</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-danger">ยกเลิก</button>
                                </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection