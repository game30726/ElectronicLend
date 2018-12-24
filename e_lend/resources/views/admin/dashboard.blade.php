@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header text-center">หน้า Dashboard ของ Admin</div>
                <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" data-toggle="pill" href="#check">จัดการคำขอ</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg" href="#">เพิ่มครุภัณฑ์</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('user/home') }}">หน้าครุภัณฑ์ทั้งหมด</a>
                                      </li>
                              </ul>
                              <!-- Tab panes -->
                              <div class="tab-content">
                                    @foreach($lend as $ld)
                                    @endforeach
                                  </div>
                                {{-- ---------------------------------------- จัดการคำขอ -------------------------------------------}}
                                <div id="check" class="container tab-pane active"><br>
                                  <h3>จัดการคำขอยืมจากผู้ใช้</h3>
                                  <div class="card-body">
                                      <div class="container">
                                            <table class="table table-hover table-responsive">
                                                <thead>
                            
                                                    <tr>
                            
                                                            <th>ชื่อครุภัณฑ์</th>
                                
                                                            <th>เลขครุภัณฑ์</th>
                                
                                                            <th>ยี่ห้อ</th>
                                
                                                            <th>รุ่น</th>
                                
                                                            <th>หมายเลขเครื่อง</th>
                                
                                                            <th>วันที่ได้รับ</th>
                                
                                                            <th>หน่วยละ</th>
                                
                                                            <th>อยู่ที่</th>
                            
                                                            <th>สถานะ</th>
                            
                                                    </tr>
                            
                                                </thead>
                                                @foreach($lend as $ld)
                                                <tr>
                                                        <td>{{$ld->name}}</td>
                                                        <td>{{$ld->iden}}</td>
                                                        <td>{{$ld->brand}}</td>
                                                        <td>{{$ld->gen}}</td>
                                                        <td>{{$ld->number}}</td>
                                                        <td>{{$ld->date}}</td>
                                                        <td>{{$ld->price}}</td>
                                                        <td>{{$ld->place}}</td>
                                                        <td>@if($ld->status ==='2')
                                                        <button type="button" onclick="window.location='{{route('admin.edit',$ld->id)}}'" class="btn btn-success">จัดการคำขอ</button>
                                                            @else
                                                                <button type="button" class="btn btn-secondary" disabled>จัดการคำขอ</button>
                                                            @endif
                                                        </td>
                                                </tr>
                                                @endforeach
                                            </table>
                                      </div>
                                          </div>
                                      </div>
                                  </div>
                                {{-- ---------------------------------------- เพิ่มครุภัณฑ์ -------------------------------------------}}
                                <div id="add" class="container tab-pane fade"><br>
                                  <h3>เพิ่มครุภัณฑ์เข้าระบบ</h3>
                                  <div class="card-body">
                                    </div>
                                </div>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มครุภัณฑ์เข้าระบบ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="container">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                      <ul>
                                                          @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                          @endforeach
                                                      </ul>
                                                    </div><br />
                                                  @endif
                                            <form method="POST" action="{{route('admin.store')}}">
                                                    @csrf
                                                <div class="row">
                                                <div class="col">
                                                ชื่อครุภัณฑ์<input type="text" name="name" class="form-control" placeholder="กรอกชื่อครุภัณฑ์">
                                                </div>
                                                <div class="col">
                                                จำนวน<input type="text" name="quantity" class="form-control" value="1">
                                                </div>
                                                </div><br>
                                                <div class="row">
                                                <div class="col">
                                                หน่วย<input type="text" name="type" class="form-control" placeholder="กรุณากรอกหน่วย(ชิ้น,ตัว,ฯลฯ)">
                                                </div>
                                                <div class="col">
                                                รหัสประจำตัวครุภัณฑ์<input name="iden" type="text" class="form-control" placeholder="กรอกรหัสประจำตัวครุภัณฑ์">
                                                </div>
                                                </div><br>
                                                <div class="row">
                                                <div class="col">
                                                ยี่ห้อ<input type="text" name="brand" class="form-control" placeholder="กรอกชื่อยี่ห้อถ้าไม่มีให้กรอก( - )">
                                                </div>
                                                <div class="col">
                                                รุ่น<input type="text" name="gen" class="form-control" placeholder="กรอกชื่อรุ่นถ้าไม่มีให้กรอก( - )">
                                                </div>
                                                </div><br>
                                                <div class="row">
                                                <div class="col">
                                                Serial Number<input type="text" name="number" class="form-control" placeholder="กรอกเลขเครื่องถ้าไม่มีให้กรอก( - )">
                                                </div>
                                                <div class="col">
                                                วันที่ได้รับ<input type="date" name="date" class="form-control" placeholder="">
                                                </div>
                                                </div><br>
                                                <div class="row">
                                                <div class="col">
                                                ราคา<input type="text" name="price" class="form-control" placeholder="กรุณากรอกราคา">
                                                </div>
                                                <div class="col">
                                                ที่อยู่ครุภัณฑ์<input type="text" name="place" class="form-control" placeholder="กรุณากรอกที่อยู่ครุภัณฑ์">
                                                </div><input type="hidden" name="status" class="form-control" value="1">
                                                </div><br><br>
                                                <center>
                                                <button type="submit" class="btn btn-success">ยืนยัน</button>&nbsp;&nbsp;&nbsp;
                                                </center>
                                    </form>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>                              
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
