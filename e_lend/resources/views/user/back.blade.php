@extends('layouts.app')
@section('content')
<div class="container">
<form method="POST" action="{{ route('lend.backupdate', $lend->id) }}">
        @method('PATCH')
        @csrf
    <div class="row">
    <div class="col">
    ชื่อผู้ยืม<input type="text" name="name" class="form-control" placeholder="{{$lend->lend_name}}" disabled>
    </div>
    <div class="col">
    ตำแหน่ง<input type="text" name="name" class="form-control" placeholder="{{$lend->position}}" disabled>
    </div>
     </div><br>
    <div class="row">
    <div class="col">
    เวลายืม<input type="text" name="name" class="form-control" placeholder="{{$lend->start}}" disabled>
    </div>
    <div class="col">
    เวลาคืน<input type="text" name="name" class="form-control" placeholder="{{$lend->end}}" disabled>
    </div>
    </div><br>
    <div class="row">
    <div class="col">
    ชื่อครุภัณฑ์<input type="text" name="name" class="form-control" placeholder="{{$lend->name}}" disabled>
    </div>
    <div class="col">
    จำนวน<input type="text" name="quantity" class="form-control" value="1" disabled>
    </div>
    </div><br>
    <div class="row">
    <div class="col">
    หน่วย<input type="text" name="type" class="form-control" placeholder="{{$lend->type}}" disabled>
    </div>
    <div class="col">
    รหัสประจำตัวครุภัณฑ์<input name="iden" type="text" class="form-control" placeholder="{{$lend->iden}}" disabled>
    </div>
    </div><br>
    <div class="row">
    <div class="col">
    ยี่ห้อ<input type="text" name="brand" class="form-control" placeholder="{{$lend->brand}}" disabled>
    </div>
    <div class="col">
    รุ่น<input type="text" name="gen" class="form-control" placeholder="{{$lend->gen}}" disabled>
    </div>
    </div><br>
    <div class="row">
    <div class="col">
    Serial Number<input type="text" name="number" class="form-control" placeholder="{{$lend->number}}" disabled>
    </div>
    <div class="col">
    วันที่ได้รับ<input type="text" name="date" class="form-control" placeholder="{{$lend->date}}" disabled>
    </div>
    </div><br>
    <div class="row">
    <div class="col">
    ราคา<input type="text" name="price" class="form-control" placeholder="{{$lend->price}}" disabled>
    </div>
    <div class="col">
    ที่อยู่ครุภัณฑ์<input type="text" name="place" class="form-control" placeholder="{{$lend->place}}" disabled>
    </div>
    </div><br><br>
            <center>    <div class="dropdown">
                            <label for="filter">จัดการคำขอที่นี่ !!</label><br>
                            <select class="btn btn-light btn-lg dropdown-toggle" name="status">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <option class="dropdown-item" value="1">ปฎิเสธคำขอ</option>
                                <option class="dropdown-item" value="2" selected>กำลังดำเนินการ</option>
                                <option class="dropdown-item" value="3">ยืนยันคำขอ</option>
                                <option class="dropdown-item" value="0">แทงจำหน่าย</option>
                            </div>
                            </select>
                          </div>
            </center>
    <br><br><br>
    <center>
    <button type="submit" class="btn btn-success">ยืนยัน</button>&nbsp;&nbsp;&nbsp;
    </center>
</div></form>
@endsection