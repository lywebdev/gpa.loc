@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Редактирование категории блога</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blog.categories.update', $category->id) }}" method="post">
                        @method('put')
                        @include('admin.sections.blog.categories.body')
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-3">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
