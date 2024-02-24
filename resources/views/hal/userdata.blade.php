@extends('layouts.main')
<style>
    body {
    margin: 0;
    padding: 0;
}
</style>
@include('layouts.sidebar')

@section('content')
    <div class="content container mt-5">

<table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Level</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Admin</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>User</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Admin</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>User</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Admin</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>User</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a></td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Admin</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>User</td>
            <td>
                <a href="#email"><i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i></a>
                <a href="#email"> <i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a></td>
          </tr>
        </tbody>
  </table>

    </div>
    @endsection