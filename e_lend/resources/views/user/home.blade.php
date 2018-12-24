<!DOCTYPE html>
<html lang="en">
<body>
</html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ระบบยืมคืนครุภัณฑ์</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kodchasan">
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
    <script language="JavaScript" src="https://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('login') }}">ระบบยืมคืนครุภัณฑ์</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="{{ (Request::is('/') ? 'active' : '') }}">
                    </li>
                    </li>
                    <li class="{{ (Request::is('about') ? 'active' : '') }}">
                        <a href="{{ route('lend.show',Auth::user()->id) }}">ตรวจสอบคำขอ</a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                สวัสดี : {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    
<div class="container-fluid">
        <div class="row">
            <h2 class="text-center">ระบบยืมคืนครุภัณฑ์</h2>
        </div>
    
            <div class="row">
    
                <div class="col-md-12">
    

    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    

                        <thead>
    
                            <tr>
    
                                <th>ID</th>
    
                                <th>ชื่อครุภัณฑ์</th>
    
                                <th>จำนวน</th>
    
                                <th>หน่วย</th>
    
                                <th>เลขครุภัณฑ์</th>
    
                                <th>ยี่ห้อ</th>
    
                                <th>รุ่น</th>
    
                                <th>หมายเลขเครื่อง</th>
    
                                <th>วันที่ได้รับ</th>
    
                                <th>หน่วยละ</th>
    
                                <th>อยู่ที่</th>
    
                                <th>สถานะ</th>

                                <th>Function</th>
    
                            </tr>
    
                        </thead>
                        @foreach($lend as $ld)
                        <tr>
                            <td>{{$ld->id}}</td>
                            <td>{{$ld->name}}</td>
                            <td>{{$ld->quantity}}</td>
                            <td>{{$ld->type}}</td>
                            <td>{{$ld->iden}}</td>
                            <td>{{$ld->brand}}</td>
                            <td>{{$ld->gen}}</td>
                            <td>{{$ld->number}}</td>
                            <td>{{$ld->date}}</td>
                            <td>{{$ld->price}}</td>
                            <td>{{$ld->place}}</td>
                        <td>@if($ld->status ==='1')  
                                <a type="button" href="{{route('lend.edit',$ld->id)}}" class="btn btn-success">ยืมได้</a>
                            @elseif($ld->status ==='2')
                                <a type="button" class="btn btn-warning" disabled>กำลังดำเนินการ</a>
                            @elseif($ld->status ==='3')
                                <a type="button" class="btn btn-danger" disabled>ถูกยืมแล้ว</a>
                            @else
                                <a type="button" class="btn btn-danger" disabled>แทงจำหน่าย</a>
                            @endif
                        </td>
                        <td>
                            @if(Auth::user()->isAdmin())
                            <a type="button" href="{{route('admin.edit',$ld->id)}}" class="btn btn-primary">แก้ไข</a>
                            @else
                            <a type="button" class="btn btn-danger" disabled>เฉพาะAdmin</a>
                            @endif
                        </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
      <script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    
         $("[data-toggle=tooltip]").tooltip();
    
    } );
    
      </script>
      <footer class="blockquote-footer text-center"><pre style="color : #666666">Powered By PaulGame (Natthapong Kaenhom)</pre></footer>
      </body>