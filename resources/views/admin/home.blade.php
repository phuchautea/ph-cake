@extends('admin.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <b>Danh sách nhân viên</b><br>
                        <span type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#add_modal">
                            <i class="fa fa-plus"></i> Thêm mới
                        </span>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Hành động</th>
                                    <th>Mã NV</th>
                                    <th>Tên NV</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i> Sửa
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs">
                                            <i class="fa fa-times"></i> Xóa
                                        </button>
                                    </td>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Hoàng Phúc Hậu
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection