@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Редактирование поста блога</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.blog.posts.update', $post->id) }}" method="post">
                        @method('put')
                        @include('admin.sections.blog.posts.body')
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-3">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(() => {
            const imager = new Imager('edit', {
                items: `{!! json_encode($post->photos) !!}`,
                model: `App\\Models\\Blog\\Post\\Photo`,
                column: `filename`,
                entityColumnName: 'post_id',
                entityColumnValue: {{ $post->id }},
                path: 'uploads/blog/posts/{{ $post->id }}/',

                previewModel: `App\\Models\\Blog\\Post`,
                previewColumn: 'preview'
            });
        });
    </script>
@endsection
