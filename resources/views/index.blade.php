@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid d-flex justify-content-center">
                <!-- Info boxes -->
                <div class="row">
                    <!-- Existing info boxes -->

                    <!-- Card for Current Date & Time -->
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-clock"></i></span>
                            @php

                                $date = date('Y-m-d ');
                                $totalCategories = DB::table('categories')->count();
                            @endphp
                            <div class="info-box-content">
                                <span class="info-box-text">Current Date & Time </span>
                                <span class="info-box-number" id="currentDateTime">{{ $date }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- Card for Total Categories -->
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-list-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Categories</span>
                                <span class="info-box-number" id="totalCategories">{{ $totalCategories }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div><!-- /.content-wrapper -->
@endsection
