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
      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
          @php
               $serialNumber = 1;
          @endphp
          @foreach($users as $user)
        <tr>
            <th scope="row">{{ $serialNumber++ }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->level }}</td>
            <td>
              <a href="#" onclick="openEditModal({{ $user->userid }})">
                <i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i>
            </a>
                <a href="#email"><i class="fa-regular fa-trash-can btn btnheart btn-lg"></i></a>
            </td>
        </tr>
        <div id="editModal{{ $user->userid }}" class="modal" style="display: none;">
          <div class="modal-container">
              <div class="modal-content">
                  <span class="close" onclick="closeEditModal({{ $user->userid }})">&times;</span>
                  <h5>{{ $user->name }}</h5>
                  <form action="/editlevel/{{ $user->userid }}" method="post" class="mt-3">
                    @csrf
                    <label for="level">Level:</label>
                    <select name="level" id="level" class="form-control">
                      <option value="admin" @if($user->level === 'admin') selected @endif>Admin</option>
                      <option value="user" @if($user->level === 'user') selected @endif>User</option>
                      <option value="banned" @if($user->level === 'banned') selected @endif>Banned</option>
                  </select>
                      <button type="submit" class="btn btn-primary mt-4">Edit Level</button>
                  </form>
              </div>
          </div>
      </div>
        @endforeach
        </tbody>
  </table>
  <script>
    function openEditModal(userId) {
        var modal = document.getElementById('editModal' + userId);
        modal.style.display = 'block';
    }

    function closeEditModal(userId) {
        var modal = document.getElementById('editModal' + userId);
        modal.style.display = 'none';
    }
</script>
    </div>
    @endsection