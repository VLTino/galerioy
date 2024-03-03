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

        <div class="mb-4">
            <form action="/userdata" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by name" name="search"
                        value="{{ $search }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

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

                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $serialNumber++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                <a href="#" onclick="openEditModal({{ $user->userid }})">
                                    <i class="fa-regular fa-pen-to-square btn btnfav btn-lg"></i>
                                </a>
                                <form id="deleteuser{{ $user->userid }}" action="/deleteuser/{{ $user->userid }}"
                                    method="post" class="d-inline">
                                    @csrf
                                    <button type="button" class="btn btnheart btn-lg mr-2"
                                        onclick="deleteusers({{ $user->userid }})">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
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
                                            <option value="admin" @if ($user->level === 'admin') selected @endif>Admin
                                            </option>
                                            <option value="user" @if ($user->level === 'user') selected @endif>User
                                            </option>
                                            <option value="banned" @if ($user->level === 'banned') selected @endif>Banned
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary mt-4">Edit Level</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            <div class="d-flex justify-content-center align-content-center text-danger">
                                <h1 style="width: 100%;text-align: center">No Users Found</h1>
                            </div>
                        </td>
                    </tr>
                @endif

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
        <script>
            function deleteusers(userId) {
                Swal.fire({
                    title: "Yakin untuk menghapus user?",
                    text: "Pastikan gambar yang di upload user sudah terhapus",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    // Jika pengguna menekan OK, kirim formulir untuk menghapus data
                    if (result.isConfirmed) {
                        document.getElementById("deleteuser" + userId).submit();
                    }
                });
            }
        </script>
    </div>
@endsection
