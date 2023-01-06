@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Категории блога</h4>

                <div class="page-title-right">
                    {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.blog.categories.index') }}
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.components.forms.table', [
                        'thead' => [
                            'Название',
                        ],
                        'tbody' => [
//                            'name',
                            ['method', 'getParentsNames']
                        ],
                        'data' => $categories,
                        'route' => 'admin.blog.categories'
                    ])
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
