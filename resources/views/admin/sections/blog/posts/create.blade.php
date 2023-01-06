@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Создание поста блога</h4>

                <div class="page-title-right">
{{--                    {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.blog.categories.create') }}--}}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blog.posts.store') }}" method="post">
                        @include('admin.sections.blog.posts.body')
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-3">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>
        const imager = new Imager();
    </script>
@endsection
