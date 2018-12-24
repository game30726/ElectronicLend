@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header text-center">หน้าตรวจสอบคำขอ</div>
                <div class="card-body">
                              <div class="tab-content">
                                  </div>
                                  <div class="card-body">
                                      <div class="container">
                                            <table class="table table-hover table-responsive">
                                                <thead>
                            
                                                    <tr>
                            
                                                            <th>ชื่อครุภัณฑ์</th>
                                
                                                            <th>เลขครุภัณฑ์</th>
                                                                                           
                                                            <th>ผู้ยืม</th>

                                                            <th>ตำแหน่ง</th>

                                                            <th>เวลายืม</th>

                                                            <th>เวลาคืน</th>

                                                            <th>สถานะ</th>

                                                            {{-- <th>คืน</th> --}}
                                                    </tr>
                            
                                                </thead>
                                                @foreach($order as $od)
                                                <tr>
                                                        <td>{{$od->name}}</td>
                                                        <td>{{$od->iden}}</td>
                                                        <td>{{$od->lend_name}}</td>
                                                        <td>{{$od->position}}</td>
                                                        <td>{{$od->start}}</td>
                                                        <td>{{$od->end}}</td>
                                                        <td>@if($od->status ==='1')  
                                                                <button type="button" class="btn btn-danger" disabled>ถูกปฏิเสธ/คืนแล้ว</button>
                                                            @elseif($od->status ==='2')
                                                                <button type="button" class="btn btn-warning" disabled>กำลังดำเนินการ</button>
                                                            @elseif($od->status ==='3')
                                                                <button type="button" class="btn btn-success" disabled>ได้รับการอนุมัติ</button>
                                                            @else
                                                                <button type="button" class="btn btn-danger" disabled>แทงจำหน่าย</button>
                                                            @endif
                                                        </td>
                                                        {{-- <td>
                                                                @if($od->status ==='3')  
                                                        <a type="button" onclick="window.location='{{route('lend.back',$od->id)}}'" class="btn btn-primary"><input type="hidden">คืน</a>
                                                                @else
                                                                <button type="button" class="btn btn-primary" disabled>คืน</button>
                                                                @endif
                                                        </td> --}}

                                                </tr>
                                                @endforeach
                                            </table>
                                      </div></div></div></div></div></div>
@endsection
