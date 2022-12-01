@extends('layout.master')
@section('content')
    <div class='card'>
        @if ($errors->any())
            <div class="card-header">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class='card-body'>
            <form class="float-right form-group form-inline">
                <label class="mr-2">Search:</label>
                <input type="search" name="q" value="{{ $search }}" class="form-control">
            </form>

            <table class="table table-bordered ">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên thực phẩm</th>
                    <th>Nhóm thực phẩm</th>
                    <th>Mô tả</th>
                    <th>Kalo/100g</th>
                </tr>
                </thead>

                @foreach ($data as $each)
                    <tr>
                        <td>
                            {{ $each->id }}
                        </td>
                        <td>
                            {{ $each->name }}
                        </td>
                        <td>
                            {{ $each->ingredient_type_name }}
                        </td>
                        <td>
                            {{ $each->description }}
                        </td>
                        <td>
                            {{ $each->kalo_day }}
                        </td>
                    </tr>

                @endforeach

            </table>
@endsection
