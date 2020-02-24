
@extends('../../layouts.admin-layout')
@section('title','Dashboard')
@section('admin-content')
  <!-- Page Wrapper -->
 <div class="container">
  <div class="row">
  <div class="col-md">
      <h1>Selamat datang {{Auth::user()->name}}</h1>
  </div>
  </div>
 </div>
  @endsection

